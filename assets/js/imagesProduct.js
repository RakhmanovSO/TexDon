"use strict";

(function (  ){



// Обновление/Добавление Изображений Товара

    let updateImageProductButton = document.querySelector('#updateImageProduct');

    if(updateImageProductButton){

        updateImageProductButton.addEventListener('click' , async function (  ){

            let input = document.querySelector('#productID');

            let productID = +input.dataset.productId;


            let productImagePath = document.querySelector('#productImagePath').files[0];

            if( productImagePath === undefined ){
                $('#successMessage1').fadeOut(100);
                $('#errorMessage5').text('Вы не добавили изображение !');
                $('#errorMessage5').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if



            let productData = new FormData();

            productData.append('productID' ,productID );
            productData.append('productImagePath' , productImagePath );

            $.ajax({
                url:  `${window.ServerAddress}?ctrl=Product&act=saveUpdateImagesProduct`,
                data: productData,
                processData: false,
                contentType: false,
                type: "POST",
                success:  (response)=> {

                    console.log( 'response' , response );

                    if(response.code == "200"){
                        $('#errorMessage5').fadeOut(100);
                        $('#successMessage1').text(response.message);
                        $('#successMessage1').fadeIn( 100 ).delay(2500).fadeOut(100);

                        imgTable.innerHTML += ` 
 
                    <tr data-pathimages-id = ${response.data.id} >
                    
                     <td> <a id="imagePath" class="btn" href=${response.data.imagesPath} data-path=${response.data.imagesPath}>
                            <img class="img-fluid" style="width:150px; height:150px" src=${response.data.imagesPath}>
                        </a>
                    </td>
                    
                    <td>
                        <div id="idPathImages" style=" width:200px; height: 43px; margin-top: 50px;" data-pathimages-id=${response.data.id} data-product-id=${response.data.productID} class="btn btn-danger">Удалить изображение</div>
                    </td>
                    
                    </tr> 
                        `;



                    }//else
                    else{

                        $('#successMessage1').fadeOut(100);
                        $('#errorMessage5').text(response.message);
                        $('#errorMessage5').fadeIn( 100 ).delay(2500).fadeOut(100);

                    }//else
                },
                error: (response)=> {

                    console.log('response', response);

                    if (response.code == "400") {
                        $('#errorMessage5').fadeOut(100);
                        $('#successMessage1').fadeIn(100).delay(2500).fadeOut(100);
                    }//else
                    else {

                        $('#successMessage1').fadeOut(100);
                        $('#errorMessage5').text(response.message);
                        $('#errorMessage5').fadeIn(100).delay(2500).fadeOut(100);

                    }//else
                }

            }); // ajax

        }); // addEventListener 'click'

    }//if




    // Удаление Изображений Товара

    /*

    let removeButtons = document.querySelectorAll('.btn-danger');

    let id = -1;
    let productID = -1;

    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            id = this.dataset.pathimagesId;
            productID = this.dataset.productId;

            $('#removeProductImageModal').modal();

        } )

    } );
    */

    let id = -1;
    let productID = -1;


    $('main').on( 'click' , '.btn-danger' , function (  ){

        id = $(this).data('pathimages-id');

        productID = $(this).data('product-id');

        $('#removeProductImageModal').modal();

    });






    let confirmRemoveProductImageButton = document.querySelector('#confirmRemoveProductImage');

    if(confirmRemoveProductImageButton){

        confirmRemoveProductImageButton.addEventListener('click' , function (  ){

            if(id === -1){
                return;
            }//if

            if(productID === -1){
                return;
            }//if


             $.ajax( `${window.ServerAddress}?ctrl=Product&act=removeProductImage`, {
           // $.ajax( "http://localhost:5012/TexDon/index.php?ctrl=Product&act=removeProductImage&XDEBUG_SESSION_START=15789", {
                method: 'DELETE',
                data: {
                    'id': id,
                    'productID': productID,

                },
                success: ( data , textStatus )=>{

                    $(`tr[data-pathimages-id='${id}']`).remove();

                }
            } )

        } );

    }//if














} )();