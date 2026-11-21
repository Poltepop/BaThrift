<?php
// app/View/components/input.php
// Reusable Input Component untuk BaThrift (XHTML5 Valid)

function renderInput(array $params): void {
    $name        = $params['name'] ?? '';
    $label       = $params['label'] ?? '';
    $type        = $params['type'] ?? 'text';
    $id          = $params['id'] ?? 'reg-' . str_replace(['_', ' '], '-', $name);
    $placeholder = $params['placeholder'] ?? '';
    $value       = $params['value'] ?? '';
    $required    = $params['required'] ?? true;
    $hint        = $params['hint'] ?? '';
    $badge       = $params['badge'] ?? '';
    $badge_type  = $params['badge_type'] ?? '';
    $icon        = $params['icon'] ?? '';
    $prefix      = $params['prefix'] ?? '';
    $prefix_flag = $params['prefix_flag'] ?? ($prefix === '+62');
    $is_password = $params['is_password'] ?? ($type === 'password');
    $readonly    = $params['readonly'] ?? false;
    $class       = $params['class'] ?? '';
    $error       = $params['error'] ?? '';
    $has_error   = !empty($error);
?>
<div class="form-group<?= $has_error ? ' has-error' : '' ?>">
    <div class="form-label-row">
        <label class="form-label" for="<?= htmlspecialchars($id, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
            <span><?= htmlspecialchars($label, ENT_QUOTES | ENT_XML1, 'UTF-8') ?><?php if ($required): ?> <span class="text-required">*</span><?php endif; ?></span>
        </label>
        <?php if ($has_error): ?>
            <span class="badge-error">ERROR</span>
        <?php elseif (!empty($badge)): ?>
            <span class="badge-status badge-<?= htmlspecialchars($badge_type, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>">
                <?= htmlspecialchars($badge, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>
            </span>
        <?php elseif (!empty($hint)): ?>
            <span class="label-hint"><?= htmlspecialchars($hint, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
        <?php endif; ?>
    </div>

    <div class="input-wrapper<?= !empty($prefix) ? ' has-prefix' : '' ?>">
        <?php if (!empty($prefix)): ?>
            <div class="input-prefix">
                <?php if (!empty($prefix_flag)): ?>
                    <span>&#127470;&#127465;</span>
                <?php endif; ?>
                <span><?= htmlspecialchars($prefix, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
            </div>
        <?php endif; ?>

        <input class="form-input<?= !empty($class) ? ' ' . htmlspecialchars($class, ENT_QUOTES | ENT_XML1, 'UTF-8') : '' ?><?= $has_error ? ' input-error' : '' ?><?= $is_password ? ' input-with-action' : (!empty($icon) ? ' input-with-icon' : '') ?>"
               id="<?= htmlspecialchars($id, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
               name="<?= htmlspecialchars($name, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
               type="<?= htmlspecialchars($type, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
               placeholder="<?= htmlspecialchars($placeholder, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>"
               <?php if ($required): ?>required="required"<?php endif; ?>
               <?php if (!empty($readonly)): ?>readonly="readonly"<?php endif; ?>
               value="<?= htmlspecialchars($value, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" />

        <?php if ($is_password): ?>
            <button aria-label="Lihat kata sandi" class="btn-toggle-password" data-target="<?= htmlspecialchars($id, ENT_QUOTES | ENT_XML1, 'UTF-8') ?>" type="button">
                <span class="material-symbols-outlined">visibility</span>
            </button>
        <?php elseif (!empty($icon)): ?>
            <?php if ($icon === 'check'): ?>
                <div class="input-status-icon status-valid">
                    <span class="material-symbols-outlined">check</span>
                </div>
            <?php elseif ($icon === 'close'): ?>
                <div class="input-status-icon status-invalid">
                    <span class="material-symbols-outlined">close</span>
                </div>
            <?php else: ?>
                <span class="material-symbols-outlined input-icon"><?= htmlspecialchars($icon, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php if ($has_error): ?>
        <div class="input-error-box">
            <span class="material-symbols-outlined icon-fill">error</span>
            <span class="error-text"><?= htmlspecialchars($error, ENT_QUOTES | ENT_XML1, 'UTF-8') ?></span>
        </div>
    <?php endif; ?>
</div>
<?php
}
