<?php
session_start();
include '../../dbconfig/connection.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "sent<br/>";
    $file = $_FILES['imported'];
    $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    echo "<pre>";
    print_r($_FILES);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $file['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        echo '<pre>';
        // print_r($data);
        $count = "0";
        $sql = "INSERT INTO hotel(region_name, hotel_name,min_price, max_price, rating,link) VALUES(:rname,:hname,:minp,:maxp,:rate,:link)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':rname', $regionName);
        $stmt->bindParam(':hname', $hotelName);
        $stmt->bindParam(':minp', $minPrice);
        $stmt->bindParam(':maxp', $maxPrice);
        $stmt->bindParam(':rate', $rating);
        $stmt->bindParam(':link', $link);
        foreach ($data as $row) {
            if ($count > 0) {
                $regionName = $row['4'];
                $hotelName = $row['1'];
                $minPrice = $row['2'];
                $maxPrice = $row['3'];
                $rating = $row['5'];
                $link = $row['6'];
                echo $regionName . "<br/>" . $hotelName . "<br/>" . $minPrice . "<br/>" . $maxPrice . "<br/>" . $rating . "<br/>";
                $stmt->execute();
            } else {
                $count = 1;
            }
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        echo "Invalid File";
        exit(0);
    }
}
