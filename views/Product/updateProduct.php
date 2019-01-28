<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/product.js" ></script>

    <h2>Добавление товара</h2>

    <form>
        <div class="form-group col-10">
            <label for="productTitle" style="font-size: 12pt;" ><b>Название товара</b></label>
            <input class="form-control" id="productTitle" placeholder="Введите название" data-product-id="<?= $this->view->product->productID ?>"
                   data-subcandproduct-id="<?= $this->view->productAndSubcategoryId->subcategoryandproductID ?>"
                   value="<?= $this->view->product->productTitle ?>">
        </div>

        <div id="errorMessage1" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные! </div>

        <div class="form-group col-10">
            <label for="productPrice" style="font-size: 12pt;"><b>Цена товара</b></label>
            <input class="form-control" id="productPrice" placeholder="Введите цену"  value="<?= $this->view->product->productPrice ?>">
        </div>

        <div id="errorMessage2" style="display: none" class="alert alert-danger">Разрешены только цифры от 0 до 9.</div>


        <div class="form-group col-10">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >

            <?php $item_class = "active"; ?>
            <?php $alt = '0'; ?>


            <!--  ????????????????????????? -->

            <?php ($item_class  === "active") ? " " : "active";  ?>

            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to=" <?= $alt ?> " class=" <?= $item_class ?> "></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" >

                <?php foreach ($this->view->productImages as $img) { ?>

                <div class="carousel-item <?= $item_class ?> ">
                    <img class="d-block w-50" src="<?= $img->productImagePath ?>" alt="<?= $alt ?>">
                </div>

                <?php ($item_class  === "active") ? " " : "active";  ?>

                        <div class="carousel-item ">
                            <img class="d-block w-50" src="<?=$img->productImagePath ?>" alt="1">
                        </div>



                <?php } ?>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>


        </div>



        <div class="form-group col-10" style="margin-top: 40px; margin-bottom: 40px">
            <label for="productImage" style="font-size: 12pt;"><b>Добавить изображения</b></label>
            <input id="productImagePath" type="file" name="img" accept="image/jpeg,image/png,image/gif,image/tif">
        </div>


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
            <label for="attributeToProduct" style="font-size: 12pt; margin-top: 30px; "><b>Список уже прикрепленных атрибутов </b></label>

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Значение</th>
                    <th>Удалить</th>
                </tr>
                </thead>

                <tbody id="attributesTableResult">

                <?php foreach (  $this->view->attributes as $attribut) { ?>
                    <tr data-attribut-id="<?= $attribut->attributeID ?>">


                        <td><?= $attribut->attributeTitle ?></td>
                        <td><?= $attribut->value ?></td>
                        <td><div data-attribut-id="<?= $attribut->attributeID ?>" class="btn btn-danger" >Удалить</div></td>

                    </tr>
                <?php }//foreach ?>

                </tbody>
            </table>


        </div>


        <div class="form-group col-10">

            <label for="productAttributes" style="font-size: 12pt; margin-top: 30px; "><b> Атрибуты </b></label>

            <select class="form-control" id="productAttributes">
                <option value="-1">Добавить атрибут</option>
                <?php foreach ($this->view->attributes as $attribute) { ?>
                    <option
                        value="<?= $attribute->attributeID ?>"
                        data-title="<?= $attribute->attributeTitle ?>"
                    ><?= $attribute->attributeTitle ?></option>
                <?php } ?>
            </select>

        </div>
        <div class="form-group col-10">
            <label for="attributeValue">Значение атрибута</label>
            <input class="form-control" id="attributeValue" placeholder="Введите значение">
        </div>
        <div class="form-group col-10">
            <div id="addAttributeToProduct" class="btn btn-primary">Добавить атрибут</div>
        </div>


        <div class="form-group col-10">
            <label for="attributeToProduct" style="font-size: 12pt;"><b>Список новых атрибутов </b></label>

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Значение</th>
                    <th>Удалить</th>
                </tr>
                </thead>

                <tbody id="attributesTable">

                </tbody>
            </table>


        </div>


        <div class="form-group col-10">
            <label for="productDescription" style="font-size: 12pt; margin-top: 40px;"><b>Описание товара </b></label>
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


        <div id="removeAttributeModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Сообщение</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить атрибут ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                        <div id="confirmRemoveAttribute" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</div>
                    </div>
                </div>
            </div>
        </div>


    </form>

