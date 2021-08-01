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
}