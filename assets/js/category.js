"use strict";


(function (  ){


    //Добавление новой категории
    let addCategoryButton = document.querySelector('#addCategory');

    if(addCategoryButton){

        addCategoryButton.addEventListener('click' , async function (  ){

            let categoryTitle = document.querySelector('#categoryTitle').value;

            if(!categoryTitle.match(/^[a-zа-я0-9-_\s]{2,79}$/i)){
                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы ввели не некорректное название для новой категории');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if


            let categoryImagePath = document.querySelector('#categoryImagePath').files[0];


            if( categoryImagePath === undefined ){
                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не добавили изображение для новой категории');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if

            /*
            if( document.querySelector('#categoryImagePath').files[0] === 0 ){
                $('#successMessage').fadeOut(100);
                $('#errorMessage').text('Вы не добавили изображение для новой категории');
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                return;
            }//if
            */

            let categoryData = new FormData();

            categoryData.append('categoryTitle', categoryTitle);

            categoryData.append('categoryImagePath', categoryImagePath);


            $.ajax({
                url: `${window.ServerAddress}?ctrl=Category&act=addNewCategory`,
                //url: "http://localhost:5012/TexDon/index.php?ctrl=Category&act=addNewCategory&XDEBUG_SESSION_START=19847",
                data: categoryData,
                processData: false,
                contentType: false,
                type: "POST",
                success:  (response)=> {

                    console.log( 'response' , response );

                    if(response.code === 200){
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').text('Новая категория добавлена успешно!');
                        $('#successMessage').fadeIn( 100 ).delay(2500).fadeOut(100);
                    }//else
                    else{

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text('Ошибка добавления новой категории!');

                        $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                    }//else
                },
                error: (response)=> {

                    console.log('response', response);

                    if (response.code === 200) {
                        $('#errorMessage').fadeOut(100);
                        $('#successMessage').text('Новая категория добавлена успешно!');
                        $('#successMessage').fadeIn(100).delay(2500).fadeOut(100);
                    }//else
                    else {

                        $('#successMessage').fadeOut(100);
                        $('#errorMessage').text('Ошибка добавления новой категории!');

                        $('#errorMessage').fadeIn(100).delay(2500).fadeOut(100);

                    }//else
                }

            }); // ajax


           /* $.post(`${window.ServerAddress}?ctrl=Category&act=addNewCategory`,
                {'categoryTitle': categoryTitle} , function ( response ){

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

            } );  */

        } );

    }//if

    //Удаление категории

    let removeButtons = document.querySelectorAll('.btn-danger');

    let categoryID = -1;

    [].forEach.call( removeButtons , ( removeButton )=>{

        removeButton.addEventListener('click' , async function (  ){

            categoryID = this.dataset.categoryId;

            console.log( categoryID );

            $('#removeCategoryModal').modal();

        } )

    } );

    let confirmRemoveCategoryButton = document.querySelector('#confirmRemoveCategory');

    if(confirmRemoveCategoryButton){

        confirmRemoveCategoryButton.addEventListener('click' , function (  ){

            if( categoryID === -1){
                return;
            }//if

            $.ajax( `${window.ServerAddress}?ctrl=Category&act=removeCategory&XDEBUG_SESSION_START=18109`, {
                method: 'DELETE',
                data: {
                    'categoryID': categoryID
                },
                success: ( data , textStatus )=>{

                    $(`tr[data-category-id='${categoryID}']`).remove();

                }
            } )

        } );

    }//if

    //Обновление категории
    let updateCategoryButton = document.querySelector('#updateCategory');

    if(updateCategoryButton){

        updateCategoryButton.addEventListener('click' , ()=>{

            let titleInput = document.querySelector('#categoryTitle');

            let categoryTitle = titleInput.value.trim();
            let categoryID = +titleInput.dataset.categoryId;

            if( !categoryTitle.match(/^[a-z0-9\sа-я]{2,79}$/i) ){

                $('#successMessage').fadeOut(100);
                $('#errorMessage').fadeIn( 100 ).delay(2500).fadeOut(100);

                return;

            }//if


            let categoryImagePath = document.querySelector('#categoryImagePath').files[0];

            if( categoryImagePath === undefined || categoryImagePath === NaN ){

                let path = document.querySelector('#oldCategoryImagePath');
                categoryImagePath = path.dataset.path;

            }//if


            let categoryData = new FormData();

            categoryData.append('categoryID', categoryID);

            categoryData.append('categoryTitle', categoryTitle);

            categoryData.append('categoryImagePath', categoryImagePath);



            $.ajax({
                url:  `${window.ServerAddress}?ctrl=Category&act=saveCategory`,
                data: categoryData,
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
            $.ajax( `${window.ServerAddress}?ctrl=Category&act=saveCategory`, {
                method: 'POST',
                data: {
                    'categoryID': categoryID,
                    'categoryTitle':categoryTitle
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