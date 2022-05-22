<?php
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':rname', $regionName);
$stmt->bindParam(':hname', $hotelName);
$stmt->bindParam(':minp', $minPrice);
$stmt->bindParam(':maxp', $maxPrice);
$stmt->bindParam(':rate', $rating);
$stmt->bindParam(':img', $imagePath);
$stmt->bindParam(':link', $link);
