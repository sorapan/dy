
var count = 0;
var fileupload = [];


$(function(){

    var upload_display = $(" #upload_display");
    upload_display.on('dragenter',function(e){e.preventDefault();});
    upload_display.on('dragover',function(e){e.preventDefault();});
    $(" #add_btn").on('click',function(e){e.preventDefault();});

    upload_display.on('drop', function(e)
    {
        e.preventDefault();
        Appendlist(e.originalEvent.dataTransfer);

    });

    $(document).on('change',' .file',function(e){

        e.preventDefault();
        Appendlist($(this)[0]);

    });

    $(document).on('click','.del',function(e){

        e.preventDefault();
        var num = $(this).attr("id");
        $(" .list"+num).remove();
        fileupload.splice(num,1,"");

    });

    $(" #upload_btn").click(function(e){

        e.preventDefault();

        if($(" #upload_list").is(':empty')){

            alert("Input shouldn't be empty!");
            return false;

        }else{

            $(' .button_style1').hide();
            $(' #close_upload_box').hide();
            upupup();

        }



    });

});

/////////////////////////////////////////////////////////////////
/////////////////////////////PRIVATE/////////////////////////////
/////////////////////////////////////////////////////////////////

function bytesToSize(bytes) {
    var k = 1000;
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes === 0) return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(k)),10);
    return (bytes / Math.pow(k, i)).toPrecision(3) +  sizes[i];
}

function Appendlist(data){

    for(var i=0;i<data.files.length;i++){

        fileupload.push(data.files[i]);

        $(" #upload_list").append(""+
            "<div class='list"+count+"'>Name: "+data.files[i].name+
            " Size: "+bytesToSize(data.files[i].size)+
            " <a href='' class='del' id='"+count+"' >Delete</a></div>");

        count++;

    }

}

function upupup(){

    var q = 0;
    function fuck(){
    var formdata = new FormData();

    if(fileupload[q]!=""){

        formdata.append("god",fileupload[q]);

        $.ajax({
            xhr: function()
            {
                //Upload progress
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {

                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = percentComplete*100;
                        percentComplete = percentComplete.toFixed(1);
                        $(" .list"+q).html(percentComplete+" %");

                    }
                }, false);
                return xhr;
            },

            url: "uploadupit",
            type: "POST",
            data:formdata,
            processData: false,
            contentType: false,
            success:function(data){

                $(" .list"+q).html("100 %");
                setTimeout(function(){

                    $(" .list"+q).html(data);
                    if(q == fileupload.length-1){

                        $(" #xcancel").html("Exit").css({'background-color':'green'}).show();

                    }else{

                        q++;
                        fuck();

                    }

                },500);
            }
        });
    }

    }

    fuck();

}