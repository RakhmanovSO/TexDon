"use strict";


(function (  ){

    //Обновление информации о фирме
    let updateInfoFirmButton = document.querySelector('#updateInfoFirm');

    if(updateInfoFirmButton){

        updateInfoFirmButton.addEventListener('click' , ()=>{

            let textInput = document.querySelector('#textFirm');

            let text = textInput.value.trim();

            let imagePath1 = document.querySelector('#imagePath1').files[0];


            if( !text.match(/^[a-zA-Z0-9\sа-яА-ЯЁё_.,.,\(\)\/;:\-:;!?№\+*\$&@ \<\>\"\']{10,2498}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели текст в Контент или введено слишком большой текст');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if

            if( imagePath1 === undefined || imagePath1 === NaN ){

                let path = document.querySelector('#imagePath');
                imagePath1 = path.dataset.firmpath;

            }//if



            let firmData = new FormData();

            firmData.append('text', text);

            firmData.append('imagePath1', imagePath1);

            $.ajax({
               // url: `${window.ServerAddress}?ctrl=InfoFirm&act=saveInfoFirm`,
                url: "http://localhost:5012/TexDon/index.php?ctrl=InfoFirm&act=saveInfoFirm&XDEBUG_SESSION_START=19847",
                data: firmData,
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

                    if (response.code === 200) {
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
        });
    }//if



} )();