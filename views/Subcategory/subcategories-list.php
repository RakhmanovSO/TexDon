<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/subcategory.js" ></script>

    <h2>Подкатегории </h2>

    <form class="col-12">
        <div class="form-group">
            <a href="index.php?ctrl=Subcategory&act=addSubcategory" class="btn btn-primary">Добавить новую подкатегорию</a>
        </div>
    </form>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название подкатегории</th>
                <th>Категория</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ( $this->view->subcategories as $subcategory ) { ?>

                <tr data-subcategory-id="<?= $subcategory->subcategoryID ?>" data-category-id="<?= $subcategory->categoryID ?>">

                    <td><?= $subcategory->subcategoryID ?></td>

                    <td><?= $subcategory->subcategoryTitle ?></td>

                    <td><?= $subcategory->categoryTitle ?></td>

                    <td><a id ="updateSubcategory" lass="btn btn-primary" href="?ctrl=Subcategory&act=updateSubcategory&subcategoryID=<?= $subcategory->subcategoryID ?>&categoryID=<?= $subcategory->categoryID ?>">Изменить</a></td>

                    <td> <div data-subcategory-id="<?= $subcategory->subcategoryID ?>" data-subcategorytocategory-id="<?= $subcategory->categoryandsubcategoryID ?>" class="btn btn-danger">Удалить</div> </td>

                </tr>

            <?php }//foreach ?>

            </tbody>
        </table>
    </div>


    <div id="removeSubcategoryModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Сообщение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить подкатегорию ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button id="confirmRemoveSubcategory" type="button" class="btn btn-primary" data-dismiss="modal">Удалить</button>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
</div>

