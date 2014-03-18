$(function(){

    var a = 0,qq;
    aaa();

    function aaa(){

        qq = setTimeout(function(){

            if(a==5){

                a=0;
                ini();
                aaa();

            }else{

                a++;
                $(" .uu").animate({left: "-=100%"}, 1000);
                aaa();

            }

        },2500);

    }

    function ini(){

        $(" #u1").css({'left':'0'});
        $(" #u2").css({'left':'100%'});
        $(" #u3").css({'left':'200%'});
        $(" #u4").css({'left':'300%'});
        $(" #u5").css({'left':'400%'});
        $(" #u6").css({'left':'500%'});

    }


});