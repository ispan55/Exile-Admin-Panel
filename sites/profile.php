<?php
$title = 'Profile';
require_once(ROOT_PATH . 'include/header.php');
$user = $db_panel->getLoginByID($_SESSION['user_id']);
require_once(ROOT_PATH . 'include/class/profile.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Profile</h3>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Profile
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo $user['picture'] ?>"
                             alt="Profile Picture">
                        <h3 class="profile-username text-center"><?php echo $user['username'] ?></h3>
                        <p class="text-muted text-center"></p>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <div class="box-body">

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#pass">Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="username" id="inputUsername"
                                               value="<?php echo $user['username'] ?>" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="inputName"
                                               value="<?php echo $user['name'] ?>" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file" class="col-sm-2 control-label">Change Picture</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="file" id="file" accept="image/*">
                                    </div>
                                </div>
                                <!--                                <div class="form-group">
                                                                    <label for="inputName" class="col-sm-2 control-label">Username</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" style="visibility:hidden;" class="form-control" id="inputName" placeholder="Username" value="Tesad">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputName" class="col-sm-2 control-label">Username</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputName" placeholder="Username">
                                                                    </div>
                                                                </div>-->
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                                <span class="text-center text-red"><?php if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    } ?></span>
                            </form>
                        </div>
                        <div id="pass" class="tab-pane fade">
                            Test
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once(ROOT_PATH . 'include/footer.php') ?>