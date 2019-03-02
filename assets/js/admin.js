"use strict";

(function (  ){


            // Добавление

    let addAdminButton = document.querySelector('#addAdmin');


    if(addAdminButton){

        addAdminButton.addEventListener('click' , async function (  ){

            let login = document.querySelector('#login').value;

            if(!login.match(/^[a-zа-я0-9_\s]{4,148}$/i)){

                $('#errorMessage1').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if

            let password = document.querySelector('#password').value;

            if(!password.match(/^[a-zа-я0-9-_*+=()/,..,;:\s]{4,148}$/i)){

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



}

} )();