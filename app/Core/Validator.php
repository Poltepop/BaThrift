<?php
function required(string $msg = 'Wajib diisi'): callable {
    return fn(string $v): ?string => trim($v) !== '' ? null : $msg;
}

function min_length(int $n): callable {
    return fn(string $v): ?string =>
        mb_strlen($v) >= $n ? null : "Minimal $n karakter";
}

function max_length(int $n): callable {
    return fn(string $v): ?string =>
        mb_strlen($v) <= $n ? null : "Maksimal $n karakter";
}

function email_format(): callable {
    return fn(string $v): ?string =>
        filter_var($v, FILTER_VALIDATE_EMAIL) ? null : 'Format email tidak valid';
}

function matches(string $other, string $msg): callable {
    return fn(string $v): ?string => $v === $other ? null : $msg;
}

function validate(string $value, callable ...$rules): ?string {
    foreach ($rules as $rule) {
        $error = $rule($value);
        if ($error !== null) return $error;
    }
    return null;
}