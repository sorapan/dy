$(function(){


    $(" .signup").click(function(e){

        e.preventDefault();
        $(" #signup_window").toggleClass("slide");

    });

    $(" #signup_back").click(function(e){

        e.preventDefault();
        $(" #signup_window").removeClass("slide");
        $(" #login_window").removeClass("slide");

    });

    $(" .signin").click(function(e){

        e.preventDefault();
        $(" #login_window").toggleClass("slide");

    });

    if($(" #alertbox").text().trim().length){

        $(" #alertbox").show();
        $(" #alertbox_x").show();

    }

    $(" #alertbox_x").click(function(){

        $(" #alertbox").hide();
        $(" #alertbox_x").hide();

    });



});