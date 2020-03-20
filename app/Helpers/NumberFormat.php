<?php

function format($number)
{
    return number_format($number, 2, '.', ',');
}

function ordinal($number)
{
    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
    return $numberFormatter->format($number);
}