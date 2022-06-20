
<?php

$connect = mysqli_connect('localhost', 'root', '123', 'j2school');

if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}