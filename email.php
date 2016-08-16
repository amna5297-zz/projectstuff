<?php

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "Email";

    // Create connection
    $con = new mysqli($servername, $username, $password_db);
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 

    // Create database
    $sql = "CREATE DATABASE if not exists Email";

    if ($con->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $con->close();
    


    $fname = $_POST["fname"];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $link =  rand(1000,5000);

    $verification = $email.$link;
    echo "<br><br>";
    echo $verification;
    

    require 'PHPMailer/PHPMailerAutoload.php';

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
    
    echo "<br><br>";
    $bodyContent = '<h1 style="color:blue;">To verify your email click on the link bellow to continue</h1>';
    $bodyContent .= "<p></b><a href='localhost/NIMUN/activate.php?activate_link=$link'>                         
                                <button type='button'>VERIFY!</button>
                            </form></a></p>";

    $mail->Subject = 'NIMUN Registration-Email Verification';
    $mail->Body    = $bodyContent;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } 
    
    else {
        echo 'Message has been sent';
        echo "<br><br>";
    }


    //Create table
    $conn = new mysqli($servername, $username, $password_db, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    
    $sql = "CREATE TABLE if not exists Delegates (
            email VARCHAR(50) PRIMARY KEY,
            password VARCHAR(100),
            link INT,
            activated VARCHAR(6)
            )";
    
    if ($conn->query($sql) === TRUE) {
            echo "Table Delegates created successfully"."<br>";
    }
    else {
            echo "Error creating table: " . $conn->error;
    }



    //INSERT INTO DELEGATES

     $sql = "INSERT INTO Delegates ( email, password,link, activated)
                        VALUES ('$email','$password', '$link','false')";

     if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
     } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
     }


    $conn->close();
?>



"<p></b><a href='localhost/NIMUN/activate.php?activate_link=' + $link>                         
                                <button type='button'>VERIFY!</button>
                            </form></a></p>"