<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>



    <script defer src="assets/js/attributesProduct.js" ></script>


    <form class="form-group col-10">


        <h2>Обновление/Добавление атрибутов товара</h2>


        <h3 id="productID" style="margin-top: 10px; margin-bottom: 20px;" data-product-id="<?= $this->view->product->productID ?>" >Прикрепленные атрибуты к <?=$this->view->product->productTitle ?> </h3>




        <div class="form-group"  style="margin-top: 38px;">
            <label for="attributeToProduct" style="font-size: 12pt; " ><b>Список уже установленных атрибутов</b></label>

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Значение</th>
                    <th>Удалить</th>
                </tr>
                </thead>

                <tbody id="TableAtt">

                <?php foreach ( $this->view->attributesProduct as $attrib) { ?>

                    <tr data-attrib-id="<?= $attrib->attributeID ?>" >
                        <td>  <?= $attrib->attributeTitle ?> </td>
                        <td>  <?= $attrib->value ?> </td>
                        <td><div  data-attrib-id="<?= $attrib->attributeID ?>" data-product-id="<?= $attrib->productID ?>" class="btn btn-danger" >Удалить</div></td>

                    </tr>

                <?php }//foreach ?>

                </tbody>
            </table>


        </div>




        <div class="form-group"  style="margin-top: 38px;">

            <label for="attributes" style="font-size: 12pt; "><b>Все Атрибуты для добавления: </b> </label>

            <select class="form-control" id="productAttributes">
                <option value="-1">Добавить атрибут</option>
                <?php foreach ($this->view->allAttributes as $attribute) { ?>
                    <option
                            value="<?= $attribute->attributeID ?>"
                            data-title="<?= $attribute->attributeTitle ?>"
                    ><?= $attribute->attributeTitle ?></option>
                <?php } ?>
            </select>

        </div>
        <div class="form-group">
            <label for="value" style="font-size: 12pt;"><b>Значение атрибута</b></label>
            <input class="form-control" id="attributeValue" placeholder="Введите значение">
        </div>
        <div class="form-group">
            <div id="addAttributeToProduct" class="btn btn-primary">Добавить атрибут в список </div>
        </div>


        <div class="form-group"  style="margin-top: 40px; margin-bottom: 50px;">
            <label for="attributeToProduct" style="font-size: 12pt;"><b>Список атрибутов к добавлению </b></label>

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

        <!-- Удаление новых атрибутов -->
        <div id="removeNewAttributModal" class="modal" tabindex="-1" role="dialog">
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
                        <button id="confirmRemoveNewAttribut" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                    </div>
                </div>
            </div>
        </div>




        <div class="form-group col-10">
            <div id ="updateAttributProduct" class="btn btn-success" style="width:350px;height:43px" >Добавить атрибуты  </div>
        </div>

        <div class="form-group col-10">
            <a class="btn btn-primary form-control" style="width:350px;height:43px" href="?ctrl=Product&act=productsList">Вернутся назад</a>
        </div>


        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка добавления атибутов! </div>
        <div id="successMessage" style="display: none" class="alert alert-success">Атибуты добавлены успешно !</div>


        <!-- Удаление уже добавленных атрибутов -->
        <div id="removeOldProductAttributModal" class="modal" tabindex="-1" role="dialog">
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
                        <button id="confirmRemoveOldProductAttribut" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                    </div>
                </div>
            </div>
        </div>




    </form>



