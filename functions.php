<?php

function getVueSliderData($id = false)
{
    $content = file_get_contents(__DIR__ . '/default-content/slider1.json');
    $content = json_decode($content, true);

    return $content;
}
