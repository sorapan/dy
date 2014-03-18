$(function(){

    $(" #menu_button.upload_btn").click(function(e){

        e.preventDefault();
        $(" #upload_box").toggleClass("upload_box_open");
        $(" #modal").toggleClass("display");

    });

    $(" #close_upload_box").click(function(){

        $(" #upload_box").removeClass("upload_box_open");
        $(" #modal").removeClass("display");

    });



});