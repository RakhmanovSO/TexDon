"use strict";


(function (  ){


    //Добавление новой Подкатегории
    let addCategoryButton = document.querySelector('#addSubcategory');

    if(addCategoryButton){

        addCategoryButton.addEventListener('click' , async function (  ){

            let subcategoryTitle = document.querySelector('#subcategoryTitle').value;

            if(!subcategoryTitle.match(/^[a-zа-я0-9-_\s]{2,79}$/i)){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы ввели не некорректное название для новой подкатегории');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if


            let subcategoryImagePath = document.querySelector('#subcategoryImagePath').files[0];

            if( subcategoryImagePath === undefined ){
                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не добавили изображение для новой подкатегории');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if


            var selector = document.getElementById('productCategories');
            var categoryID = selector[selector.selectedIndex].value;


            let subcategoryData = new FormData();

            subcategoryData.append('subcategoryTitle', subcategoryTitle);

            subcategoryData.append('subcategoryImagePath', subcategoryImagePath);

            subcategoryData.append('categoryID', categoryID);

            $.ajax({
                url:  `${window.ServerAddress}?ctrl=Subcategory&act=addNewSubcategory`,
                data: subcategoryData,
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

        }); // addEventListener 'click'

    }//if

    //Удаление Подкатегории

    let removeButtons = document.querySelectorAll('.btn-danger');

    let subcategoryID = -1;

    let  categoryandsubcategoryID = -1;

    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            subcategoryID = this.dataset.subcategoryId;

            categoryandsubcategoryID = this.dataset.subcategorytocategoryId;


            $('#removeSubcategoryModal').modal();

        } )

    } );

    let confirmRemoveSubcategoryButton = document.querySelector('#confirmRemoveSubcategory');

    if(confirmRemoveSubcategoryButton){

        confirmRemoveSubcategoryButton.addEventListener('click' , function (  ){

            if( subcategoryID === -1){
                return;
            }//if

            if( categoryandsubcategoryID === -1){
                return;
            }//if

            $.ajax( `${window.ServerAddress}?ctrl=Subcategory&act=removeSubcategory`, {
                method: 'DELETE',
                data: {
                    'subcategoryID': subcategoryID,
                    'categoryandsubcategoryID': categoryandsubcategoryID
                },
                success: ( data , textStatus )=>{

                    $(`tr[data-subcategory-id='${subcategoryID}']`).remove();

                }
            } )

        } );

    }//if


    //Обновление Подкатегории
    let updateSubcategoryButton = document.querySelector('#updateSubcategory');

    if(updateSubcategoryButton){

        updateSubcategoryButton.addEventListener('click' , ()=>{

            let titleInput = document.querySelector('#subcategoryTitle');

            let subcategoryTitle = titleInput.value.trim();

            let subcategoryID = +titleInput.dataset.subcategoryId;

            let categoryandsubcategoryID = +titleInput.dataset.subcategorytocategoryId;

            var selector = document.getElementById('productCategories');

            var categoryID = selector[selector.selectedIndex].value;


            if( !subcategoryTitle.match(/^[a-z0-9\sа-я-]{2,79}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if



            let subcategoryImagePath = document.querySelector('#subcategoryImagePath').files[0];

            if( subcategoryImagePath === undefined || subcategoryImagePath === NaN ){

                let path = document.querySelector('#oldSubcategoryImagePath');
                subcategoryImagePath = path.dataset.path1;

            }//if

            let subcategoryData = new FormData();

            subcategoryData.append('categoryID', categoryID);

            subcategoryData.append('subcategoryID', subcategoryID);

            subcategoryData.append('subcategoryTitle', subcategoryTitle);

            subcategoryData.append('categoryandsubcategoryID', categoryandsubcategoryID);

            subcategoryData.append('subcategoryImagePath', subcategoryImagePath);


            $.ajax({
                url: `${window.ServerAddress}?ctrl=Subcategory&act=saveSubcategory`,
                data: subcategoryData,
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

                    if (response.code === 200 ) {
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




            /*

            $.ajax( `${window.ServerAddress}?ctrl=Subcategory&act=saveSubcategory`, {
                method: 'POST',
                data: {
                    'categoryandsubcategoryID': categoryandsubcategoryID,
                    'categoryID': categoryID,
                    'subcategoryID': subcategoryID,
                    'subcategoryTitle':subcategoryTitle
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

            */


        });
    }//if

} )();