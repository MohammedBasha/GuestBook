<?php

include 'includes/config.php';
include 'includes/message.php';
include 'includes/messagesClass.php';
include 'templates/frontend/header.php';

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

<?php
include 'templates/frontend/footer.php';
?>