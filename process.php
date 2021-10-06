<?php

    require("./PHPMailer/src/PHPMailer.php");
    require("./PHPMailer/src/SMTP.php");
    require("./PHPMailer/src/Exception.php");

    $db = mysqli_connect('localhost', 'root', '', 'db_signup');

    if(isset($_POST['signup'])){
        $name= $_POST['name'];
        $cyear = $_POST['cyear'];
        $studentId = $_POST['studentId'];
        $buEmail = $_POST['buEmail'];

        mysqli_query($db, "INSERT INTO signupUser (name, cyear, studentId, buEmail) VALUES ('$name', '$cyear', '$studentId', '$buEmail')");
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
        $buEmail = $_POST['buEmail'];
        
        mysqli_query($db, "INSERT INTO verifiedUser (name, cyear, studentId, buEmail) VALUES ('$name', '$cyear', '$studentId', '$buEmail')");
        mysqli_query($db, "DELETE FROM signupUser WHERE id=$id");

        $body = "
            <h1>Hi $name !!</h1>
            <p>Were happy you signup to our department website <br>
            You can now used your account !!</p>
        ";

      

        if (!$mail->Send()) {
            echo "Mailer Error";
        }else{
           echo '<script type="text/javascript">window.location="index.php"</script>';
        }
        $mail->smtpClose();
    }
    
     if (isset($_GET['decline'])) {
            $id = $_GET['decline'];
            mysqli_query($db, "DELETE FROM signupUser WHERE id=$id");
            header('location: index.php');
        }

        // for notification bell
        $sql = "SELECT count(id) AS total FROM signupUser";
        $rows_results = mysqli_query($db, $sql);
        $values = mysqli_fetch_assoc($rows_results);
        $num_rows = $values['total'];
?>