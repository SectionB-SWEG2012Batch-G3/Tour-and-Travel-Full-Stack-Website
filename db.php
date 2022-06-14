<?php
require_once "./dbconfig/connection.php";

$conn = mysqli_connect("localhost", "root", "", "student");
if (!$conn->error) {
    $res = $conn->query("SELECT * FROM aastu_stud");
    $sql = "INSERT INTO aastu_stud(name,dept,section,age) VALUES(?,?,?,?)";
    echo "<pre>";
    // while ($row = $res->fetch_assoc()) {
    //     print_r($row);
    // }
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('sssi', $name, $dept, $sec, $age);
    $name = "hayme";
    $dept = "Soft";
    $sec = "A";
    $age = 22;
    $stmt->execute();

    $name = "hayme2";
    $dept = "Soft";
    $sec = "B";
    $age = 23;
    $stmt->execute();

    $name = "hayme3";
    $dept = "Soft";
    $sec = "C";
    $age = 24;
    $stmt->execute();

    $name = "hayme4";
    $dept = "Soft";
    $sec = "D";
    $age = 25;
    $stmt->execute();

    echo '<br>' . $conn->insert_id;
} else {
    echo $conn->error;
}
