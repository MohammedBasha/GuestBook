<?php
ob_start();
include '../includes/config.php';
include '../includes/usersClass.php';
include '../templates/frontend/header.php';

if(usersClass::check()) header('LOCATION: index.php');

$user = new usersClass();

if (count($_POST) > 0) {
    if ($user->login($_POST['username'], $_POST['password'])) {
        header("LOCATION: index.php");
    } else {
        header('refresh:3;url=login.php');
    }
} else {

    ?>
    <div class="login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
<?php
}
include '../templates/frontend/footer.php';
ob_end_flush();
?>