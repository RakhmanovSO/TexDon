"use strict";

(function (  ){


    let attributes = [];

    let attributesTable = document.querySelector('#attributesTable');

    let addAttributeToProductButton = document.querySelector('#addAttributeToProduct');

    let currentAttribute = {
        attributeTitle: '',
        attributeID: '',
        attributeValue: '',
    };


    document.querySelector('#productAttributes').addEventListener('change', function (  ){

        let exist = attributes.find( attr => attr.attributeID === this.value );


        if(exist){
            return;
        }//if

        currentAttribute.attributeID = this.value;

        let title = document.querySelector(`option[value='${this.value}']`).dataset.title;

        //  let title = document.querySelector(`option[value='${this.value}']`).getAttribute('data-title');

        currentAttribute.attributeTitle = title;

        attributes.push( {
            attributeID: currentAttribute.attributeID,
            attributeTitle: currentAttribute.attributeTitle,
            attributeValue: ''
        } );

    } );


    if(addAttributeToProductButton){

        addAttributeToProductButton.addEventListener('click' , function (  ){

            let val = document.querySelector('#attributeValue').value;

            let exist = attributes.find( attr => attr.attributeID === currentAttribute.attributeID );

            exist.attributeValue = val;

            while(attributesTable.firstChild){
                attributesTable.removeChild( attributesTable.firstChild );
            }//while

            attributes.forEach( attr => {
                attributesTable.innerHTML += ` 
                    <tr data-attribute-id = ${attr.attributeID} >
                    
                    <td>${attr.attributeTitle}</td>
                    <td>${attr.attributeValue}</td>
                    <td><div data-attribute-id=${attr.attributeID} class="btn btn-danger" >Удалить</div></td>
                    
                    </tr>
                `;
            } )

        } );

    }//if


    /////////////////////////  ??????

    // Удаление Атрибута из таблицы

    let removeAttributeButtons = document.querySelectorAll('.btn-danger');

    let attributeID = -1;


    [].forEach.call( removeAttributeButtons , ( removeAttributeButtons )=>{

        removeAttributeButtons.addEventListener('click' , async function (  ){

            attributeID = this.dataset.attributeId;

            console.log( attributeID );

            $('#removeAttributeModal').modal();

        } )

    } );

    let confirmRemoveButton = document.querySelector('#confirmRemoveAttribute');

    if(confirmRemoveButton){

        confirmRemoveButton.addEventListener('click' , function (  ){

            if( attributeID === -1){
                return;
            }//if

                    $(`tr[data-attribute-id='${attributeID}']`).remove();


        } );

    }//if


    /////////////////////////////


    //Добавление товара

    let addProductButton = document.querySelector('#addProduct');


    if(addProductButton){

        addProductButton.addEventListener('click' , async function (  ){

            let productTitle = document.querySelector('#productTitle').value;

            if(!productTitle.match(/^[a-zа-я0-9_\s]{2,50}$/i)){

                $('#errorMessage1').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if


            let productPrice = document.querySelector('#productPrice').value;

            if(!productPrice.match(/^[0-9.,]{2,20}$/i)){

                $('#errorMessage2').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;

            }//if


            let productDescription = document.querySelector('#productDescription').value;

            if(!productDescription.match(/^[a-zа-я0-9_\s]{2,499}$/i)){

                $('#errorMessage3').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;
            }//if


            let selector = document.getElementById('productSubcategories');
            let subcategoryID = selector[selector.selectedIndex].value;


            let productData = new FormData();

            productData.append('productTitle' ,productTitle );
            productData.append('productPrice' ,productPrice );
            productData.append('productDescription' ,productDescription );
            productData.append('subcategoryID' , subcategoryID );
            productData.append('attributes' ,JSON.stringify(attributes) );


            ////// ImagePath  ?????

            let productImagePath = document.querySelector("#productImagePath").files[0];

            if( productImagePath === undefined ){
                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не добавили изображение для товара');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if


            productData.append('productImagePath' , productImagePath);


            $.ajax({
                //url: `${window.ServerAddress}?ctrl=Product&act=addNewProduct`,

                url: "http://localhost:5012/TexDon/index.php?ctrl=Product&act=addNewProduct&XDEBUG_SESSION_START=14318",
                data: productData,
                processData: false,
                contentType: false,
                type: "POST",
                success:  (response)=> {

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
                },
                error: (response)=> {

                    console.log('response', response);

                    if (response.code === 200) {
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').fadeIn(100).delay(2500).fadeOut(100);
                    }//else
                    else {

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text(response.message);
                        $('#errorMessage').fadeIn(100).delay(2500).fadeOut(100);

                    }//else
                }

            }); // ajax








        } );


    } // if  addProductButton



} )();