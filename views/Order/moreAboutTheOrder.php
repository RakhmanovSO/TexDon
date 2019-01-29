
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/order.js"></script>

    <?php foreach (  $this->view->order as $or) { ?>

    <h2  id="orderID" data-order-id="<?= $or->orderID ?>" >Подробнее о заказе № <?= $or->orderID ?> </h2>


    <form  class="col-10">
        <div class="form-group">
            <label for="UserName" style="font-size: 12pt" ><b>Фамилия и имя заказчика </b></label>
            <input class="form-control" id="userName"  placeholder="" value="<?=   $or->userFirstAndLastName ?>">
        </div>

        <div class="form-group">
            <label for="email" style="font-size: 12pt"><b>Email</b></label>
            <input class="form-control" id="email" placeholder="" value="<?=  $or->userEmail ?>">
        </div>

        <div class="form-group">
            <label for="phone" style="font-size: 12pt"><b>Контактный номер телефона</b></label>
            <input class="form-control" id="phone" placeholder="" value="<?=  $or->userContactNumberPhone ?>" >
        </div>

        <div class="form-group">
            <label for="аddress" style="font-size: 12pt"><b>Адрес доставки</b></label>
            <input class="form-control" id="аddress" placeholder="" value="<?=  $or->deliveryAddressOrder ?>">
        </div>


        <div class="form-group">
            <label for="comment" style="font-size: 12pt" ><b>Комментарий к заказу</b></label>
            <textarea type="password" class="form-control" id="comment" placeholder=""><?=  $or->commentToTheOrder ?></textarea>
        </div>

        <?php }//foreach ?>


        <?php $total = 0; ?>

        <div class="form-group">
            <h4 for="products">Список товаров:</h4>
            <table class="table table-striped table-sm">
                <thead>
                <tr align="center" text-align="center">
                    <th>ID</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Стоимость</th>
                    <th>Цена</th>

                </tr>
                </thead>
                <tbody id="productsTable">

                <?php foreach ( $this->view->orderDetails as $product) { ?>
                    <tr data-orderdetails-id="<?= $product->orderDetailsID ?>">

                        <td align="center"  ><?= $product->productID ?></td>
                        <td> <?= $product->productTitle ?> </td>
                        <td align="center" text-align="center" ><?= $product->amountProduct ?></td>
                        <td align="center" text-align="center" ><?= $product->productPrice ?></td>
                        <td align="center" text-align="center"  ><?= $product->productPrice * $product->amountProduct ?></td>


                        <?php
                        $total +=  ($product->productPrice * $product->amountProduct);
                        ?>
                    </tr>
                <?php }//foreach ?>

                <tr id="sum">

                    <td></td>
                    <td> <strong>Итого: </strong></td>
                    <td></td>
                    <td></td>
                    <td align="center"> <strong><?= $total ?> руб </strong> </td>

                </tr>

                </tbody>

            </table>
        </div>




        <!--
        <div class="form-group">
            <div id ="updateOrderButton" class="btn btn-success"  style="width:250px;height:43px" >Обновить информацию</div>
        </div>

        -->

        <div class="form-group">
            <a class="btn btn-primary form-control" href="?ctrl=Order&act=ordersList" style="width:250px;height:43px" >Вернутся назад</a>
        </div>



        <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка обновления заказа !</div>
        <div id="successMessage" style="display: none" class="alert alert-success">Информация о заказе обновлена !</div>


    </form>


</main>