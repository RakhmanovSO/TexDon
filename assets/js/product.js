"use strict";

(function (  ){


    //Удаление Товара

    let removeButtons = document.querySelectorAll('.btn-danger');

    let productID = -1;


    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            productID = this.dataset.productId;

            $('#removeProductModal').modal();

        } )

    } );

    let confirmRemoveProductButton = document.querySelector('#confirmRemoveProduct');

    if(confirmRemoveProductButton){

        confirmRemoveProductButton.addEventListener('click' , function (  ){

            if( productID === -1){
                return;
            }//if


           $.ajax( `${window.ServerAddress}?ctrl=Product&act=removeProduct`, {
           // $.ajax( "http://localhost:5012/TexDon/index.php?ctrl=Product&act=removeProduct&XDEBUG_SESSION_START=14959", {
                method: 'DELETE',
                data: {
                    'productID': productID,

                },
                success: ( data , textStatus )=>{

                    $(`tr[data-product-id='${productID}']`).remove();

                }
            } )

        } );

    }//if





} )();