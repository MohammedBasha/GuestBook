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
        foreach($allMessages as $message){
            $title = $message['title'];
            $msg   = $message['message'];
            $date   = $message['date'];
    ?>
        <div class="block">
            <div class="user-image">
                <img src="assets/frontend/images/user-image.png" alt="image">
            </div>
            <div class="text-message">
                <div><i class="fa fa-calendar"></i><span><?php echo $date; ?></span></div>
                <h1><?php echo $title; ?></h1>
                <p><?php echo $msg; ?></p>
            </div>
        </div>
    <?php } ?>
            <div class="clearfix"></div>
            <div class="message-success"><span>sucess!</span></div>
            <div class="message-error"><span>error!</span></div>
            <form action="add.php" method="post">
                <label for="name">name</label>
                <input type="text" name="name" id="name"><br/>
                <label for="email">email</label>
                <input type="text" name="email" id="email"><br/>
                <label for="phone">phone</label>
                <input type="text" name="phone" id="phone"><br/>
                <label for="title">Message title</label>
                <input type="text" name="title" id="title"><br/>
                <label for="message">Message body</label>
                <textarea name="message" id="message"></textarea></br>
                <button type="submit" class="btn-success">Add message</button>
            </form>  
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