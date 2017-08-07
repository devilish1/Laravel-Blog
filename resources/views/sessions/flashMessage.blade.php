@if($flash = session('message'))
      <div id="flash-message" class="alert alert-success" role="alert">
        
        {{$flash}}

      </div>
@endif
<script>
	$("#flash-message").fadeOut(4000, function() {
        $('#flash-message').remove();
    });		  
</script>