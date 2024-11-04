<?php



function addDaysToDate($matches): string {
    $day = (int)$matches[1];
    $month = (int)$matches[2];
    $year = (int)$matches[3];

    $date = DateTime::createFromFormat('d.m.Y', "$day.$month.$year");

    if ($date) {
        $date->modify('+15 days');
        return $date->format('d.m.Y');
    }
    return $matches[0];
}

$pattern = '/\b(0?[1-9]|[12]\d|3[01])\.(0?[1-9]|1[0-2])\.(\d{4})\b/';
$text = "Сегодня 12.02.2024, а встреча была назначена на 28.02.2024 и 30.04.2024.";
$newText = preg_replace_callback($pattern, 'addDaysToDate', $text);

echo $newText;

