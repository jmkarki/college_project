@extends('default.main')
@section('content')
<!-- welcome to home page || and your session id is [[Session::get('company_id')]] -->

<!-- <h3>Dynamic form example.</h3>
<form class="commentForm">
    <div id="inputs"></div>
    <input type="submit" class="btn-green btn-normal" />
    <span id="addInput" class="btn-green btn-normal">Add Button</span>

</form>

<form class="postForm">
    <div id="inputs">
    	<input type="text" class="form-control required" style="width:50%;margin:5px;" name="postname">
    </div>
    <input type="submit" class="btn-green btn-normal" /> 
</form> -->


 @stop
 @section('script')
 <script type="text/javascript">
 	$(document).ready(function () {
    
     var numberIncr = 1;
    $("#addInput").on('click', function () {
        $('#inputs').append($('<input class="comment required form-control" style="width:50%; margin:10px;" name="name[' + numberIncr + ']" />'));
        numberIncr++;
    });

    $('form.commentForm').validate();
    $('.postForm').validate();
});
 </script>
 @stop