<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>

    <script defer src="assets/js/contacts.js" ></script>

    <h2>Изменение контактной информации фирмы: </h2>

    <form enctype="multipart/form-data" method="post" class="col-6">


        <div class="form-group">
            <label for="emailUpdate" style="font-size: 12pt"><b>Введите новый Email </b></label>

            <input class="form-control" id="email" value="<?= $this->view->contactsFirm->email?>" />

        </div>



        <div class="form-group">
            <label for="skypeUpdate" style="font-size: 12pt"><b>Введите новую учетную запись Skype </b></label>

            <input class="form-control" id="skype" value="<?= $this->view->contactsFirm->skype?>" />

        </div>

        <div class="form-group">
            <label for="viberUpdate" style="font-size: 12pt"><b>Введите новый номер Viber </b></label>

            <input class="form-control" id="viber" value="<?= $this->view->contactsFirm->viber?>" />

        </div>


        <div class="form-group">
            <label for="phone1Update" style="font-size: 12pt"><b>Введите новый городской номер оператора </b></label>

            <input class="form-control" id="phone1" value="<?= $this->view->contactsFirm->phone1?>" />

        </div>

        <div class="form-group">
            <label for="phone2Update" style="font-size: 12pt"><b>Введите новый мобильный номер оператора №1 </b></label>

            <input class="form-control" id="phone2" value="<?= $this->view->contactsFirm->phone2?>" />

        </div>

        <div class="form-group">
            <label for="phone3Update" style="font-size: 12pt"><b>Введите новый мобильный номер оператора №2 </b></label>

            <input class="form-control" id="phone3" value="<?= $this->view->contactsFirm->phone3?>" />

        </div>

        <div class="form-group">
            <label for="phone4Update" style="font-size: 12pt"><b>Введите новый номер для предложений о сотрудничестве</b></label>

            <input class="form-control" id="phone4" value="<?= $this->view->contactsFirm->phone4?>" />

        </div>




        <div class="form-group">
            <div class="form-group">
                <div id="updateContacts" class="btn btn-success form-control" style="width:300px;height:43px" >Обновить информацию</div>
            </div>


            <div id="errorMessage" style="display: none" class="alert alert-danger">Ошибка изменения контактной информации (проверьте введенные данные) !</div>
            <div id="successMessage" style="display: none" class="alert alert-success">Контактная информация изменена!</div>
    </form>