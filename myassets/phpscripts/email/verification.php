<?php
    $flag = false;

    $email = $_POST["email"];
    $password = $_POST["password"];

    $verificationlink = randomString();

    $server_name = $_SERVER['SERVER_NAME'];

    $status = "N";

    include("../dbconnect.php");

    $stmt = $conn->prepare("INSERT INTO Users (username, password, link, activated) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $password, $verificationlink, $status);

    if($stmt->execute()){
        $flag = true;
    }
    else{
        $flag = false;
    }

    $conn->close();

    if(!($flag)){
        die("n");
    }
    require '../PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = '14bscsaabdul@seecs.edu.pk';          // SMTP username
    $mail->Password = 'AMN@1995'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom('14bscsaabdul@seecs.edu.pk', 'NIMUN');
    $mail->addReplyTo('14bscsaabdul@seecs.edu.pk', 'NIMUN');
    $mail->addAddress($email);   // Add a recipient
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

    $path = $servername.'/NIMUN/activate.php?link='.$verificationlink;

    $bodyContent = '<h1 style="color:blue;">To verify your email click on the link below to continue</h1>';
    $bodyContent .= "<p><a href='$path'>
                                <button type='button'>VERIFY!</button>
                            </a></p>";

    $mail->Subject = 'NIMUN Registration-Email Verification';
    $mail->Body    = $bodyContent;

    if(!$mail->send()) {
        $flag = false;
    }
    else {
        $flag = true;
    }





    if($flag){
      echo "y";
    }
    else{
      echo "n";
    }

    function randomString($length = 30) {
        $link = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $link .= $characters[$rand];
        }
        return $link;
    }
?>
