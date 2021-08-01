<?php

include 'includes/config.php';
include 'includes/messagesClass.php';
include 'templates/frontend/header.php';

$messagesClass = new messagesClass();
$publishedMessages = $messagesClass->getMessages('WHERE published = 1 ORDER BY id DESC');

?>

<section class="blog">
    <div class="container">
        <?php
        if(!empty($publishedMessages)) {
            foreach ($publishedMessages as $message) {
                $title = $message['title'];
                $msg = $message['message'];
                $date = $message['date'];
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
            <?php }
        } else {
            echo 'No messages.';
        }?>
        <div class="clearfix"></div>
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

<?php
include 'templates/frontend/footer.php';
?>