<?php
$user = $db_panel->getLoginByID($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ExileAdmin | <?php if(empty($title)) {echo 'Dashboard'; } else { echo $title;}?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="../dist/css/dashboard.css">


    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/custom.js"></script>

    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>E</b>AD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Exile</b>Admin</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo $user['path'] ?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo $user['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo $user['path'] ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $user['username'] ?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="index.php?site=profile" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="include/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $user['path'] ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $user['username'] ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="?site=search" method="post" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Name / SteamID">
                    <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header text-center">Main Navigation</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="index.php" ><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="index.php?site=territories" onclick="return loadSite('content')"><i class="fa fa-flag"></i> <span>Territories</span><span
                                class="pull-right-container"><small
                                    class="label pull-right bg-blue"><?php echo number_format(implode(array_column($db_exile->sumTerritories(), 'sum'))); ?></small></span></a></li>
                <li><a href="index.php?site=vehicles"><i class="fa fa-car"></i> <span>Vehicles</span><span
                                class="pull-right-container"><small
                                    class="label pull-right bg-blue"><?php echo number_format(implode(array_column($db_exile->sumVehicles(), 'sum'))); ?></small></span></a></li>
                <li><a href="index.php?site=logs"><i class="fa fa-bar-chart"></i> <span>Logs</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
