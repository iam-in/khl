<?php

if (!function_exists('bubble_sort')) {
    /**
     * @param  array  $data
     * @return void
     */
    function bubble_sort(array &$data)
    {
        $countElements = count($data);
        $currentIteration = $countElements - 1;

        for ($i = 0; $i < $countElements; $i++) {
            $changes = false;
            for ($k = 0; $k < $currentIteration; $k++) {
                if ($data[$k] > $data[($k + 1)]) {
                    $changes = true;
                    list($data[$k], $data[($k + 1)]) = [$data[($k + 1)], $data[$k]];
                }
            }
            $currentIteration--;
            if (!$changes) {
                break;
            }
        }
    }
}

if (!function_exists('dd')) {
    /**
     * @param $var
     * @return void
     */
    function dd($var)
    {
        echo "<pre>";
        print_r($var);
        exit();
    }
}