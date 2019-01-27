<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/infoFirm.js" ></script>

    <h2>Изменение информации о фирме: </h2>

    <form enctype="multipart/form-data" method="post">


        <div class="form-group">
            <a id="imagePath" class="btn" href="<?=$this->view->infoFirm->imagePath1?>" data-firmpath="<?=$this->view->infoFirm->imagePath1?>">
                <img class="img-fluid" style="width:300px;height: 200px" src="<?=$this->view->infoFirm->imagePath1?>" >
            </a>
        </div>

        <div class="form-group">
            <label for="firmImage" style="font-size: 20px;"><b>Прикрепить новое изображение(логотип)</b></label>
            <div>
                <input id="imagePath1" type="file" name="img" accept="image/jpeg,image/png,image/gif,image/tif">
            </div>
        </div>

        <div class="form-group">
            <label for="firmText" style="font-size: 20px;"><b>Контент</b></label>
            <textarea class="form-control" type="text" id="textFirm" style="height: 60%;width: 100% " placeholder="Введите текст">
                <?=$this->view->infoFirm->text?>
            </textarea>
        </div>


        <div class="form-group">
            <div class="form-group">
                <div id="updateInfoFirm" class="btn btn-success form-control" style="width:300px;height:43px" >Обновить информацию</div>
            </div>


            <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка изменения информации (проверьте введенные данные) !</div>
            <div id="successMessage" style="display: none" class="alert alert-success">Информации о фирме изменена!</div>
    </form>