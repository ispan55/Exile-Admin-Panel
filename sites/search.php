<?php
$title = 'Search';
require_once(ROOT_PATH . 'include/header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>Search Result</h3>
        <ol class="breadcrumb">
            <li>
                <a href=".">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">
                Search
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Search Result</h3>
                    </div>
                    <div class="box-body">
                        <table id="search" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Name
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">
                                    SteamID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Pop Tabs
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Respect
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Last Connected
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Join Date
                                </th>
                                <th tabindex="0" aria-disabled="true" rowspan="1" colspan="1">View Account</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_GET['q'])) {
                                $search = $_GET['q'];
                            }
                            $search = preg_replace('/\s+/', '', $search);
                            if ($db_exile->getAccount($search) == null) { ?>
                                <tr>
                                    <td colspan="7" class="text-red text-center h4">No Search Result</td>
                                </tr>
                                <?php } else { ?>
                                <script type="text/javascript">loadTable('search')</script>
                            <?php
                                foreach ($db_exile->getAccount($search) as $item) { ?>
                                    <tr>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo $item['uid'] ?></td>
                                        <td><?php $money = $db_exile->getMoney($item['uid']);
                                        echo number_format($money['money'])?></td>
                                        <td><?php echo number_format($item['score']) ?></td>
                                        <td><?php echo $item['last_connect_at'] ?></td>
                                        <td><?php echo $item['first_connect_at'] ?></td>
                                        <td style="width: 200px"><form method="post" action="player">
                                                <button type="submit" class="btn btn-warning" name="uid" style="width: 180px"
                                                        value="<?php echo $item['uid'] ?>">Edit User
                                                </button>
                                            </form>
                                        </td>
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