<?php
ob_start();
include '../includes/config.php';
include '../includes/messagesClass.php';
include '../includes/usersClass.php';

if(!usersClass::check()) header('LOCATION: login.php');

$messages = new messagesClass();
$allMessages = $messages->getMessages('ORDER BY id DESC');

include '../templates/admin/header.php';

?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- /.col -->
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All messages</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Controls</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(!empty($allMessages)) {
                                    foreach($allMessages as $message) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $message['id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['title']; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['message']; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['phone']; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['published']? 'published' : 'unpublished'; ?>
                                            </td>
                                            <td>
                                                <?php echo $message['date']; ?>
                                            </td>
                                            <td>
                                                <a href="update.php?id=<?php echo $message['id']; ?>" title="Update Message" class="btn btn-block btn-warning">Update</a>
                                                <a href="delete.php?id=<?php echo $message['id']; ?>" title="Delete Message" class="btn btn-block btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="9">No messages</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../templates/admin/footer.php';
ob_end_flush();
?>