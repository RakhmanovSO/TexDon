<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/news.js" ></script>

    <h2>Обновление новости: </h2>

    <form enctype="multipart/form-data" method="post">

        <div class="form-group col-10">
            <label for="titleNews" style="font-size: 12pt;"><b>Заголовок новости </b></label>
            <input class="form-control" id="titleNews" data-news-id="<?= $this->view->news->newsID ?>"
                   value="<?= $this->view->news->titleNews?>">
        </div>


        <div class="form-group col-6">
            <a id="imgPath1" class="btn" href="<?= $this->view->news->imagePath1?>" data-niwspath1="<?= $this->view->news->imagePath1?>">
                <img class="img-fluid" style="width:400px; height:200px" src="<?= $this->view->news->imagePath1 ?>" >
            </a>
        </div>


        <div class="form-group col-6">
            <label for="newsImage1" style="font-size: 12pt;"><b>Прикрепить новое титульное изображение</b></label>
            <div>
                <input id="imagePath1" type="file" accept="image/jpeg,image/png,image/gif,image/tif">
            </div>
        </div>


        <?php if ($this->view->news->imagePath2 == Null || $this->view->news->imagePath2 == "") { ?>

            <div class="form-group col-10" style="margin-top: 40px; margin-bottom: 40px">
            <h4 data-niwspath2="<?= $this->view->news->imagePath2?>">Дополнительное изображение не было прикреплено к данной новости!</h4>
        </div>

        <?php }
        else { ?>

            <div class="form-group col-6">
                <a id="imgPath2" class="btn" href="<?= $this->view->news->imagePath2?>" data-niwspath2="<?= $this->view->news->imagePath2?>">
                    <img class="img-fluid" style="width:400px; height:200px" src="<?= $this->view->news->imagePath2 ?>" >
                </a>
            </div>

        <?php } ?>

        <div class="form-group col-6">
            <label for="newsImage2" style="font-size: 12pt;"><b>Прикрепить новое дополнительное изображение</b></label>
            <div><input id="imagePath2" type="file" accept="image/jpeg,image/png,image/gif,image/tif"></div>
        </div>


        <div class="form-group col-6" style="margin-top: 40px; margin-bottom: 40px">
            <label for="typeNews" style="font-size: 12pt"><b>Тип новости к которой будет относится данная новость</b></label>
            <select class="form-control"  size="10" id="newsTypeID"  >
                <?php foreach ($this->view->typesNews as $type) { ?>

                <?php if ($type->newsTypeID == $this->view->news->newsTypeID ) { ?>

                    <option
                            selected value="<?= $type->newsTypeID ?>"><?= $type->titleNewsType ?>
                    </option>
                <?php }
                else { ?>
                <option
                        value="<?= $type->newsTypeID ?>"><?= $type->titleNewsType ?>
                </option>
                <?php } ?>

                <?php } ?>

            </select>
        </div>


        <div class="form-group col-6" style="margin-top: 40px; margin-bottom: 40px" >
            <label for="typeNews" style="font-size: 12pt"><b>Будет ли новая новость выводится в карусель Акций</b></label>
            <select class="form-control"  size="2" id="displayOnTheHomePage"  >

                <?php if ($this->view->news->displayOnTheHomePage == 1) { ?>
                    <option  value="0">Нет</option>
                    <option selected value="1">Да</option>
                <?php }
                else { ?>
                    <option selected value="0">Нет</option>
                    <option value="1">Да</option>
                <?php } ?>

            </select>
        </div>


        <div class="form-group col-10">
            <label for="newsContent" style="font-size: 12pt;"><b>Текст новости </b></label>
            <textarea class="form-control" type="text" id="textNews" style="height: 60%;width: 100% " >
                 <?=$this->view->news->textNews?>
            </textarea>
        </div>



        <div class="form-group col-6">
            <div id="updateNews" class="btn btn-success form-control" style="width:160px;height:43px">Обновить</div>
        </div>

        <div class="form-group col-6">
            <a class="btn btn-primary form-control" style="width:160px;height:43px" href="?ctrl=News&act=newsList">Вернутся назад</a>
        </div>

        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка обновления новости!</div>
        <div id="successMessage" style="display: none" class="alert alert-success">Новость обновлена !</div>
    </form>