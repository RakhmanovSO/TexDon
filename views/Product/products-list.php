<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/product.js"></script>

    <script defer src="assets/js/searchProduct.js"></script>

    <h2 style="margin-top: 15px;">Товары:</h2>



    <form action="?ctrl=Search&act=searchProduct" method="post">

        <div class="d-flex justify-content-center bd-highlight mb-3" style="margin-top: 10px;">

            <div class="p-2 bd-highlight">
                <input id="productTitle" class="form-control" name="productTitle"  value="" type="text" style="width:500px;"   placeholder="Введите название товара и нажмите поиск" aria-label="Поист товара">
            </div>

            <div class="p-2 bd-highlight">
                <input id="searchProduct" class="btn btn-success" type="submit" style=" width:120px; " value="Поиск">
            </div>

        </div>
    </form>

    <div class="d-flex justify-content-center bd-highlight mb-3" style="margin-top: 10px;">
        <div class="p-2 bd-highlight">
            <div id="errorMessage1" style="display: none" class="alert alert-danger">Ошибка! Введите название товара минимум 3 символа!
            </div>
        </div>
    </div>




    <div class="form-group">
            <a href="index.php?ctrl=Product&act=addProduct" class="btn btn-primary">Добавить новый товар</a>
        </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm" >
            <thead align="center" valign="middle">
            <tr>
                <th align="center" valign="middle" >ID</th>
                <th align="center" valign="middle" >Наименование товара</th>
                <th align="center" valign="middle" >Цена</th>
                <th align="center" valign="middle" >Обновить/Добавить</th>
                <th align="center" valign="middle" >Удалить товар</th>
            </tr>
            </thead>
            <tbody id="productsTable">
            <?php foreach ( $this->view->products as $product) { ?>

                <tr data-product-id="<?= $product->productID ?>" >

                    <td align="center" > <p style="margin-top: 45px; font-size: 13pt;"> <?= $product->productID ?> </p> </td>
                    <td > <p style="margin-top: 45px; font-size: 13pt; "> <?= $product->productTitle ?> </p> </td>
                    <td align="center"> <p style="margin-top: 45px; font-size: 13pt;">  <b> <?= $product->productPrice ?> руб.  </b></p></td>

                    <td align="center">
                        <a id ="updateProduct" class="btn btn-primary" style="margin-top: 2px; margin-bottom: 5px; " href="?ctrl=Product&act=updateProduct&productID=<?= $product->productID ?>" >Общ. информ.</a> <BR>
                        <a id ="updateImages" class="btn btn-primary" style="margin-bottom: 5px;" href="?ctrl=Product&act=updateImagesProduct&productID=<?= $product->productID ?>" >Изображения</a> <BR>
                        <a id ="updateAttributes" class="btn btn-primary" style="margin-bottom: 2px; width:130px; " href="?ctrl=Product&act=updateAttributesProduct&productID=<?= $product->productID ?>" >Атрибуты</a> <BR>
                    </td>

                    <td align="center"><div style="margin-top: 45px; width:120px;" data-product-id="<?= $product->productID ?>" class="btn btn-danger" >Удалить</div></td>

                </tr>
            <?php }//foreach ?>

            </tbody>
        </table>

        <div class="d-flex justify-content-center bd-highlight mb-3" style="margin-top: 45px; margin-bottom: 45px;">

            <div class="p-2 bd-highlight">
                     <div id="moreProducts" style="width:250px;"  class="btn btn-success" >Показать ещё</div>
            </div>
        </div>

    </div>


    <div id="removeProductModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Сообщение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить данный товар?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button id="confirmRemoveProduct" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                </div>
            </div>
        </div>
    </div>



</main>


