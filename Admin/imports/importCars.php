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
        print_r($data);
        $count = "0";
        $sql = "INSERT INTO transport(modelName,price,category,description) VALUES (:model,:price,:category,:desc)";
        $result = $pdo->prepare($sql);
        $result->bindParam(':model', $model);
        $result->bindParam(':price', $price);
        $result->bindParam(':category', $category);
        $result->bindParam(':desc', $description);
        foreach ($data as $row) {
            if ($count > 0) {
                $model = $row['0'];
                $category = $row['1'];
                $price = $row['2'];
                $description = $row['3'];
                $result->execute();
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
// require_once '../../dbconfig/connection.php';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// $file = $_FILES['imported'];
// var_dump($file['name']);
// $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
// if ($ext == 'xlsx') {
// require_once 'PHPExcel/PHPExcel.php';
// require_once 'PHPExcel/PHPExcel/IOFactory.php';
// // require('PHPExcel/PHPExcel.php');
// // require('PHPExcel/PHPExcel/IOFactory.php');
// $obj = PHPExcel_IOFactory::load($file);
// foreach ($obj->getWorksheetIterator() as $sheet) {
// $getHighestRow = $sheet->getHighestRow();
// print_r($getHighestRow);
// for ($i = 0; $i <= $getHighestRow; $i++) { // $model=$sheet->getCellByColumnAndRow(0, $i)->getValue();
    // $category = $sheet->getCellByColumnAndRow(1, $i)->getValue();
    // $price = $sheet->getCellByColumnAndRow(2, $i)->getValue();
    // $desc = $sheet->getCellByColumnAndRow(3, $i)->getValue();

    // // if ($name != '') {
    // // $stmt = $pdo->prepare("INSERT INTO transport(modelName,price,category,description) VALUES(:model,:price,:category,:desc)");
    // // $stmt->bindParam(':model', $model);
    // // $stmt->bindParam(':price', $price);
    // // $stmt->bindParam(':category', $category);
    // // $stmt->bindParam(':desc', $desc);
    // // }
    // }
    // }
    // } else {
    // echo "Invalid file format";
    // }
    // }