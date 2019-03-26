<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>


    <script defer src="assets/js/admin.js"></script>


    <h2 id="adminID" style="margin-bottom: 25px; margin-top: 15px;" data-id="<?= $this->view->admin->adminID ?>">Удаление Администратора :</h2>


    <form class="form-group col-8">

        <div class="form-group">
            <label for="password" style="font-size: 12pt;" ><b>Введите Пароль данного администратора для его удаления (от 4 до 100 символов). </b></label>
            <input class="form-control" id="password" data-id="<?= $this->view->admin->adminID ?>" placeholder="Введите пароль администратора - <?= $this->view->admin->login ?>" >
        </div>

        <div id="errorMessage2" style="display: none" class="alert alert-danger">Введите Пароль от 4 до 100 символов !</div>


        <div class="form-group">
            <div id ="delAdmin" class="btn btn-success" style="width:160px;height:43px; margin-top: 25px;" >Удалить</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" style="width:160px;height:43px" href="?ctrl=Admin&act=adminList">Вернутся назад</a>
        </div>


        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка удаления Администратора !  Введен неправильный пароль. </div>
        <div id="successMessage" style="display: none" class="alert alert-success">Администратор удален успешно ! Можете вернутся назад. </div>


    </form>

