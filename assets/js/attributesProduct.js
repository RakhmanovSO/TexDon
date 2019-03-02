"use strict";

(function (  ){


    let attributes = []; // атрибуты продукта


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

            if(!val.match(/^[a-zа-я0-9-*#'№$";_.,!:.,+%()\s]{1,100}$/i)){

                $('#errorMessage1').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;
            }//if


            let exist = attributes.find( attr => attr.attributeID === currentAttribute.attributeID );

            if( exist === undefined){

                $('#errorMessage2').fadeIn( 100 ).delay(1500).fadeOut(100);
                return;
            }//if

            exist.attributeValue = val;

            while(attributesTable.firstChild){
                attributesTable.removeChild( attributesTable.firstChild );
            }//while

            attributes.forEach( attr => {
                attributesTable.innerHTML += ` 
                    <tr data-attribute-id = ${attr.attributeID} >
                    
                    <td>${attr.attributeTitle}</td>
                    <td>${attr.attributeValue}</td>
                    <td><div data-attribute-id=${attr.attributeID} class="btn btn-danger newbtn" >Удалить</div></td>
                    
                    </tr>
                `;
            } )

        } );

    }//if


    /////////////////////////  Удаление Нового Атрибута из таблицы к добавлению

    let id = -1;

    $('main').on( 'click' , '.btn.btn-danger.newbtn' , function (  ){

        id = $(this).data('attribute-id');

        console.log(id, attributes);

        if( id === -1){

            console.log(id, attributes);

            return;

        }//if

        let deleteItemArray;

        // deleteItemArray = attributes.search(attributes, attributes['attributeID']===id);

        deleteItemArray = attributes.find( attr => attr.attributeID === id);

        console.log( deleteItemArray );

        attributes.splice(deleteItemArray , 1);


        $(`tr[data-attribute-id='${id}']`).remove();

    });



    /////////////////////////  Удаление уже добавленных атрибутов

    /*
      let removeOldAttributeButtons = document.querySelectorAll('.btn.btn-danger.oldbtn');

         let attributeID = -1;
         let productID = -1;


        [].forEach.call( removeOldAttributeButtons , ( removeOldAttributeButtons )=>{

            removeOldAttributeButtons.addEventListener('click' , async function (  ){

                attributeID = this.dataset.attribId;

                productID = this.dataset.productId;


                console.log(attributeID,  productID);

                $('#removeOldProductAttributModal').modal();

            } )

        } );


        */

    let attributeID = -1;
    let productID = -1;

    $('main').on( 'click' , '.btn-danger' , function (  ){

        productID = $(this).data('product-id');

        attributeID = $(this).data('attrib-id');

        console.log(productID);
        console.log( attributeID);

        if( productID === -1){
            console.log(productID);
            return;
        }//if

        if( attributeID === -1){
            console.log(attributeID);
            return;
        }//if

        $('#removeOldProductAttributModal').modal();

    });


    let confirmRemoveOldAttributButton = document.querySelector('#confirmRemoveOldProductAttribut');

    if(confirmRemoveOldAttributButton ){

        confirmRemoveOldAttributButton .addEventListener('click' , function (  ){

            if( attributeID === -1){
                return;
            }//if


            if( productID === -1){
                return;
            }//if

           $.ajax( `${window.ServerAddress}?ctrl=Product&act=removeProductAttribute`, {

               // $.ajax( "http://localhost:5012/TexDon/index.php?ctrl=Product&act=removeProductAttribute&XDEBUG_SESSION_START=16822", {

                method: 'DELETE',
                data: {
                    'attributeID': attributeID,
                    'productID': productID,

                },
                success: ( data , textStatus )=>{

                    $(`tr[data-attrib-id='${attributeID}']`).remove();

                }
            } )


        } );

    }//if

    /////////////////////////////


//Добавление атрибутов в базу дан.

    let attributesOldTable = document.querySelector('#attributesOldTable');


    let updateAttributButton = document.querySelector('#updateAttributProduct');


    if(updateAttributButton){

        updateAttributButton.addEventListener('click' , async function (  ){



            let input = document.querySelector('#productID');

            let productID = +input.dataset.productId;


            let attributesData = new FormData();

            attributesData.append('productID' , productID);
            attributesData.append('attributes' , JSON.stringify(attributes) );

        $.ajax({
            url: `${window.ServerAddress}?ctrl=Product&act=saveUpdateAttributesProduct`,
            data: attributesData,
            processData: false,
            contentType: false,
            type: "POST",
            success: ( response )=>{

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

                attributes.forEach( attr => {
                    attributesOldTable.innerHTML += ` 
                    <tr data-attrib-id = ${attr.attributeID} >
                    
                    <td>${attr.attributeTitle}</td>
                    <td>${attr.attributeValue}</td>
                    <td><div data-attrib-id=${attr.attributeID} data-product-id=${productID} class="btn btn-danger oldbtn" >Удалить</div></td>
                    
                    </tr>  `;
                } )  // attributes.forEach


            }
        });

    } );



    }//if







} )();