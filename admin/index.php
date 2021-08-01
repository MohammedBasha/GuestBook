<?php

include '../includes/config.php';
include '../includes/messagesClass.php';

$messages = new messagesClass();
$allMessages = $messages->getMessages('ORDER BY id DESC');

include '../templates/admin/index.php';