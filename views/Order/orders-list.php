<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/order.js"></script>

    <h2>Заказы: </h2>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>№</th>
                <th>Дата заказа</th>
                <th>Ф.И.О.</th>
                <th>Адрес доставки</th>
                <th>Детали заказа</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ( $this->view->orders as $order ) { ?>
                <tr data-order-id="<?= $order->orderID ?>">

                    <td><?= $order->orderID ?></td>

                    <td><?= $order->dateAndTimeOrder ?></td>

                    <td><?= $order->userFirstAndLastName ?></td>

                    <td><?= $order->deliveryAddressOrder  ?></td>

                    <td><a id ="updateOrder" class="btn btn-primary" href="?ctrl=Order&act=aboutTheOrder&orderID=<?= $order->orderID ?>">Подробнее</a></td>

                    <td><div data-order-id="<?= $order->orderID ?>" class="btn btn-danger" >Удалить</div></td>

                </tr>
            <?php }//foreach ?>

            </tbody>
        </table>
    </div>


    <div id="removeOrderModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Сообщение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить заказ ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button id="confirmRemoveOrder" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                </div>
            </div>
        </div>
    </div>

</main>