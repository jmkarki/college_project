<div class="sidebar-menus">
	<ul>
		<li><a href="{{URL::to('home')}}"><span class="glyphicon glyphicon-home"></span>  Home</a></li>
		<li><a href="{{URL::to('home/supplier')}}"><span class="glyphicon glyphicon-user"></span> Client</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
		<li><a href="">Link 2</a></li>
	</ul>
</div>
@section('scripts')
<script type="text/javascript">
	 $(function(){
      var url = window.location;
      $(".sidebar-menus ul li a").each(function() {
       if($(this).attr('href') == url){
          $(this).parent().addClass('current');
       }
      });
      });
</script>
@stop