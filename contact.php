<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



if(isset($_POST['submit'])) {

    $uploaddir = 'upload/';
    
    if (isset($_FILES['file']['name'])) { 
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
    
    } else {
        $uploadfile = "";
    
    }
  
  if(isset($_POST['name']) && $_POST['name']!='') {
    $sender_name = $_POST['name'];
  }

  if(isset($_POST['email']) && $_POST['email']!='') {
    $sender_email = $_POST['email'];
  }

   if(isset($_POST['text']) && $_POST['text']!='') {
    $message = $_POST['text'];
  }

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );
    $mail->isSMTP();                                           // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'vlad@pointmars.rs';                     // SMTP username
    $mail->Password   = '1635marijamarkovic1635';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('vlad@pointmars.rs', 'Contact Form');
    $mail->addAddress($sender_email);     // Add a recipient
    $mail->addAddress('ivlad@pointmars.rs');               // Name is optional


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Email from vogue.rs';
    $mail->Body    = 'Email from: '.$sender_name.'<br>
                      Sender email: '.$sender_email.'<br>
                      Message: '.$message.'';
    $mail->AddAttachment($uploadfile);               

    $mail->AltBody = 'Email from: '.$sender_fullname.'
                      Sender email: '.$sender_email.'
                      Message: '.$message.'';

    $mail->send();

    $email_sent = TRUE;
    // echo "<div id='contact-form-message-success' onclick='window.location.replace(window.location.href);'>Message has been sent</div>";
    } catch (Exception $e) {

    $email_sent = FALSE;
    // echo "<div id='contact-form-message-error' onclick='window.location.replace(window.location.href);'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }


}
?>

<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="VOGUE Muško Ženski frizerski salon">
  
  
  <title>VOGUE</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/as-pie-progress/css/progress.min.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>

  <section class="menu cid-s1YLZwONfz" once="menu" id="menu1-1">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="#start">V O G U E</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-white display-4" href="/index.html">Početna</a>
                    </li></ul>
                <div class="icons-menu">
                    <a href="https://mobirise.com/" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a href="https://mobirise.com/" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>     
                </div>
            </div> 
        </div>    
    </nav>
</section>

<section class="form1 cid-s1YMhHggsQ" id="form1-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto mbr-form" data-form-type="formoid">
                <!--Formbuilder Form-->
                <form action="/conection.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="gL2BXTvKSxkxAIsvl9MhpJwDB4otzID0sGMz5Nl6TthsICbSQebZRg3lO33HMTQje1MWPVRJkFYwde9RDiLvVQeSa/1KZLSLWgEjfMVtB36WI41L25lhOjFrk3hrTKEh">
                    <div class="form-row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Hvala što ste nam pisali!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! Došlo je do problema!</div>
                    </div>
                    <div class="dragArea form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="mbr-bold mbr-fonts-style display-2">Pišite Nam</h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="pb-4 mbr-fonts-style display-7">Ako imate neki predlog,zapažanje ili želite da nam kažete nešto uradite odve.</p>
                        </div>
                        <div data-for="name" class="col form-group">
                            <input type="text" name="name" placeholder="Ime" data-form-field="name" class="form-control display-7" value="" id="name-form1-9">
                        </div>
                        <div class="col form-group" data-for="email">
                            <input type="text" name="email" placeholder="Email" data-form-field="email" class="form-control display-7" value="" id="email-form1-9">
                        </div>
                        <div class="col form-group" data-for="text">
                            <input type="text" name="text" placeholder="Poruka" data-form-field="text" class="form-control display-7" value="" id="email-form1-9">
                        </div>
                        <div class="col-auto"><button type="submit" class="btn btn-primary display-4"><span class="mobi-mbri mobi-mbri-edit mbr-iconfont mbr-iconfont-btn"></span>Pošaljite</button>
                        </div>
                    </div>
                </form>
                <!--Formbuilder Form-->
            </div>
        </div>
    </div>
</section>

<script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/as-pie-progress/jquery-as-pie-progress.min.js"></script>
  <script src="assets/playervimeo/vimeo_player.js"></script>
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script> 
  
</body>

</html>