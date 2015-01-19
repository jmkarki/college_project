var inputFile,ah,ab;
$(document).ready(function() {
    var p = $("#uploadPreview");
    var _URL = window.URL || window.webkitURL;

    $("#uploadImage").change(function(e){
         var file, img,aw;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {
                aw= (this.width)/340;
                ah = this.height;
                ab = this.width;
                $('#chag_sort').val(aw);
            };
            img.src = _URL.createObjectURL(file);
        }
        p.fadeOut();
        var ext = $('#uploadImage').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
             $("#uploadImage").val("");
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
        };
        if($(this).val() != ''){
            $('#ok_btn').prop('disabled',false);
        }
    });     
    $("#uploadPreview").imgAreaSelect({
        x1 : 120,
        y1 : 64,
        x2 : 276, 
        y2 : 220,
        aspectRatio: '1:1',
        instance: true,
        onSelectStart: function(){
            $(".imgareaselect-outer").show();
            $(".imgareaselect-border1").show();
            $(".imgareaselect-border2").show();
            $(".imgareaselect-border3").show();
            $(".imgareaselect-border4").show();
        },
        onSelectEnd: setInfo                        
    });

    $('img#uploadPreview').load(function(){      
        $(this).imgAreaSelect({
            x1 : 120,
            y1 : 64,
            x2 : 276, 
            y2 : 220,
            aspectRatio: '1:1',
            instance: true,
            onSelectStart: function(){
                $(".imgareaselect-outer").show();
                $(".imgareaselect-border1").show();
                $(".imgareaselect-border2").show();
                $(".imgareaselect-border3").show();
                $(".imgareaselect-border4").show();
            },
            onSelectEnd: setInfo                        
        });
        $('#x').val(120);
        $('#y').val(64);
        $('#w').val(276);
        $('#h').val(220);
    });
    
    $("#close_btn").on('click',function(){ 
        $(".imgareaselect-outer").hide();
        $(".imgareaselect-border1").hide();
        $(".imgareaselect-border2").hide();
        $(".imgareaselect-border3").hide();
        $(".imgareaselect-border4").hide();  
    });
        
    $("#ok_btn").unbind().on('click',function(){
        $(".imgareaselect-outer").hide();
        $(".imgareaselect-border1").hide();
        $(".imgareaselect-border2").hide();
        $(".imgareaselect-border3").hide();
        $(".imgareaselect-border4").hide();
        $('#removed').val('0');
        var xval = $("#x").val();
        var yval = $("#y").val();
        var resizex = 100/$("#w").val();
        var resizey = 100/$("#h").val();

        $("#prev_img img").css({
            'width': Math.round(resizex*ab)+'px',
            'height': Math.round(resizey*ah)+'px'
        });
        $("#prev_img").show();
        if($("#removeApicture").length == 0)
        var checkPoint = $('.check_close').val();
        if(checkPoint == 0){
            $('#addApicture').after('<button class="btn-green" id="cancel" style="margin-left: 5px;">Cancel</button>');
            $('.check_close').val(1);
        }else{
            $("#prev_img").one().before('');
        }        
        $("#close_btn").click();

    });
      
});

function setInfo(i, e) {
        
    var as= $('#chag_sort').val();
    var x= e.x1 * as;
    var y= e.y1 * as;
    var w= e.width * as;
    var h= e.height * as;
    $('#x').val(x);
    $('#y').val(y);
    $('#w').val(w);
    $('#h').val(h);
    if((e.x1==e.x2)&&(e.y1==e.y2)){
        $( 'img#uploadPreview' ).imgAreaSelect({
            instance: true,
            aspectRatio: '1:1', 
            x1 : 120,
            y1 : 64,
            x2 : 276, 
            y2 : 220                        
        });
        $('#x').val(120);
        $('#y').val(64);
        $('#w').val(276);
        $('#h').val(220);
    }
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#prev_img img').attr('src', e.target.result);

        };

        reader.readAsDataURL(input.files[0]);
    }
}
$('#imgdiv').on('click','#cancel',function(){
    $('.check_close').val(0);
    $(this).remove();
    $('#x').val('');
    $('#y').val('');
    $('#w').val('');
    $('#h').val('');
    $('#prev_img').hide();
    return false;
});
