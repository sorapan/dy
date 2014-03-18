(function($){

    $.rbscroll = function(options){

        var settings = $.extend({

            pageType : "",
            timer : "800"

        },options);

        function run(){

            init(settings.pageType);
            engine(settings.pageType,parseInt(settings.timer));

        }

        return run();

    }

})(jQuery);

function engine(pagetype,timer){

    $(pagetype).first().addClass("rbactive");
    var page = $(document);

    page.data('ready',true).on('DOMMouseScroll mousewheel',function(e){

        e.preventDefault();
        if(page.data('ready') == false) return ;

        page.data('ready',false);

        var broswser_event = e.originalEvent.detail < 0 || e.originalEvent.wheelDelta > 0 ? -1 : 1;

        if(broswser_event > 0){

            if($(pagetype).last().attr("class") != $(pagetype).first().attr("class")+" rbactive"){

                //scroll down
                var next = $(' .rbactive').next();

                scrollToTarget(next.offset().top,timer);

                setTimeout(function(){

                    next.addClass('rbactive').siblings().removeClass('rbactive');
                    page.data('ready',true);


                },timer);

            }else{

                page.data('ready',true);

            }

        }else{

            if($(pagetype).first().attr("class") != $(pagetype).last().attr("class")+" rbactive"){

                //scroll up

                var prev = $(' .rbactive').prev();

                scrollToTarget(prev.offset().top,timer);

                setTimeout(function(){

                    prev.addClass('rbactive').siblings().removeClass('rbactive');
                    page.data('ready',true);

                },timer);

            }else{

                page.data('ready',true);

            }


        }


    });

}

function init(pagetype){

    $("html,body").animate({ scrollTop: 0 },1);
    $(pagetype).first().addClass('rbactive');

}

function scrollToTarget(target,timer){

    $(" html,body").animate({

        scrollTop : target

    },timer);

}

