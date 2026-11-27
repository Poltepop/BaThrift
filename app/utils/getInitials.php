<?php

function getInitials(string $name, int $limit = 2): string
{
    $words = preg_split('/\s+/', trim($name), -1, PREG_SPLIT_NO_EMPTY);

    $initials = '';
    foreach ($words as $word) {
        $initials .= mb_strtoupper(mb_substr($word, 0, 1));
        if (mb_strlen($initials) >= $limit) {
            break;
        }
    }

    return $initials;
}