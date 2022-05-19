<?php
if ($carName === '') {
    $carNameErr[] = 'car model name can\'t be mepty';
    $errors = true;
}
if ($price === '') {
    $priceErr[] = 'Car Price can\'t be mepty';
    $errors = true;
}
if ($category === '') {
    $categoryErr[] = 'car category can\'t be mepty';
    $errors = true;
}
if ($desc === '') {
    $descErr[] = 'please put some description for the car';
    $errors = true;
}
