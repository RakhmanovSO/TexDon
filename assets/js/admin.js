"use strict";

(function (  ){


            // Добавление

    let addAdminButton = document.querySelector('#addAdmin');


    if(addAdminButton){

        addAdminButton.addEventListener('click' , async function (  ){

            let login = document.querySelector('#login').value.trim();

            if(!login.match(/^[a-zа-я0-9_\s]{3,148}$/i)){

                $('#errorMessage1').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if

            let password = document.querySelector('#password').value.trim();

            if(!password.match(/^[a-zа-я0-9 -_+*:;.,!@#$%&?()`ёЁ\s]{4,148}$/i)){

                $('#errorMessage2').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if


            $.ajax( `${window.ServerAddress}?ctrl=Admin&act=saveNewAdmin`, {
                method: 'POST',
                data: {
                    'login': login,
                    'password': password
                },
                success: ( response )=>{

                    console.log('RESPONSE' , response);

                    if(response.code === 200){
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//else
                    else{

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                    }//else

                }//success
            } );


    } );

} //Добавление


    // Удаление

    let deleteAdminButton = document.querySelector('#delAdmin');

    if(deleteAdminButton){



        deleteAdminButton.addEventListener('click' , async function (  ){

            let password = document.querySelector('#password').value.trim();

            if(!password.match(/^[a-zа-я0-9 -_+*:;.,!@#$%&?()`ёЁ\s]{4,148}$/i)){

                $('#errorMessage2').fadeIn( 100 ).delay(1500).fadeOut(100);

                return;

            }//if

            let id = document.querySelector('#adminID');
            let adminID = +id.dataset.id;


            $.ajax( `${window.ServerAddress}?ctrl=Admin&act=saveDeleteAdmin`, {
                method: 'POST',
                data: {
                    'adminID': adminID,
                    'password': password
                },
                success: ( response )=>{

                    console.log('RESPONSE' , response);

                    if(response.code === 200){
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//if
                    if(response.code === 401){
                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//else
                    if(response.code === 400){
                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//else
                    else{
                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                    }//else

                    window.location = 'http://localhost:5012/TexDon/index.php?ctrl=Admin&act=adminList';

                }//success
            } );


        } );

    }// Удаление





} )();