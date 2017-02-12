<?php
$title = 'Dashboard';
require_once(ROOT_PATH . 'include/header.php')
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="contentDash">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Dashboard</h3>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Dashboard
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <span class="label label-danger">Total</span>
                        </div>
                        <h3 class="box-title">Total Poptabs</h3>
                    </div>
                    <div class="box-body">
                        <h2 class="no-margin">
                            <?php echo number_format(implode(array_column($db_exile->sumMoney(), 'sum'))); ?>
                        </h2>
                        Average
                        <span class="pull-right text-red">
                            <?php echo number_format(implode(array_column($db_exile->avgMoney(), 'avg'))); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <span class="label label-danger">Total</span>
                        </div>
                        <h3 class="box-title">Total Respect</h3>
                    </div>
                    <div class="box-body">
                        <h2 class="no-margin">
                            <?php echo number_format(implode(array_column($db_exile->sumRespect(), 'sum'))); ?>
                        </h2>
                        Average
                        <span class="pull-right text-red">
                            <?php echo number_format(implode(array_column($db_exile->avgRespect(), 'avg'))); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <span class="label label-danger">Total</span>
                        </div>
                        <h3 class="box-title">Total Territories</h3>
                    </div>
                    <div class="box-body">
                        <h2 class="no-margin">
                            <?php echo number_format(implode(array_column($db_exile->sumTerritories(), 'sum'))); ?>
                        </h2>
                        Latest Territory
                        <span class="pull-right text-red">
                            <?php echo implode(array_column($db_exile->lastTerritory(), 'name')); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <span class="label label-danger">Total</span>
                        </div>
                        <h3 class="box-title">Total Constructions</h3>
                    </div>
                    <div class="box-body">
                        <h2 class="no-margin">
                            <?php echo number_format(implode(array_column($db_exile->sumConstructions(), 'sum'))); ?>
                        </h2>
                        Average
                        <span class="pull-right text-red">
                            <?php echo implode(array_column($db_exile->avgConstructions(), 'avg')); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="position: relative">
            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <span class="label label-danger">Past 24H</span>
                        </div>
                        <h3 class="box-title">Unique Connections</h3>
                    </div>
                    <div class="box-body" style="height: 74px">
                        <h2 class="no-margin">
                            <?php
                            echo number_format(implode(array_column($db_exile->countPlayers(), 'count')));
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <span class="label label-danger">Total</span>
                        </div>
                        <h3 class="box-title">Players Joined</h3>
                    </div>
                    <div class="box-body">
                        <h2 class="no-margin">
                            <?php echo number_format(implode(array_column($db_exile->sumPlayers(), 'sum'))); ?>
                        </h2>
                        Latest Member
                        <span class="pull-right text-red">
                            <?php echo implode(array_column($db_exile->lastMember(), 'name')); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="position: relative;">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Player List</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="accounts" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Name
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">SteamID</th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Poptabs
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Respect
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($db_exile->getAccounts() == null) { ?>
                                <tr>
                                    <td colspan="4" class="text-red text-center h4">No Players in Database</td>
                                </tr>
                            <?php } else { ?>
                                <script type="text/javascript">loadTable('accounts')</script>
                            <?php
                            foreach ($db_exile->getAccounts() as $item) { ?>
                                <tr>
                                    <td>
                                        <form action="player" method="post"><a href="javascript:"
                                                                               onclick="parentNode.submit();"><?php echo $item['name'] ?></a><input
                                                    type="hidden" name="uid" value="<?php echo $item['uid'] ?>"/>
                                        </form>
                                    </td>
                                    <td><?php echo $item['uid'] ?></td>
                                    <td><?php $money = $db_exile->getMoney($item['uid']);
                                        echo $money['money'] ?></td>
                                    <td><?php echo $item['score'] ?></td>
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
            <div class="col-md-12">
            <div class="row" style="">
                <p class="clearfix">
                <div class="col-md-6" style="">
                    <div class="box box-danger fixed">
                        <div class="box-header with-border">
                            <h3 class="box-title">Online Players</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="onlinePlayer" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                        Name
                                    </th>
                                    <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">GUID</th>
                                    <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                        colspan="1" aria-sort="descending">IP
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                        Ping
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($rcon == null || $rcon->getOnlinePlayers() == null) {
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-red text-center h4">No Players Online</td>
                                    </tr>
                                <?php } else { ?>
                                    <script type="text/javascript">loadTable('onlinePlayer')</script>
                                <?php
                                foreach ($rcon->getOnlinePlayers() as $result) { ?>
                                    <tr>
                                        <td><?php echo $result[7] ?></td>
                                        <td><?php echo $result[5] ?></td>
                                        <td><?php echo $result[2] ?></td>
                                        <td><?php echo $result[4] ?></td>
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
                <p class="clearfix">
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Staff Chat</h3>
                        </div>
                        <div class="box-body">
                            <h2></h2>
                        </div>
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

