<?php

include 'includes/config.php';
include 'includes/message.php';
include 'includes/messagesClass.php';

$messages = new message();
$messagesClass = new messagesClass();
$allMessages = $messagesClass->getMessages('WHERE published = 1 ORDER BY id DESC');

include 'templates/frontend/index.php';