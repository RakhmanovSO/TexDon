<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/product.js" ></script>

    <h2>Добавление товара</h2>

    <form>
        <div class="form-group">
            <label for="productTitle">Название товара</label>
            <input class="form-control" id="productTitle" placeholder="Введите название">
        </div>

        <div id="errorMessage1" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные! </div>

        <div class="form-group">
            <label for="productPrice">Цена товара</label>
            <input class="form-control" id="productPrice" placeholder="Введите цену">
        </div>

        <div id="errorMessage2" style="display: none" class="alert alert-danger">Разрешены только цифры от 0 до 9.</div>


        <div class="form-group">
            <label for="productImage"> Добавте изображения </label>
            <input id="productImagePath" type="file" name="img" accept="image/jpeg,image/png,image/gif,image/tif">
        </div>


        <div class="form-group">

            <label for="productSubategories">Выберите подкатегорию</label>

            <select class="form-control" id="productSubcategories" >
                <?php foreach ($this->view->subcategories as $subcategory) { ?>
                    <option
                            value="<?= $subcategory->subcategoryID ?>"><?= $subcategory->subcategoryTitle ?></option>
                <?php } ?>
            </select>

        </div>

        <div class="form-group">

            <label for="productAttributes">Атрибуты</label>

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
        <div class="form-group">
            <label for="attributeValue">Значение атрибута</label>
            <input class="form-control" id="attributeValue" placeholder="Введите значение">
        </div>
        <div class="form-group">
            <div id="addAttributeToProduct" class="btn btn-primary">Добавить атрибут</div>
        </div>


        <div class="form-group">
            <label for="attributeToProduct">Список установленных атрибутов</label>

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
                        <button id="confirmRemoveAttribute" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="productDescription">Описание</label>
            <textarea type="password" class="form-control" id="productDescription" placeholder="Введите описание">

            </textarea>
        </div>

        <div id="errorMessage3" style="display: none" class="alert alert-danger">Ошибка! Проверьте введенные данные!</div>

        <div class="form-group">
        <div id ="addProduct" class="btn btn-success" style="width:160px;height:43px" >Добавить товар</div>
        </div>

        <div class="form-group">
            <a class="btn btn-primary form-control" style="width:160px;height:43px" href="?ctrl=Product&act=productsList">Вернутся назад</a>
        </div>

    </form>