<?php
$title = 'Banlist';
require_once(ROOT_PATH . 'include/header.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Bans</h3>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Bans
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div id="table1" class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Bans
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="ban" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Ban ID
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">GUID</th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Reason
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Banned until
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($rcon->getBanArray() == null) { ?>
                                <tr>
                                    <td colspan="5" class="text-red text-center h4">No Ban in Database</td>
                                </tr>
                                <?php } else { ?>
                                <script type="text/javascript">loadTable('ban')</script>
                            <?php
                                foreach ($rcon->getBanArray() as $item) { ?>
                                    <tr>
                                        <td><?php echo $item[0] ?></td>
                                        <td><?php echo $item[1] ?></td>
                                        <td><?php echo $item[3] ?></td>
                                        <td><?php echo $item[2] ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once(ROOT_PATH . 'include/footer.php') ?>
