<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>




    <script defer src="assets/js/updateProduct.js" ></script>

    <h2>Обновление общей информации о товаре:</h2>

    <form>
        <div class="form-group col-10">
            <label for="title" style="font-size: 12pt;" ><b>Название товара</b></label>
            <input class="form-control" id="productTitle" placeholder="Введите название" data-product-id="<?= $this->view->product->productID ?>"
                   data-subcandproduct-id="<?= $this->view->productAndSubcategoryId->subcategoryandproductID ?>"
                   value="<?= $this->view->product->productTitle ?>">
        </div>


        <div id="errorMessage1" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные! </div>




        <div class="form-group col-10">
            <label for="brand" style="font-size: 12pt;" ><b>Бренд товара</b></label>
            <input class="form-control" id="brandProduct" placeholder="Введите название брендa" value="<?= $this->view->product->brandProduct ?>">
        </div>

        <div id="errorMessage4" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные! </div>




        <div class="form-group col-10">
            <label for="price" style="font-size: 12pt;"><b>Цена товара</b></label>
            <input class="form-control" id="productPrice" placeholder="Введите цену"  value="<?= $this->view->product->productPrice ?>">
        </div>

        <div id="errorMessage2" style="display: none" class="alert alert-danger">Разрешены только цифры от 0 до 9.</div>


        <div class="form-group col-10">

            <label for="productSubategories" style="font-size: 12pt;"><b> Выберите подкатегорию </b></label>


            <select class="form-control" id="productSubcategories" >

                <?php foreach ($this->view->subcategories as $subcategory) { ?>

                    <?php if ($subcategory->subcategoryID ==  $this->view->productAndSubcategoryId->subcategoryID ) { ?>
                        <option
                                selected value="<?= $subcategory->subcategoryID ?>"><?= $subcategory->subcategoryTitle ?>
                        </option>
                    <?php }
                    else { ?>
                        <option
                                value="<?= $subcategory->subcategoryID ?>"><?= $subcategory->subcategoryTitle ?></option>
                        </option>
                    <?php } ?>

                <?php } ?>

            </select>


        </div>


        <div class="form-group col-10">
            <label for="productDescription" style="font-size: 12pt; margin-top: 5px;"><b>Описание товара </b></label>
            <textarea type="password" class="form-control" id="productDescription"  style="height: 60%; width: 100% " placeholder="Введите описание" >

                <?= $this->view->product->productDescription ?>

            </textarea>
        </div>

        <div id="errorMessage3" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные!</div>

        <div class="form-group col-10">
            <div id ="updateProduct" class="btn btn-success" style="width:160px;height:43px" >Обновить</div>
        </div>

        <div class="form-group col-10">
            <a class="btn btn-primary form-control" style="width:160px;height:43px" href="?ctrl=Product&act=productsList">Вернутся назад</a>
        </div>



        <div id="errorMessage5" style="display: none" class="alert alert-danger">Ошибка обновления продукта ! </div>
        <div id="successMessage1" style="display: none" class="alert alert-success">Информация обновлена успешно ! </div>

    </form>

