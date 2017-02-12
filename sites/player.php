<?php
$title = 'Player';
require_once(ROOT_PATH . 'include/header.php');
require_once(ROOT_PATH . 'include/class/player.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="modal fade" id="modalPlayer" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="modalText"></p>
                    <form>
                        <div class="form-group">
                            <label for="inputReason" class="control-label">Reason: </label>
                            <input type="text" class="form-control" id="inputReason">
                        </div>
                        <div class="form-group" id="formTime">
                            <label for="inputTime" class="control-label">Time to Ban: </label>
                            <input type="text" class="form-control" id="inputTime">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="Player()">YES</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="col-md-6">
                            <span><span class="h4 text-bold">Name: </span><?php echo $user['name'] ?></span>
                            <p style="margin-bottom: 10px"></p>
                            <span><span class="h5 text-bold">Join Date: </span><?php echo $user['first_connect_at'] ?></span>
                            <br>
                            <span><span class="h5 text-bold">Last Seen: </span><?php echo $user['last_disconnect_at'] ?></span>
                            <br>
                            <span><span class="h5 text-bold">SteamID: </span><?php echo $user['uid'] ?></span>
                            <br>
                            <span><span class="h5 text-bold">GUID: </span><?php echo uidtoguid($user['uid']) ?></span>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px">
                            <button class="col-md-6 btn btn-warning" style="position: absolute; width: 45%; left: 10px;" data-toggle="modal" data-target="#modalPlayer" data-name="<?php echo $user['name']?>" data-uid="<?php echo $user['uid']?>" data-typ="Kick">
                                Kick Player
                            </button>
                            <button class="col-md-6 btn btn-facebook" style="position:absolute; left: 50%; width: 45%" data-toggle="modal" data-target="#modalPlayer" data-name="<?php echo $user['name']?>" data-uid="<?php echo $user['uid']?>" data-typ="Temp Ban" >
                                Temp Ban Player
                            </button>
                            <div class="row">
                            <button class="col-md-6 btn btn-danger" style="position:absolute; margin-top: 50px; right: 53%; width: 45%" data-toggle="modal" data-target="#modalPlayer" data-name="<?php echo $user['name']?>" data-uid="<?php echo $user['uid']?>" data-typ="Ban">
                                Ban Player
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-title">
                            Account
                        </div>
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
                        <form class="form-horizontal" action="player" method="post">
                            <div class="form-group">
                                <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputUsername"
                                           value="<?php echo $user['name'] ?>" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSteamID" class="col-sm-2 control-label">SteamID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputSteamID"
                                           value="<?php echo $user['uid'] ?>" placeholder="SteamID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputGUID" class="col-sm-2 control-label">GUID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputGUID"
                                           value="<?php echo uidtoguid($user['uid']) ?>" placeholder="GUID">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPoptabs" class="col-sm-2 control-label">Poptabs</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="poptabs" id="inputPoptabs"
                                           value="<?php echo $money['money'] ?>" placeholder="Poptabs" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRespect" class="col-sm-2 control-label">Respect</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="respect" id="inputRespect"
                                           value="<?php echo $user['score'] ?>" placeholder="Respect" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLastOnline" class="col-sm-2 control-label">Last Online</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputLastOnline"
                                           value="<?php echo $user['last_disconnect_at'] ?>" placeholder="Last Online">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputJoinDate" class="col-sm-2 control-label">Join Date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputJoinDate"
                                           value="<?php echo $user['first_connect_at'] ?>" placeholder="Join Date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputConnections" class="col-sm-2 control-label">Total Connections</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputConnections"
                                           value="<?php echo $user['total_connections'] ?>" placeholder="Total Connections">
                                </div>
                            </div>
                                <input type="hidden" name="uid" value="<?php echo $_POST['uid']?>" />

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="updateAccount" class="btn btn-success">Update Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-title">
                            Player Record
                        </div>
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
                        <form class="form-horizontal" action="player" method="post">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="inputName"
                                           value="<?php echo $player['name'] ?>" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHunger" class="col-sm-2 control-label">Hunger</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hunger" id="inputHunger"
                                           value="<?php echo $player['hunger'] ?>" placeholder="Hunger" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputThirst" class="col-sm-2 control-label">Thirst</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="thirst" id="inputThirst"
                                           value="<?php echo $player['thirst'] ?>" placeholder="Thirst" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPWeapon" class="col-sm-2 control-label">Primary Weapon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="p_weapon" id="inputPWeapon"
                                           value="<?php echo $player['primary_weapon'] ?>" placeholder="Primary Weapon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHandgun" class="col-sm-2 control-label">Handgun</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="handgun" id="inputHandgun"
                                           value="<?php echo $player['handgun_weapon'] ?>" placeholder="Handgun">
                                </div>
                            </div>
                            <input type="hidden" name="uid" value="<?php echo $_POST['uid']?>" />

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="updateRecord" class="btn btn-success">Update Player Record</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h2 class="box-title">Vehicles</h2>
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
                        <table id="player_vehicle" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Vehicle
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">Pin Code</th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Locked / Unlocked
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Delete Vehicle
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($db_exile->getVehiclesByUID($_POST['uid']) == null) { ?>
                                <tr><td colspan="4" class="text-red text-center h4">No Vehicle in Database</td></tr>
                            <?php } else { ?>
                                <script type="text/javascript">loadTable('player_vehicle')</script>
                            <?php
                            foreach ($db_exile->getVehiclesByUID($_POST['uid']) as $item) { ?>
                                <tr>
                                    <td><?php echo $item['class'] ?></td>
                                    <td><?php echo $item['pin_code'] ?></td>
                                    <td><?php if ($item['is_locked'] == 1) {
                                            echo '<span class="label label-danger">Locked';
                                        } else {
                                            echo '<span class="label label-success">Unlocked';
                                        }?></td>
                                    <td><form action="" method="post"><input type="hidden" name="uid" value="<?php echo $_POST['uid']?>"/> <button class="btn btn-default" type="submit" name="delete" value="<?php echo $item['id']?>">Delete</button></form></td>
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
        <div class="row">
            <div class="col-md-6" style="position: relative; width: 50%; left: 50%">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h2 class="box-title">Territories</h2>
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
                        <table id="player_territory" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Territory Name
                                </th>
                                <th tabindex="0" rowspan="1" colspan="1" aria-disabled="true">Radius</th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1"
                                    colspan="1" aria-sort="descending">Level
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Created On
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table" rowspan="1" colspan="1">
                                    Last Paid at
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($db_exile->getTerritoryByUID($_POST['uid']) == null) { ?>
                                <tr><td colspan="5" class="text-red text-center h4">No Territory in Database</td></tr>
                            <?php } else { ?>
                                <script type="text/javascript">loadTable('player_territory')</script>
                            <?php
                            foreach ($db_exile->getTerritoryByUID($_POST['uid']) as $item) { ?>
                                <tr>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['radius'] ?></td>
                                    <td><?php echo $item['level'] ?></td>
                                    <td><?php echo $item['created_at'] ?></td>
                                    <td><?php echo $item['last_paid_at'] ?></td>
                                </tr>
                                <?php
                            }
                            }
                            ?>
                            </tbody>
                        </table>
                        <pre><?php
                            //$arr = $ban->banPlayer(uidtoguid($user['uid']));echo $arr[3]; echo $arr[0];//$arr = array_shift($arr);print_r($arr);?>
                            </pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once(ROOT_PATH . 'include/footer.php') ?>