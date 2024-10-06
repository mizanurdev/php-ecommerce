<?php
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;                    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require_once("../db/config.php");

 

    if(isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['password'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $code = rand(1,1000000);

        //username and email unique check start
        $query = "SELECT * FROM user where username='$username' OR email='$email'";
        $sql = $conn->query($query);
        if($sql->num_rows>0){
            header("location: signup.php?msg=username or email already exist");
        }else{
            $insertQuery = "INSERT INTO user(name,username,email,password,code) VALUES('$name','$username','$email','$password',$code)";
            $sql = $conn->query($insertQuery);
            // echo ($sql) ? "ok" : "sorry";
            if($sql){
                //mail start
                $mail = new PHPMailer(true);                              
                try {
                    $mail->isSMTP(); // using SMTP protocol                                     
                    $mail->Host = 'sandbox.smtp.mailtrap.io'; // SMTP host as gmail 
                    $mail->SMTPAuth = true;  // enable smtp authentication                             
                    $mail->Username = 'cd55d7e9fcbefa';  // sender gmail host              
                    $mail->Password = 'd78d6b12bca2c3'; // sender gmail host password  
                    $mail->Port = 2525;   // port for SMTP   
                    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
                    $mail->isHTML(true); 
                    $mail->setFrom('mizancse2018@gmail.com', "PHPLEARN"); // sender's email and name
                    $mail->addAddress($email,$name);  // receiver's email and name
                    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                    $mail->Subject = 'Email verification From PHPLEARN';
                    $mail->Body    =  "Love PHPLEARN </br> Your code is : {$code}"; 
                    $mail->send();

                            // echo 'Message has been sent';
                        } catch (Exception $e) { // handle error.
                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        }
                //mail end
                header("location: userCodeUpdate.php?msg=save");
            }else{
                header("location: signup.php");
            }
        }
        //username and email unique check end
    }else{
        header("location: signup.php");
    }
?>