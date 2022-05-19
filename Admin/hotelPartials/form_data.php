<?php
$regionName = $_POST['name'] ?? $regionName;
$hotelName = $_POST['hotel'] ?? $hotelName;
$minPrice = $_POST['minprice'] ?? $minPrice;
$maxPrice = $_POST['maxprice'] ?? $maxPrice;
$rating = $_POST['rate'] ?? $rating;
$link = $_POST['link'] ?? $link;
$image = $_FILES['image'] ?? '';
$oldPath = $imagePath;
