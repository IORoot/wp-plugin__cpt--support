<?php

$word = str_word_count(strip_tags($content));
$min = floor($word / 200);
$sec = floor($word % 200 / (200 / 60));
// $reading_time = $min . ' minute' . ($min == 1 ? '' : 's') . ', ' . $sec . ' second' . ($sec == 1 ? '' : 's');
$reading_time = $min . ' min' . ($min == 1 ? '' : 's');