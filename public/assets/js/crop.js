var inputFile,ah,ab;
$(document).ready(function() {
	var p = $("#uploadPreview");
	var _URL = window.URL || window.webkitURL;

	$("#uploadImage").change(function(e){
		if(!document.getElementById("uploadImage").files[0]) {
			return false;
		}
		var file, img,aw;
    	if ((file = this.files[0])) {
        	img = new Image();
       	 	img.onload = function () {
             	aw = (this.width)/360;
             	ah = this.height;
             	ab = this.width;
             	$('#chag_sort').val(aw);

             	var x = 120 * aw;
			  	var y = 64 * aw;
			  	var w = (276-120) * aw;
			  	var h = (220-64) * aw;
				$('#x').val(x);
				$('#y').val(y);
				$('#w').val(w);
				$('#h').val(h);
        	};
        	img.src = _URL.createObjectURL(file);
    	}
		p.fadeOut();
		var ext = $('#uploadImage').val().split('.').pop().toLowerCase();
       	if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
           	$("#uploadImage").val("");
           	return false;
        }
        $('#no_img').val(1);
        $('#imgcancel').show();
        $('#imgcancel-update, #showimg').hide();
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

		oFReader.onload = function (oFREvent) {
	   		p.attr('src', oFREvent.target.result).fadeIn();
		};
	});
     
	$("#uploadPreview").imgAreaSelect({
	  	x1: 120, y1: 64, x2: 276, y2: 220,
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
		 	x1: 120, y1: 64, x2: 276, y2: 220,
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
		var aw= $('#chag_sort').val();
		var x= 120 * aw;
	  	var y= 64 * aw;
	  	var w= (276-120) * aw;
	  	var h= (220-64) * aw;
		$('#x').val(x);
		$('#y').val(y);
		$('#w').val(w);
		$('#h').val(h);
   	});
   	$('#imgcancel').click(function(){
   		$("#uploadPreview").imgAreaSelect({
   			remove: true
   		});
   		$(this).hide();
   		$('#no_img').val(0);
   		$('#x').val(0);
		$('#y').val(0);
		$('#w').val(0);
		$('#h').val(0);
   		$('#uploadImage').val("");
   		$('#uploadPreview').attr('src', '');
   		$('#showimg, #imgcancel-update').show();
   		if($('#showimg').length > 0){
   			$('#no_img').val(2);
   		}
   	});
   	$('#imgcancel-update').click(function(){
   		$(this).hide();
   		$('#no_img').val(0);
   		$('#uploadImage').val("");
   		$('#showimg').attr('src', '').hide();
   	});
	  
});
    
function setInfo(i, e) {
    	
   	var as = $('#chag_sort').val();
   	var x = e.x1 * as;
  	var y = e.y1 * as;
  	var w = e.width * as;
  	var h = e.height * as;
	$('#x').val(x);
	$('#y').val(y);
	$('#w').val(w);
	$('#h').val(h);
	if((e.x1 == e.x2) && (e.y1 == e.y2)){
		$( 'img#uploadPreview' ).imgAreaSelect({
			instance: true,
			aspectRatio: '1:1', 
			x1: 120, y1: 64, x2: 276, y2: 220,									
		});
	    var aw= $('#chag_sort').val();
		var x = 120 * aw;
	  	var y = 64 * aw;
	  	var w = (276-120) * aw;
	  	var h = (220-64) * aw;
		$('#x').val(x);
		$('#y').val(y);
		$('#w').val(w);
		$('#h').val(h);
   	}
}


function readURL(input) {
 	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$('#uploadPreview').attr('src', e.target.result).show();
		};
		reader.readAsDataURL(input.files[0]);
	}
}
