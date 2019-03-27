
<script defer src="assets/js/searchProduct.js"></script>

    <div class="d-flex justify-content-center bd-highlight mb-3" style="margin-top: 100px; margin-left: 80px;">

        <div class="p-2 bd-highlight">

            <img src="http://localhost:5012/TexDon/assets/images/othersImages/adminPanel_sm.png" >

        </div>
    </div>

<form action="?ctrl=Search&act=searchProduct&XDEBUG_SESSION_START=19895" method="post">

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
