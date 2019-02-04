"use strict";

(function (  ){

    let isNewAttributeRemove = false;
    let productID = -1;
    let attributeID = -1;

    $('body').on('click' , '.btn-danger' , ()=>{});

    $('confirmRemove').click(function (  ){

        if(isNewAttributeRemove){

            // DOM remove
            // return ;
        }

        //$.ajax

    } );


} )();

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
                    <td><div data-attribute-id=${attr.attributeID} class="btn btn-danger temp" >Удалить</div></td>
                    
                    </tr>
                `;
            } )

        } );

    }//if


    /////////////////////////  ??????  Удаление Нового Атрибута из таблицы к добавлению
    let attributeID = - 1;
    let productID = - 1;

    $('body').on( 'click' , '.btn-danger' , function (  ){

        attributeID = $(this).data('attribute-id');

        productID = $(this).data('product-id');

        console.log(attributeID );

        $('#removeOldProductAttributModal').modal();

    }  );

    // let removeNewAttributeButtons = document.querySelectorAll('.btn-danger');
    //
    // let id = -1;
    //
    //
    // [].forEach.call( removeNewAttributeButtons , ( removeNewAttributeButtons )=>{
    //
    //     removeNewAttributeButtons.addEventListener('click' , async function (  ){
    //
    //         id = this.dataset.attributeId;
    //
    //         console.log(  id  );
    //
    //         $('#removeNewAttributModal').modal();
    //
    //     } )
    //
    // } );
    //
    let confirmRemoveNewAttributButton = document.querySelector('#confirmRemoveNewAttribut');

    if(confirmRemoveNewAttributButton ){

        confirmRemoveNewAttributButton .addEventListener('click' , function (  ){

            if( id === -1){
                return;
            }//if

            $(`tr[data-attribute-id='${id}']`).remove();


        } );

    }//if
    //
    //
    // /////////////////////////////
    //
    //
    //
    //
    // /////////////////////////  ?????? Удаление уже добавленных атрибутов
    //
    //
    // let removeOldAttributeButtons = document.querySelectorAll('.btn-danger');
    //
    // let attributeID = -1;
    // let productID = -1;
    //
    // [].forEach.call( removeOldAttributeButtons , ( removeOldAttributeButtons )=>{
    //
    //     removeOldAttributeButtons.addEventListener('click' , async function (  ){
    //
    //
    //
    //     } )
    //
    // } );

    let confirmRemoveOldAttributButton = document.querySelector('#confirmRemoveOldProductAttribut');

    if(confirmRemoveOldAttributButton ){

        confirmRemoveOldAttributButton .addEventListener('click' , function (  ){

            if( removeNewAttribute ){

                $(`tr[data-attribute-id=${$(this).data('attribute-id')}]`).remove();
                return ;

            }//if

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

            }
        });

    } );



    }//if







} )();