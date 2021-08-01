<?php

include 'includes/config.php';
include 'includes/messagesClass.php';

$messagesClass = new messagesClass();
$publishedMessages = $messagesClass->getMessages('WHERE published = 1 ORDER BY id DESC');

include 'templates/frontend/index.php';