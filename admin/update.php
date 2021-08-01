<?php
ob_start();
include '../includes/config.php';
include '../includes/message.php';
include '../includes/messagesClass.php';
include '../templates/admin/header.php';

$id = isset($_GET['id'])? (int)$_GET['id'] : 0;
$messageOB = new message();
$messagesClass = new messagesClass();
$message = $messagesClass->getMessage($id);

if (!empty($message)) {
    if (count($_POST) > 0) {
        $messageOB->setId($id);
        $messageOB->setTitle($_POST['title']);
        $messageOB->setMessage($_POST['message']);
        $messageOB->setPublished($_POST['published']);

        $messagesClass->updateMessage($messageOB);
        echo 'Message updated';
        header("refresh:3;url=update.php?id=" . $id);
    } else {
        ?>
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Update message</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="update.php?id=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="name" class="col-form-label">name</label>
                        <input type="text" name="name" id="name" value="<?php echo $message['name']; ?>" class="form-control" disabled>
                    </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">email</label>
                            <input type="text" name="email" id="email" value="<?php echo $message['email']; ?>" class="form-control" disabled>
                        </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">phone</label>
                        <input type="text" name="phone" id="phone" value="<?php echo $message['phone']; ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Message title</label>
                        <input type="text" name="title" id="title" value="<?php echo $message['title']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Message body</label>
                    <textarea name="message" id="message" class="form-control" ><?php echo $message['message']; ?></textarea>
                    </div>
                    <!-- select -->
                    <div class="form-group">
                        <label for="published" class="col-form-label">Status</label>
                        <select class="form-control" name="published">
                            <option value="0" <?php if ($message['published'] == 0) echo 'selected';?>>Unpublished</option>
                            <option value="1" <?php if ($message['published'] == 1) echo 'selected';?>>Published</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <?php
    }
} else {
    echo 'No message found';
}

include '../templates/admin/footer.php';
ob_end_flush();