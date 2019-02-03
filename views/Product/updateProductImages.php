<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>


    <script defer src="assets/js/imagesProduct.js" ></script>

    <form class="form-group col-10">


        <h2>Удаление/Добавление изображений:</h2>


        <h3 id="productID" style="margin-top: 10px; margin-bottom: 20px;" data-product-id="<?= $this->view->product->productID ?>" >Прикрепленные изображения к <?=$this->view->product->productTitle ?> </h3>




            <div class="table-responsive">

            <table class="table table-striped table-sm" >


                <tbody>

                <?php foreach ($this->view->productImages as $img) {?>

                <tr data-pathimages-id="<?=$img->id ?>">

                    <td> <a id="imagePath" class="btn" href="<?= $img->productImagePath?>" data-path="<?=  $img->productImagePath ?>">
                            <img class="img-fluid" style="width:150px; height:150px" src="<?= $img->productImagePath ?>" >
                        </a>
                    </td>

                    <td>
                        <div id="idPathImages" style=" width:200px; height: 43px; margin-top: 50px;" data-pathimages-id="<?=$img->id ?>" data-product-id="<?= $this->view->product->productID ?>" class="btn btn-danger" >Удалить изображение</div>
                    </td>

                </tr>
                <?php }//foreach  ?>

                </tbody>

            </table>
            </div>



        <div class="form-group col-10" style=" margin-top: 40px; margin-bottom: 40px; ">

            <label for="image" style="font-size: 12pt; "><b>Прикрепить новое изображение</b></label>
            <div>
                <input id="productImagePath" type="file" accept="image/jpeg,image/png,image/gif,image/tif">
            </div>

        </div>


        <div class="form-group col-10">
            <div id ="updateImageProduct" class="btn btn-success" style="width:350px;height:43px" >Добавить прикрепленное изображение </div>
        </div>

        <div class="form-group col-10">
            <a class="btn btn-primary form-control" style="width:350px;height:43px" href="?ctrl=Product&act=productsList">Вернутся назад</a>
        </div>


        <div id="errorMessage5" style="display: none" class="alert alert-danger">Ошибка добавления изображения ! </div>
        <div id="successMessage1" style="display: none" class="alert alert-success">Изображение добавлено успешно !</div>



        <div id="removeProductImageModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Сообщение</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить изображение ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                        <button id="confirmRemoveProductImage" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                    </div>
                </div>
            </div>
        </div>


    </form>
