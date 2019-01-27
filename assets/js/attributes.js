"use strict";

(function (  ){

    let addAttributeButton = document.querySelector('#addAttribute');


    if(addAttributeButton){

        addAttributeButton.addEventListener('click' , async function (  ){

            let attributeTitle = document.querySelector('#attributeTitle').value;

            if(!attributeTitle.match(/^[a-zа-я0-9_-\s]{2,50}$/i)){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').fadeIn( 100 ).delay(1500).fadeOut(100);

                return;
            }//if

            $.post(`${window.ServerAddress}?ctrl=ProductAttributes&act=addNewAttribute`,

                {'attributeTitle': attributeTitle} , function ( response ){

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

                } );

        } );

    }//if addAttributeButton


    //Удаление

    let removeButtons = document.querySelectorAll('.btn-danger');

    let attributeID = -1;

    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            attributeID = this.dataset.attributeId;

            console.log( attributeID );

            $('#removeAttributeModal').modal();

        } )

    } );

    let confirmRemoveAttributeButton = document.querySelector('#confirmRemoveAttribute');

    if(confirmRemoveAttributeButton){

        confirmRemoveAttributeButton.addEventListener('click' , function (  ){

            if( attributeID === -1){
                return;
            }//if

            $.ajax( `${window.ServerAddress}?ctrl=ProductAttributes&act=removeAttribute`, {
                method: 'DELETE',
                data: {
                    'attributeID': attributeID
                },
                success: ( data , textStatus )=>{

                    $(`tr[data-attribute-id='${attributeID}']`).remove();

                }
            } )

        } );

    }//if


    //Обновление
    let updateAttributButton = document.querySelector('#updateAttribut');

    if(updateAttributButton){

        updateAttributButton.addEventListener('click' , ()=>{

            let titleInput = document.querySelector('#attributeTitle');

            let attributeTitle = titleInput.value.trim();
            let attributeID = +titleInput.dataset.attributeId;

            if( !attributeTitle.match(/^[a-z0-9_-\sа-я]{2,79}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if

            $.ajax( `${window.ServerAddress}?ctrl=ProductAttributes&act=saveAttribute`, {
                method: 'POST',
                data: {
                    'attributeID': attributeID,
                    'attributeTitle':attributeTitle
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