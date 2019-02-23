"use strict";

(function (  ){

    //Добавление новой новости

    let addNewsButton = document.querySelector('#addNews');

    if(addNewsButton){

        addNewsButton.addEventListener('click' , async function (  ){

            let titleNews = document.querySelector('#titleNews').value.trim();

            if(!titleNews.match(/^[a-zа-я0-9-_\s]{2,198}$/i)){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы ввели не некорректный заголовок для новости!');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if


            let imagePath1 = document.querySelector('#imagePath1').files[0];

            if( imagePath1 === undefined ){
                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не добавили изображение для новой подкатегории');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if

            let imagePath2 = document.querySelector('#imagePath2').files[0];

            if( imagePath2 === undefined ){
                imagePath2 = null;
            }//if



            var selector = document.getElementById('newsTypeID');
            var newsTypeID = selector[selector.selectedIndex].value;


            var selector2 = document.getElementById('displayOnTheHomePage');
            var displayOnTheHomePage = selector2[selector2.selectedIndex].value;


            let textInput = document.querySelector('#textNews');

            let textNews = textInput.value.trim();

            if( !textNews.match(/^[a-zA-Z0-9\sа-яА-ЯЁё_.,.,()-;::;!?№+*$&@]{10,2498}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели текст новости или введено слишком большой текст');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let newsData = new FormData();

            newsData.append('titleNews', titleNews);

            newsData.append('imagePath1', imagePath1);

            newsData.append('imagePath2', imagePath2);

            newsData.append('newsTypeID', newsTypeID);

            newsData.append('displayOnTheHomePage', displayOnTheHomePage);

            newsData.append('textNews', textNews);

            $.ajax({
                url:  `${window.ServerAddress}?ctrl=News&act=addNews`,
                data: newsData,
                processData: false,
                contentType: false,
                type: "POST",
                success:  (response)=> {

                    console.log( 'response' , response );

                    if(response.code === 200){
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//if
                    else{

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                    }//else
                },
                error: (response)=> {

                    console.log('response', response);

                    if (response.code === 200) {
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn(100).delay(2500).fadeOut(100);
                    }//if
                    else {

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);

                        $('#errorMessage').fadeIn(100).delay(2500).fadeOut(100);

                    }//else
                }

            }); // ajax

        }); // addEventListener 'click'

    }//if


    //Обновление информации о новосте


    let updateNewsButton = document.querySelector('#updateNews');

    if(updateNewsButton){

        updateNewsButton.addEventListener('click' , async function (  ){

            let titleInput = document.querySelector('#titleNews');

            let titleNews = titleInput.value.trim();

            let newsID = +titleInput.dataset.newsId;

            if(!titleNews.match(/^[a-zа-я0-9-_\s]{2,198}$/i)){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы ввели не некорректное название для новости!');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let imagePath1 = document.querySelector('#imagePath1').files[0];

            if( imagePath1 === undefined || imagePath1 === NaN ){

                let path = document.querySelector('#imgPath1');
                imagePath1 = path.dataset.niwspath1;

            }//if

            let imagePath2 = document.querySelector('#imagePath2').files[0];

            if( imagePath2 === undefined || imagePath2 === NaN ){

                let path = document.querySelector('#imgPath2');
                imagePath2 = path.dataset.niwspath2;

            }//if


            var selector = document.getElementById('newsTypeID');
            var newsTypeID = selector[selector.selectedIndex].value;


            var selector2 = document.getElementById('displayOnTheHomePage');
            var displayOnTheHomePage = selector2[selector2.selectedIndex].value;


            let textInput = document.querySelector('#textNews');

            let textNews = textInput.value.trim();

            if( !textNews.match(/^[a-zA-Z0-9\sа-яА-ЯЁё_.,.,()-;::;!?№+*$&@]{10,2498}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели текст новости или введено слишком большой текст');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let newsData = new FormData();

            newsData.append('newsID', newsID);

            newsData.append('titleNews', titleNews);

            newsData.append('imagePath1', imagePath1);

            newsData.append('imagePath2', imagePath2);

            newsData.append('newsTypeID', newsTypeID);

            newsData.append('displayOnTheHomePage', displayOnTheHomePage);

            newsData.append('textNews', textNews);

            $.ajax({
                url:  `${window.ServerAddress}?ctrl=News&act=saveUpdateNews`,
                data: newsData,
                processData: false,
                contentType: false,
                type: "POST",
                success:  (response)=> {

                    console.log( 'response' , response );

                    if(response.code === 200){
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//else
                    else{

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                    }//else
                },
                error: (response)=> {

                    console.log('response', response);

                    if (response.code === 200 ) {
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn(100).delay(2500).fadeOut(100);
                    }//else
                    else {

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);

                        $('#errorMessage').fadeIn(100).delay(2500).fadeOut(100);

                    }//else
                }

            }); // ajax

        }); // addEventListener 'click'

    }//if


    /// Удаление новости

    let removeButtons = document.querySelectorAll('.btn-danger');

    let newsID = -1;


    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            newsID = this.dataset.newsId;

            console.log( newsID );

            $('#removeNewsModal').modal();

        } )

    } );


    let confirmRemoveNewsButton = document.querySelector('#confirmRemoveNews');

    if(confirmRemoveNewsButton){

        confirmRemoveNewsButton.addEventListener('click' , function (  ){

            if( newsID === -1){
                return;
            }//if


            $.ajax( `${window.ServerAddress}?ctrl=News&act=removeNews`, {
                method: 'DELETE',
                data: {
                    'newsID': newsID
                },
                success: ( data , textStatus )=>{

                    $(`div[data-news-id='${newsID}']`).remove();
                    $(`a[data-news-id='${newsID}']`).remove();


                }
            } )

        } );

    }//if





} )();