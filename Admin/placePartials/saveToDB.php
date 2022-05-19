<?php
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $placeName);
$stmt->bindParam(':desc', $desc);
$stmt->bindParam(':link', $mapLink);
