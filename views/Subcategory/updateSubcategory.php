<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0">

            </div></div></div>

    <script defer src="assets/js/subcategory.js"></script>

    <h2>Изменения подкатегории: </h2>
    <form class="col-5">
        <div class="form-group">

            <label for="subcategoryTitleUpdate" style="font-size: 12pt"><b>Введите название подкатегории</b></label>

            <input class="form-control" id="subcategoryTitle" data-subcategory-id="<?= $this->view->subcategory->subcategoryID ?>"
                   data-subcategorytocategory-id="<?= $this->view->subcategory->categoryandsubcategoryID ?>"
                   value="<?= $this->view->subcategory->subcategoryTitle?>" />
        </div>


        <div class="form-group">
            <label for="productCategories"><b>Выберите категорию к которой будет относится подкатегория</b></label>
            <select class="form-control"  size="10" id="productCategories"  >

                <?php foreach ($this->view->categories as $category) { ?>

                    <?php if ($category->categoryID == $this->view->subcategory->categoryID) { ?>
                        <option
                            selected value="<?= $category->categoryID ?>"><?= $category->categoryTitle ?>
                        </option>

                    <?php }
                    else { ?>

                    <option
                        value="<?= $category->categoryID ?>"><?= $category->categoryTitle ?>
                    </option>

                <?php } ?>

                <?php } ?>
            </select>
        </div>




        <div class="form-group" >
            <a id="oldSubcategoryImagePath" class="btn" href="<?= $this->view->subcategory->subcategoryImagePath ?>" data-path1="<?= $this->view->subcategory->subcategoryImagePath?>">
                <img class="img-fluid" style="width:300px;" src="<?= $this->view->subcategory->subcategoryImagePath ?>" >
            </a>
        </div>


        <div class="form-group" style="margin-bottom: 30px; margin-top:20px;">
            <label for="NewImage" style="font-size: 12pt;"><b>Прикрепить новое изображение</b></label>
            <div>
                <input id="subcategoryImagePath" type="file" accept="image/jpeg,image/png,image/gif,image/tif">
            </div>
        </div>



        <div class="form-group">
            <div id="updateSubcategory" class="btn btn-success form-control"  style="width: 300px;">Обновить</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" href="?ctrl=Subcategory&act=subcategoriesList" style="width: 300px;">Вернутся назад</a>
        </div>


        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка обновления подкатегории!</div>
        <div id="successMessage" style="display: none" class="alert alert-success">Подкатегория обновлена!</div>

    </form>
