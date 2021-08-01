<!DOCTYPE html>
<html>
<head>
    <title>GUEST BOOK</title>
    <meta charset="utf-8">
    <!--internet explore meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--first mobile meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.css">
    <link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/frontend/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/frontend/css/style.css">
    <script src="assets/frontend/js/html5shiv.min.js"></script>
    <script src="assets/frontend/js/respond.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">GUEST BOOK</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<section class="blog">
    <div class="container">
<?php

include 'includes/config.php';
include 'includes/message.php';
include 'includes/messagesClass.php';

if (count($_POST) > 0) {
    $message = new message();
    $message->setTitle($_POST['title']);
    $message->setMessage($_POST['message']);
    $message->setName($_POST['name']);
    $message->setEmail($_POST['email']);
    $message->setPhone($_POST['phone']);

    $messageAdd = new messagesClass();
    $messageAdd->addMessage($message);

    echo '<div class="message-success"><span>Message sent! you will be redirected to Home</span></div>';
    header("refresh:5;url=index.php");
} else {
    echo '<div class="message-error"><span>Error sending message! you will be redirected to Home</span></div>';
    header("refresh:5;url=index.php");
}
?>
    </div>
    </div>
</section>
<footer>
    <p>&copy; copy rights <?php echo date('Y'); ?></p>
</footer>
<!-- end modal enter -->
<script src="assets/frontend/js/jquery.min.js"></script>
<script src="assets/frontend/js/bootstrap.min.js"></script>
<script src="assets/frontend/js/jquery.nicescroll.min.js"></script>
<script src="assets/frontend/js/scripts.js"></script>
</body>
</html>
