<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0">

            </div></div></div>

    <script defer src="assets/js/subcategory.js"></script>

    <h2>Добавление новой подкатегории: </h2>
    <form class="col-6">
        <div class="form-group">

            <label for="subcategoryTitle" style="font-size: 12pt"><b>1. Введите название новой подкатегории</b></label>

            <input class="form-control" id="subcategoryTitle" />
        </div>


        <div class="form-group">

            <label for="subcategoryImage" style="font-size: 12pt"><b>2. Добавьте изображение для новой подкатегории</b></label>

            <input id="subcategoryImagePath" type="file" name="img" accept="image/jpeg,image/png,image/gif,image/tif" >

        </div>

        <div class="form-group">
            <label for="productCategories" style="font-size: 12pt"><b>3. Выберите категорию к которой будет относится подкатегория</b></label>
            <select class="form-control"  size="10" id="productCategories"  >
                <?php foreach ($this->view->categories as $category) { ?>
                    <option
                        value="<?= $category->categoryID ?>"><?= $category->categoryTitle ?>
                    </option>
                <?php } ?>
            </select>
        </div>


        <div class="form-group">
            <div id="addSubcategory" class="btn btn-success form-control" style="width:160px;height:43px">Добавить</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" style="width:160px;height:43px" href="?ctrl=Subcategory&act=subcategoriesList">Вернутся назад</a>
        </div>


        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка добавления подкатегории!</div>
        <div id="successMessage" style="display: none" class="alert alert-success">Подкатегория добавлена!</div>
    </form>
