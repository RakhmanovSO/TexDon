"use strict";

(function (  ){


    // добавить еще 40 Товаров

    $(document).ready(() => {

         let offset = 3;

    $('#moreProducts').click(function () {

        $.ajax( `${window.ServerAddress}?ctrl=Product&act=moreProducts`, {
            method: 'GET',
            data: {
                'offset': offset,
            },
            success: ( response )=> {

                console.log('RESPONSE' , response, offset);

                offset += 3;

                let productsTable = document.querySelector('#productsTable');

                response.data.forEach(function ( pr ) {


                    productsTable.innerHTML += `

                   <tr data-product-id= ${pr.productID} >

                   <td align="center" > <p style="margin-top: 45px; font-size: 13pt;"> ${pr.productID}  </p> </td>
                   <td > <p style="margin-top: 45px; font-size: 13pt; "> ${pr.productTitle} </td>
                   <td align="center"> <p style="margin-top: 45px; font-size: 13pt;">  <b>${pr.productPrice} руб. </b></p></td>

                   <td align="center">
                       <a id ="updateProduct" class="btn btn-primary" style="margin-top: 2px; margin-bottom: 5px; " href="?ctrl=Product&act=updateProduct&productID=${pr.productID}" >Общ. информ.</a> <BR>
                       <a id ="updateImages" class="btn btn-primary" style="margin-bottom: 5px;" href="?ctrl=Product&act=updateImagesProduct&productID=${pr.productID}" >Изображения</a> <BR>
                       <a id ="updateAttributes" class="btn btn-primary" style="margin-bottom: 2px; width:130px; " href="?ctrl=Product&act=updateAttributesProduct&productID=${pr.productID}" >Атрибуты</a> <BR>
                   </td>

                   <td align="center"><div style="margin-top: 45px; width:120px;" data-product-id=${pr.productID} class="btn btn-danger" >Удалить</div></td>

               </tr>
                       `;
                });

            }

        } )// ajax

    });  /// moreProducts
    }); // (document).ready


    //Удаление Товара

    let productID = -1;

    $('main').on( 'click' , '.btn-danger' , function (  ){

        productID = $(this).data('product-id');

        console.log(productID);

        if( productID === -1){

            console.log(productID);

            return;

        }//if

        $('#removeProductModal').modal();

    });

    let confirmRemoveProductButton = document.querySelector('#confirmRemoveProduct');

    if(confirmRemoveProductButton){

        confirmRemoveProductButton.addEventListener('click' , function (  ){

            if( productID === -1){
                return;
            }//if


            $.ajax( `${window.ServerAddress}?ctrl=Product&act=removeProduct`, {
                // $.ajax( "http://localhost:5012/TexDon/index.php?ctrl=Product&act=removeProduct&XDEBUG_SESSION_START=18102", {
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




    /*

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


*/


} )();