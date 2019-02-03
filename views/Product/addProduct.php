<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>


    <script defer src="assets/js/addProduct.js" ></script>

    <h2>Добавление товара:</h2>

    <form class="form-group col-10">

        <div class="form-group">
            <label for="title" style="font-size: 12pt;" ><b>1. Введите название товара</b></label>
            <input class="form-control" id="productTitle" placeholder="Введите название">
        </div>

        <div id="errorMessage1" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные! </div>

        <div class="form-group">
            <label for="brand" style="font-size: 12pt;" ><b>2. Введите бренд товара</b></label>
            <input class="form-control" id="brandProduct" placeholder="Введите название брендa">
        </div>

        <div id="errorMessage4" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные! </div>

        <div class="form-group">
            <label for="productPrice" style="font-size: 12pt;"><b>3. Введите цену товара</b></label>
            <input class="form-control" id="productPrice" placeholder="Введите цену">
        </div>

        <div id="errorMessage2" style="display: none" class="alert alert-danger">Разрешены только цифры от 0 до 9.</div>



        <div class="form-group">

            <label for="productSubategories" style="font-size: 12pt;"><b>4. Выберите подкатегорию</b></label>

            <select class="form-control" id="productSubcategories" >
                <?php foreach ($this->view->subcategories as $subcategory) { ?>
                    <option
                            value="<?= $subcategory->subcategoryID ?>"><?= $subcategory->subcategoryTitle ?></option>
                <?php } ?>
            </select>

        </div>



        <div class="form-group">
            <label for="productDescription" style="font-size: 12pt; "><b>5. Введите описание</b></label>
            <textarea type="password" class="form-control" id="productDescription" style="height: 500px; " placeholder="Введите описание">

            </textarea>
        </div>

        <div id="errorMessage3" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные!</div>

        <div class="form-group">
        <div id ="addProduct" class="btn btn-success" style="width:160px;height:43px" >Добавить товар</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" style="width:160px;height:43px" href="?ctrl=Product&act=productsList">Вернутся назад</a>
        </div>



        <div id="errorMessage5" style="display: none" class="alert alert-danger">Ошибка добавления Продукта ! </div>
        <div id="successMessage1" style="display: none" class="alert alert-success">Продукт добавлен ! </div>

    </form>