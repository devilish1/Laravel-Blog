@extends('welcome')

@section('blogcontent')

	<div class="blog-post">
			<h2 class="blog-post-title">Publish a post:</h2>
	        <p class="blog-post-meta"> <?php echo "Today is " . date("Y/m/d"); ?></p>
			<form method="POST" action="/posts">
			{{csrf_field()}}
			    <div class="form-group">
			      	<label for="postTitle">Post title</label>
			      	<input type="text" id="postTitle" name="postTitle" class="form-control" required>
			    </div>

			    <div class="form-group">
			    	<label for="postBody">Post body</label>
			      	<textarea class="form-control" rows="3" id="postBody" name="postBody" required></textarea>
			    </div>

			    <div class="form-group">
			    	<label for="tags">Tags</label><br>
			      	<input id="typeahead-text" type="text" class="typeahead form-control" placeholder="Please Enter Your Tag" id="tags" name="tags">
			    </div>
			    <input id="added-tags" type="hidden" name="tags" value="">
			    <div id="new-tag-container">
			    </div>


			    <button type="submit" class="btn btn-primary" >Publish</button>
			</form>
			
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
		    // Defining the local dataset
		    var tags = <?php echo json_encode($tags); ?>;
		    
		    // Constructing the suggestion engine
		    var tags = new Bloodhound({
		        datumTokenizer: Bloodhound.tokenizers.whitespace,
		        queryTokenizer: Bloodhound.tokenizers.whitespace,
		        local: tags
		    });
		    
		    // Initializing the typeahead
		    $('#typeahead-text').typeahead({
		        hint: true,
		        highlight: true, /* Enable substring highlighting */
		        minLength: 1 /* Specify minimum characters required for showing result */
		    },
		    {
		        name: 'tags',
		        source: tags
		    });
		    $('.typeahead').on('typeahead:selected', function(evt, item) {
		    	var addedTags = $('#added-tags');
		    	if(addedTags.val()){
		    		addedTags.val(addedTags.val() + ';' + item);
		    	}
		    	else{
		    		addedTags.val(item);
		    	}

		    	$('.typeahead').typeahead('val','');
		    	//Create the label element
				//var $label = $("<label>").text(item);
				var $label = $('<label>').attr({class: 'added-tags'});
				console.log($label.text());
				$label.append(item + '&nbsp;&nbsp;&nbsp;&nbsp;');

				//Insert the label into the DOM - replace body with the required position
				$('#new-tag-container').append($label);


			});
		});  
	</script>
	 
@endsection

