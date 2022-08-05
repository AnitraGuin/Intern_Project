<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST["send"])){
    $sender_name = $_POST["sender_name"];
    $sender = $_POST["sender"];
    $sender_password = $_POST["sender_password"];
    $subject = $_POST["subject"];
    $attachments = $_FILES["attachments"]["name"];
    $recipients = $_FILES["recipient"]["name"];
    $body = $_POST["body"];


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = 0;                 //Enable verbose debug output
      $mail->isSMTP();                      //Send using SMTP
      $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
      $mail->SMTPAuth   = true;             //Enable SMTP authentication
      $mail->Username   = $sender;          //SMTP username
      $mail->Password   = $sender_password;   //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
      $mail->Port       = 587;               //TCP port to connect to; use 587
      $mail->Port       = 465;               //SSL port

      //Recipients
      $mail->setFrom($sender, $sender_name);

      for ($i=0; $i < count($recipients); $i++) {
        $file_tmp = $_FILES["recipient"]["tmp_name"][$i];
        $file_name = $_FILES["recipient"]["name"][$i];
        move_uploaded_file($file_tmp, "recipients/" . $file_name);
        //$mail->addAttachment("attachments/" . $file_name);  
     }
      //print_r($recipients);
  
      $total = count($recipients);
  
      // Loop through each file
      for( $i=0 ; $i < $total ; $i++ ) {
          $fileName = $_FILES['recipient']["name"][$i];   
      }
      
      $csv = $fileName;
      $fh = fopen($csv, 'r');
      $invalid = fopen("invalid.csv", 'a');
            while(list($email) = fgetcsv($fh, 1024, ',')){
              $sntz_email = filter_var($email, FILTER_SANITIZE_EMAIL);
              if(filter_var($sntz_email, FILTER_VALIDATE_EMAIL)){
                printf("<p> %s </p>", $sntz_email);
                $mail->addAddress($sntz_email);
      
              }else{
              print($sntz_email." ---->>>>This is an Invalid Email <br>");
              //$csv1 = 'C:\\xampp\\htdocs\\internship_project2\\invalid.csv';
              
              /*$no_rows = count(file("invalid.csv"));
              if($no_rows > 1){
                  $no_rows = ($no_rows - 1) + 1;
              }*/
              
              $form_data = array(
                  'email' => $sntz_email
              );
              fputcsv($invalid, $form_data);
              
              }
      
          }


      /*foreach ($recipients as $recipient) {
          $mail->addAddress($recipient);
        }*/
     
     

     //Attachments
      for ($i=0; $i < count($attachments); $i++) {
        $file_tmp = $_FILES["attachments"]["tmp_name"][$i];
        $file_name = $_FILES["attachments"]["name"][$i];
        move_uploaded_file($file_tmp, "attachments/" . $file_name);
        $mail->addAttachment("attachments/" . $file_name);  
     }
    
     
     

     //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = $subject;
     $mail->Body    = $body;
     

     $mail->send();
     echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }

}
?>