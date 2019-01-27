"use strict";


(function (  ){


    let updateContactsButton = document.querySelector('#updateContacts');

    if(updateContactsButton){

        updateContactsButton.addEventListener('click' , ()=>{


            let emailInput = document.querySelector('#email');

            let email = emailInput.value.trim();

            if( !email.match(/^([0-9a-zA-Z]([-.w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-w]*[0-9a-zA-Z].)+[a-zA-Z]{2,9})$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели данные об Email или введена некорректная информация (Пример TexDon@gmail.com)');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let skypeInput = document.querySelector('#skype');

            let skype = skypeInput.value.trim();


            if( !skype.match(/^[a-z0-9_.-.@\sа-я]{2,79}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели данные об учетной записи Skype или введена некорректная информация!');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let viberInput = document.querySelector('#viber');

            let viber = viberInput.value.trim();


            if( !viber.match(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели номер Viber или введен некорректно номер (Пример +380-071-000-00-00)');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let phone1Input = document.querySelector('#phone1');

            let phone1 = phone1Input.value.trim();


            if( !phone1.match(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели городской номер оператора или введен некорректно номер (Пример +380-071-000-00-00)');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let phone2Input = document.querySelector('#phone2');

            let phone2 = phone2Input.value.trim();


            if( !phone2.match(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели номер оператора №1 или введен некорректно номер (Пример +380-071-000-00-00)');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let phone3Input = document.querySelector('#phone3');

            let phone3 = phone3Input.value.trim();


            if( !phone3.match(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели номер оператора №2 или введен некорректно номер (Пример +380-071-000-00-00)');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if



            let phone4Input = document.querySelector('#phone4');

            let phone4 = phone4Input.value.trim();


            if( !phone4.match(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не ввели номер для предложений о сотрудничестве или введен некорректно номер (Пример +380-071-000-00-00)');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if



           $.ajax( `${window.ServerAddress}?ctrl=Contacts&act=saveContactsFirm`, {

               // $.ajax( `http://localhost:5012/TexDon/index.php?ctrl=Contacts&act=saveContactsFirm&XDEBUG_SESSION_START=11754`, {

                method: 'POST',
                data: {
                    'email': email,
                    'skype':skype,
                    'viber':viber,
                    'phone1':phone1,
                    'phone2':phone2,
                    'phone3':phone3,
                    'phone4':phone4
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
        });
    }//if


} )();