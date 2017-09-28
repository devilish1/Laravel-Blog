@extends('welcome')

@section('blogcontent')
	<div class="blog-post">
			<h2 class="blog-post-title">{{$post->title}}</h2>
	        <p class="blog-post-meta">Created {{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}<br>
	        <?php 
	        	if ($post->created_at != $post->updated_at->toFormattedDateString()){
	        		echo 'Edited ' . $post->updated_at->toFormattedDateString();
	        	}
	        ?>
	        </p>
			{!!html_entity_decode($post->body)!!}

			@include('layouts.comments', $post)
		</div>
@endsection

