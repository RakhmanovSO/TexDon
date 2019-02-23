"use strict";

(function (  ){

    let searchProductButton = document.querySelector('#searchProduct');

    if(searchProductButton){

        searchProductButton.addEventListener('click' , ()=>{


            let titleInput = document.querySelector('#productTitle');

            let productTitle = titleInput.value.trim();


            if(!productTitle.match(/^[a-zа-я0-9-_,..,/*()$&'""{}:;#№;!&@ёЁ\s]{2,198}$/i)){

                $('#errorMessage1').fadeIn( 100 ).delay(1500).fadeOut(100);

                return;

            }//if


            $.ajax( `${window.ServerAddress}?ctrl=Search&act=searchProduct`, {
               // $.ajax( "http://localhost:5012/TexDon/index.php?ctrl=Search&act=searchProduct&XDEBUG_SESSION_START=13160", {
                method: 'POST',
                data: {
                    'productTitle': productTitle
                },
                /*
               success: ( response )=>{

                   jQuery.parseJSON(response);

                   let productsTable = document.querySelector('#productsTable');

                   response.forEach(function(data, pr) {

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



                }//success
                */

            } );
        });
    }//if

} )();