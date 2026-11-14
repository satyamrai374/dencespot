<?php
/**
 * Mathematical Calculation CAPTCHA for spam lead prevention.
 *
 * Generates random addition challenges (e.g. 5 + 3 = ?), signs the answer
 * with a secure HMAC hash and timestamp, and validates user submissions.
 */

declare(strict_types=1);

const CAPTCHA_SECRET = 'dence_captcha_salt_91a82f04e76c3b';

/**
 * Generate a random math calculation challenge.
 * Returns: ['num1' => int, 'num2' => int, 'question' => string, 'hash' => string, 'ts' => int]
 */
function captcha_generate(): array
{
    $num1 = random_int(2, 9);
    $num2 = random_int(1, 9);
    $ans  = $num1 + $num2;
    $ts   = time();
    $hash = hash_hmac('sha256', (string) $ans . '|' . $ts, CAPTCHA_SECRET);

    return [
        'num1'     => $num1,
        'num2'     => $num2,
        'question' => "{$num1} + {$num2}",
        'hash'     => $hash,
        'ts'       => $ts,
    ];
}

/**
 * Validates a submitted captcha answer.
 */
function captcha_validate(?string $answer, ?string $hash, ?string $ts): bool
{
    if ($answer === null || $hash === null || $ts === null) {
        return false;
    }

    $answer = trim($answer);
    $hash   = trim($hash);
    $ts     = trim($ts);

    if ($answer === '' || $hash === '' || !ctype_digit($ts)) {
        return false;
    }

    $timestamp = (int) $ts;
    $now       = time();

    // Valid for up to 3 hours (10800 seconds); allow up to 60s clock skew
    if ($timestamp > $now + 60 || ($now - $timestamp) > 10800) {
        return false;
    }

    $expectedHash = hash_hmac('sha256', $answer . '|' . $timestamp, CAPTCHA_SECRET);
    return hash_equals($expectedHash, $hash);
}

/**
 * Render captcha HTML field for forms based on variant.
 *
 * Variants:
 *  - 'standard': for includes/components.php (enquiry_form)
 *  - 'lp':       for lp/index.php (lp_form)
 *  - 'home':     for includes/home-components.php (hp_modal_booking)
 *  - 'strip':    for includes/components.php (lead_strip)
 *  - 'wa':       for includes/footer.php (waLeadForm)
 */
function captcha_field(string $idPrefix = 'f', string $variant = 'standard'): string
{
    $c = captcha_generate();
    $id = $idPrefix !== '' ? $idPrefix . '-captcha' : 'captcha-' . bin2hex(random_bytes(3));

    ob_start();

    if ($variant === 'lp') {
        ?>
        <div class="enhanced-form-group captcha-form-group" style="margin-bottom:10px;">
          <label for="<?= e($id) ?>"><i class="fas fa-shield-alt"></i> Security Check: <strong><?= e($c['question']) ?> = ?</strong></label>
          <div style="display:flex;align-items:center;gap:8px;">
            <span class="captcha-math-badge" style="background:#fff0f1;color:#da061a;border:1px solid rgba(218,6,26,0.25);font-weight:700;padding:7px 12px;border-radius:8px;font-size:13.5px;white-space:nowrap;">
              <?= e($c['question']) ?> =
            </span>
            <input type="number" id="<?= e($id) ?>" name="captcha" class="enhanced-input captcha-input" placeholder="Answer" inputmode="numeric" required autocomplete="off" style="max-width:130px;padding:7px 10px;margin:0;font-size:13.5px;">
          </div>
          <input type="hidden" name="captcha_hash" value="<?= e($c['hash']) ?>">
          <input type="hidden" name="captcha_ts" value="<?= e($c['ts']) ?>">
        </div>
        <?php
    } elseif ($variant === 'home') {
        ?>
        <div class="hp-field captcha-field">
          <label for="<?= e($id) ?>">Security Check: <strong><?= e($c['question']) ?> = ?</strong> <span class="hp-field__opt">(required)</span></label>
          <div style="display:flex;align-items:center;gap:10px;margin-top:4px;">
            <span class="captcha-math-badge" style="background:#f3f4f6;color:var(--hp-ink,#081b3a);font-weight:700;padding:8px 14px;border-radius:6px;font-size:14px;white-space:nowrap;border:1px solid #e5e7eb;">
              <?= e($c['question']) ?> =
            </span>
            <input id="<?= e($id) ?>" name="captcha" type="number" inputmode="numeric" placeholder="Answer" required autocomplete="off" style="max-width:140px;">
          </div>
          <input type="hidden" name="captcha_hash" value="<?= e($c['hash']) ?>">
          <input type="hidden" name="captcha_ts" value="<?= e($c['ts']) ?>">
        </div>
        <?php
    } elseif ($variant === 'strip') {
        ?>
        <label class="lead-strip__field lead-strip__field--captcha">
          <span>Security: <?= e($c['question']) ?> =</span>
          <input class="input" name="captcha" type="number" inputmode="numeric" placeholder="Answer" required autocomplete="off" style="width:100%;">
        </label>
        <input type="hidden" name="captcha_hash" value="<?= e($c['hash']) ?>">
        <input type="hidden" name="captcha_ts" value="<?= e($c['ts']) ?>">
        <?php
    } elseif ($variant === 'wa') {
        ?>
        <div class="wa-field captcha-field">
          <label for="<?= e($id) ?>">Security Check: <strong><?= e($c['question']) ?> = ?</strong></label>
          <div style="display:flex;align-items:center;gap:10px;margin-top:4px;">
            <span class="captcha-math-badge" style="background:#e8f7ee;color:#075e54;font-weight:700;padding:8px 14px;border-radius:6px;font-size:14px;white-space:nowrap;border:1px solid rgba(7,94,84,0.25);">
              <?= e($c['question']) ?> =
            </span>
            <input class="input" type="number" id="<?= e($id) ?>" name="captcha" placeholder="Answer" required inputmode="numeric" autocomplete="off" style="max-width:130px;">
          </div>
          <input type="hidden" name="captcha_hash" value="<?= e($c['hash']) ?>">
          <input type="hidden" name="captcha_ts" value="<?= e($c['ts']) ?>">
        </div>
        <?php
    } else {
        // Standard (enquiry_form in includes/components.php)
        ?>
        <div class="field field--captcha">
          <label for="<?= e($id) ?>">Security Check: <strong><?= e($c['question']) ?> = ?</strong> <span class="fine" style="color:var(--accent);font-weight:600">*</span></label>
          <div style="display:flex;align-items:center;gap:10px;margin-top:4px;">
            <span class="captcha-badge" style="background:rgba(218,6,26,0.08);color:var(--accent);font-weight:700;padding:8px 14px;border-radius:6px;font-size:15px;white-space:nowrap;border:1px solid rgba(218,6,26,0.2);">
              <?= e($c['question']) ?> =
            </span>
            <input class="input" id="<?= e($id) ?>" name="captcha" type="number" inputmode="numeric" placeholder="Answer" required style="max-width:140px;" autocomplete="off">
          </div>
          <input type="hidden" name="captcha_hash" value="<?= e($c['hash']) ?>">
          <input type="hidden" name="captcha_ts" value="<?= e($c['ts']) ?>">
        </div>
        <?php
    }

    return (string) ob_get_clean();
}
