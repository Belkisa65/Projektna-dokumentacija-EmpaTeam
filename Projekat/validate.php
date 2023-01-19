<?php
include_once('conn.php');

if ($_SERVER["REQUEST_METHOD"]== "post") {
     
    $adminname = test_input($_POST["name"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['name'] == $adminname) && 
            ($user['password'] == $password)) {
                header("Location: admin.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
?>