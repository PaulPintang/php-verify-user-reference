<?php

    $db = mysqli_connect('localhost', 'root', '', 'db_signup');

    if(isset($_POST['signup'])){
        $name= $_POST['name'];
        $cyear = $_POST['cyear'];
        $studentId = $_POST['studentId'];

        mysqli_query($db, "INSERT INTO signupUser (name, cyear, studentId) VALUES ('$name', '$cyear', '$studentId')");
        header("location: index.php");
    }

     $results = mysqli_query($db, "SELECT * FROM signupUser");
     $verified = mysqli_query($db, "SELECT * FROM verifiedUser");

    //  ADMIN PROCESS
    if (isset($_POST['verify'])) {
        $id = $_POST['id'];
        $name= $_POST['name'];
        $cyear = $_POST['cyear'];
        $studentId = $_POST['studentId'];
        
        mysqli_query($db, "INSERT INTO verifiedUser (name, cyear, studentId) VALUES ('$name', '$cyear', '$studentId')");
        mysqli_query($db, "DELETE FROM signupUser WHERE id=$id");
        header("location: index.php");
    }
    
     if (isset($_GET['decline'])) {
            $id = $_GET['decline'];
            
            mysqli_query($db, "DELETE FROM signupUser WHERE id=$id");
            header('location: index.php');
        }

    $sql = "SELECT count(id) AS total FROM signupUser";
    $rows_results = mysqli_query($db, $sql);
    $values = mysqli_fetch_assoc($rows_results);
    $num_rows = $values['total'];
?>