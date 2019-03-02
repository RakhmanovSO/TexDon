<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/admin.js"></script>


    <h2>Администраторы:</h2>

    <div class="form-group" style="margin-top: 20px;">
        <a href="index.php?ctrl=Admin&act=addNewAdmin" class="btn btn-primary">Добавить нового Администратора</a>
    </div>


    <div class="table-responsive">

        <table class="table table-striped table-sm" >
            <thead align="center" valign="middle">
            <tr>
                <th align="center" valign="middle" >ID</th>
                <th align="center" valign="middle" >Логин</th>
                <th align="center" valign="middle" >Удалить</th>
            </tr>
            </thead>
            <tbody id="adminsTable">
            <?php foreach ( $this->view->admins as $admin) { ?>

                <tr data-admin-id="<?= $admin->adminID ?>" data-login="<?= $admin->login ?>">

                    <td align="center" > <p style="font-size: 13pt;"> <?= $admin->adminID ?> </p> </td>
                    <td> <p style="font-size: 13pt; "> <?= $admin->login ?> </p> </td>

                    <td align="center">
                        <a id ="deleteAdmin" class="btn btn-danger" href="?ctrl=Admin&act=deleteAdmin&adminID=<?= $admin->adminID ?>&login=<?= $admin->login ?>" >Удалить</a> <BR>
                    </td>

                </tr>
            <?php }//foreach ?>

            </tbody>
        </table>

    </div>



</main>