<?php

include '../includes/config.php';
include '../includes/messagesClass.php';
include '../templates/admin/header.php';

try {
    $id = isset($_GET['id'])? (int)$_GET['id'] : 0;
    $messages = new messagesClass();
    $allMessages = $messages->deleteMessage($id);
    echo $allMessages? 'deleted' : 'not deleted';
    header("refresh:3;url=index.php");
} catch (Exception $e) {
    echo 'Error deleting message ' . $e->getMessage();
    header("refresh:3;url=index.php");
}

include '../templates/admin/footer.php';