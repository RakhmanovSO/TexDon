<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0">

            </div></div></div>

    <script defer src="assets/js/category.js"></script>

    <h2>Добавление новой категории: </h2>
    <form class="col-6">
        <div class="form-group">

            <label for="categoryTitle" style="font-size: 12pt"><b>1. Введите название новой категории</b></label>

            <input class="form-control" id="categoryTitle" />

        </div>


        <div class="form-group">

            <label for="categoryImage" style="font-size: 12pt"><b>2. Добавьте изображение для новой категории</b></label>

            <input id="categoryImagePath" type="file" name="img" accept="image/jpeg,image/png,image/gif,image/tif" >

        </div>

        <div class="form-group">
            <div id="addCategory" class="btn btn-success form-control" style="width:160px;height:43px" >Добавить</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" href="?ctrl=Category&act=categoriesList" style="width:160px;height:43px" >Вернутся назад</a>
        </div>


        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка добавления категории!</div>
        <div id="successMessage" style="display: none" class="alert alert-success">Категория добавлена!</div>
    </form>
