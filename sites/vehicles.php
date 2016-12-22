<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Vehicles</h3>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Vehicles
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
                            <?php
                            $sum = number_format(implode(array_column($db_exile->sumVehicles(), 'sum')));
                            if ($sum < 2) {
                                echo $sum;
                                echo ' Vehicle';
                            } else {
                                echo $sum;
                                echo ' Vehicles';
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="vehicle" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Vehicle
                                </th>
                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-disabled="true">
                                    Owner
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Pin Code
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Locked / Unlocked
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($db_exile->getVehicles() == null) { ?>
                                <tr>
                                    <td colspan="4" class="text-red text-center h4">No Vehicles in Database</td>
                                </tr>
                                <?php } else { ?>
                                <script type="text/javascript">loadTable('vehicle')</script>
                            <?php
                                foreach ($db_exile->getVehicles() as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['class'] ?></td>
                                        <td><?php echo implode(array_column($db_exile->uidToName($item['account_uid']), 'name')) ?></td>
                                        <td><?php echo $item['pin_code'] ?></td>
                                        <td><?php if ($item['is_locked'] == 1) {
                                                echo '<span class="label label-danger">Locked';
                                            } else {
                                                echo '<span class="label label-success">Unlocked';
                                            }?></td>
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