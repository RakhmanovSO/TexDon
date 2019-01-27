<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <script defer src="assets/js/news.js" ></script>
    <h2>Новости: </h2>

    <form class="col-12">

        <div class="form-group">
            <a href="index.php?ctrl=News&act=addNewNews" class="btn btn-primary">Добавить новую новость</a>
        </div>

        <?php foreach ($this->view->news as $news) {?>
            <a class="btn" href="index.php?ctrl=News&act=updateNews&newsID=<?= $news->newsID?>" data-news-id="<?= $news->newsID ?>">
                <img src="<?= $news->imagePath1 ?>" class="img-fluid" style="width:400px;height: 200px" >
                <h6><?= $news->titleNews?></h6>
            </a>
            <div data-news-id="<?= $news->newsID ?>" class="btn btn-danger" >Удалить</div>
        <?php }//foreach  ?>

    </form>

    <div id="removeNewsModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Сообщение</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить новость ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <div id="confirmRemoveNews" class="btn btn-primary" data-dismiss="modal">Удалить</div>
                </div>
            </div>
        </div>
    </div>

</main>



