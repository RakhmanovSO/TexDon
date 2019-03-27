<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
            </div></div>
        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0">
            </div></div></div>

    <script defer src="assets/js/category.js" ></script>

    <h2>Изменение категории: </h2>

    <form class="col-6">

        <div class="form-group">
            <label for="categoryTitleUpdate" style="font-size: 12pt"><b>Введите новое название категории</b></label>

            <input class="form-control" id="categoryTitle" data-category-id="<?= $this->view->category->categoryID ?>"
                   value="<?= $this->view->category->categoryTitle?>" />
        </div>



        <div class="form-group" >
            <a id="oldCategoryImagePath" class="btn" href="<?= $this->view->category->categoryImagePath ?>" data-path="<?= $this->view->category->categoryImagePath?>">
                <img class="img-fluid" style="width:300px;" src="<?= $this->view->category->categoryImagePath ?>" >
            </a>
        </div>


        <div class="form-group" style="margin-bottom: 30px; margin-top:20px;">
            <label for="NewImage" style="font-size: 12pt;"><b>Прикрепить новое изображение</b></label>
            <div>
                <input id="categoryImagePath" type="file" accept="image/jpeg,image/png,image/gif,image/tif">
            </div>
        </div>




        <div class="form-group">
            <div id="updateCategory" class="btn btn-success form-control" style="width:300px;">Обновить</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" href="?ctrl=Category&act=categoriesList" style="width:300px;">Вернутся назад</a>
        </div>

        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка исправления категории!</div>
        <div id="successMessage" style="display: none" class="alert alert-success">Категория исправлена!</div>
    </form>
