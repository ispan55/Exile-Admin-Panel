<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Territories</h3>
        <ol class="breadcrumb">
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Territories
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
                            $sum = number_format(implode(array_column($db_exile->sumTerritories(), 'sum')));
                            if ($sum < 2) {
                                echo $sum;
                                echo ' Territory';
                            } else {
                                echo $sum;
                                echo ' Territories';
                            }
                            ?>
                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="territory" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Territory Name
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">Owner</th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Radius
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Level
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Last Paid Rent
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($db_exile->getTerritories() == null) { ?>
                                <tr>
                                    <td colspan="5" class="text-red text-center h4">No Territories in Database</td>
                                </tr>
                                <?php } else { ?>
                                <script type="text/javascript">loadTable('territory')</script>
                            <?php
                                foreach ($db_exile->getTerritories() as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo implode(array_column($db_exile->uidToName($item['owner_uid']), 'name')) ?></td>
                                        <td><?php echo $item['radius'] ?></td>
                                        <td><?php echo $item['level'] ?></td>
                                        <td><?php echo $item['last_paid_at'] ?></td>
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
