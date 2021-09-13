<?php

    require_once("./PHPMailer/src/PHPMailer.php");
    require_once("./PHPMailer/src/SMTP.php");

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

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = "mail.smtp2go.com";
        $mail->SMTPAuth = true;
        $mail->Username = "bicol-u.edu.ph";
        $mail->Password = "Y203NDB1Znd2aWQw";
        $mail->SMTPSecure = "tls";
        $mail->Port = "2525";
        $mail->From = "educdepartment@bicol-u.edu.ph";
        $mail->FromName = "BUPC Education Department";
        $mail->addAddress($buEmail);
        $mail->isHTML(true);
        $mail->Subject = "Your Account has been verified";
        $mail->Body = $body;
        $mail->AltBody = "This is the plain text version of the email content!";

        if (!$mail->send()) {
            echo "Mailer Error";
        }else{
           echo '<script type="text/javascript">window.location="index.php"</script>';
        }

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