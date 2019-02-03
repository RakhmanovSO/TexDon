"use strict";

(function (  ){


//Обновление товара

    let updateProductButton = document.querySelector('#updateProduct');

    if(updateProductButton){

        updateProductButton.addEventListener('click' , async function (  ){

            let titleInput = document.querySelector('#productTitle');

            let productTitle = titleInput.value.trim();

            let productID = +titleInput.dataset.productId;

            let subcategoryandproductID = +titleInput.dataset.subcandproduct;

            if(!productTitle.match(/^[a-zа-я0-9-_\s]{2,198}$/i)){

                $('#errorMessage1').fadeIn( 100 ).delay(1500).fadeOut(100);

                return;

            }//if


            let brandProduct = document.querySelector('#brandProduct').value;

            if(!brandProduct.match(/^[a-zа-я0-9_\s]{2,198}$/i)){

                $('#errorMessage4').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if



            let productPrice = document.querySelector('#productPrice').value;

            if(!productPrice.match(/^[0-9.,]{2,20}$/i)){

                $('#errorMessage2').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if



            let productDescription = document.querySelector('#productDescription').value;

            if(!productDescription.match(/^[a-zа-я0-9-*#'№$";_.,!:.,+%()\s]{2,899}$/i)){

                $('#errorMessage3').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;
            }//if



            let selector = document.getElementById('productSubcategories');
            let subcategoryID = selector[selector.selectedIndex].value;


            let productData = new FormData();

            productData.append('productID' ,productID );
            productData.append('productTitle' , productTitle );
            productData.append('productPrice' , productPrice );
            productData.append('productDescription' , productDescription );
            productData.append('brandProduct' , brandProduct );
            productData.append('subcategoryID' , subcategoryID );
            productData.append('subcategoryandproductID' , subcategoryandproductID );

            $.ajax({
                url:  `${window.ServerAddress}?ctrl=Product&act=saveUpdateProduct`,
                data: productData,
                processData: false,
                contentType: false,
                type: "POST",
                success:  (response)=> {

                    console.log( 'response' , response );

                    if(response.code == "200"){
                        $('#errorMessage5').fadeOut(100);
                        $('#successMessag1').text(response.message);
                        $('#successMessag1').fadeIn( 100 ).delay(2500).fadeOut(100);
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






} )();