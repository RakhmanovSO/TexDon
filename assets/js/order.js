"use strict";


(function (  ){


    //Удаление заказа

    let removeButtons = document.querySelectorAll('.btn-danger');

    let orderID = -1;



    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            orderID = this.dataset.orderId;

            $('#removeOrderModal').modal();

        } )

    } );

    let confirmRemoveOrderButton = document.querySelector('#confirmRemoveOrder');

    if(confirmRemoveOrderButton){

        confirmRemoveOrderButton.addEventListener('click' , function (  ){

            if( orderID === -1){
                return;
            }//if


            $.ajax( `${window.ServerAddress}?ctrl=Order&act=removeOrder`, {
                method: 'DELETE',
                data: {
                    'orderID': orderID

                },
                success: ( data , textStatus )=>{

                    $(`tr[data-order-id='${orderID}']`).remove();

                }
            } )

        } );

    }//if




} )();