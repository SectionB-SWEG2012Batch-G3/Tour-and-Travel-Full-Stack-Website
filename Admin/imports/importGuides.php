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
        $sql = 'INSERT INTO tourguide (name,lname,email,password,age,gender,qualification,experience,lang,services,salaryPerHour,resume) VALUES(:fname,:lname,:email,:password,:age,:gender,:qualification,:Experience,:lang,:services,:salary,:resume)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':qualification', $qualification);
        $stmt->bindParam(':Experience', $Experience);
        $stmt->bindParam(':lang', $lang);
        $stmt->bindParam(':services', $services);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':resume', $resume);
        foreach ($data as $row) {
            if ($count > 0) {
                $fname = $row[1];
                $lname = $row[2];
                $email = $row[3];
                $password = $row[4];
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $age = $row[6];
                $gender = $row[5];
                $qualification = $row[7];
                $Experience = $row[8];
                $lang = $row[9];
                $services = $row[10];
                $salary = $row[11];
                $resume = $row[12];
                $stmt->execute();
            } else {
                $count = 1;
            }
        }

        $tourguide = 'tourguide';
        foreach ($data as $row) {
            if ($count > 0) {
                $email = $row[3];
                $password = $row[4];
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $stmt2 = $pdo->prepare("INSERT INTO user(email,password,role) VALUES(:email,:pass,:role)");
                $stmt2->bindParam(':email', $email);
                $stmt2->bindParam(':pass', $hashedPassword);
                $stmt2->bindParam(':role', $tourguide);
                $stmt2->execute();
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
