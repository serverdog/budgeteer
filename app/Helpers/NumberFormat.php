<?php

function format($number)
{
    return number_format($number, 2, '.', ',');
}