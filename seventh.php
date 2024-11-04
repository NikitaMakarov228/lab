<?php
function romanToArabic($roman) {

    if($roman == "") {
        return "";
    }

    $list = [
        'M' => 1000,
        'D' => 500,
        'C' => 100,
        'L' => 50,
        'X' => 10,
        'V' => 5,
        'I' => 1
    ];
    $array = [];
    $k = 1;
    for($index = 0; $index < strlen($roman); $index++){
        $current = $list[$roman[$index]];
        $next = @$list[$roman[$index + 1]];
        
        if(!array_key_exists($roman[$index], $array)) {
            $array[$roman[$index]] = 0;
        }
        
        if($current == $next) {
            $k += 1;
            continue;
        } elseif($current > $next || empty($next)) {
            $array[$roman[$index]] += $current * $k;
            $k = 1;
        } elseif($current < $next) {
            $array[$roman[$index + 1]] -= $current;
        }

    }
    return array_sum($array);
}

$text = "На древней арке были выбиты года основания и реконструкции: MMMCCXCVIII, XCVII, и CCCLXXVIII, что свидетельствует об их исторической значимости.";

$pattern = '/\bM{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})\b/';

$text = preg_replace_callback($pattern, function($matches) {
    return romanToArabic($matches[0]);
}, $text);

echo $text;