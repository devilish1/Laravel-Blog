@extends('welcome')

@section('blogcontent')
	@include('layouts.errors')
    @foreach ($posts as $post)
<div class="blog-post">
    <h2 class="blog-post-title">
        {{-- {{dd($post->user->name)}} --}}
        <a href="/posts/{{$post->id}}">
            {{$post->title}}
        </a>
    </h2>
    <p class="blog-post-meta">
        Created {{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}
        <br>
            @if($post->created_at->toFormattedDateString() !== $post->updated_at->toFormattedDateString())
        		{{'Edited ' . $post->updated_at->toFormattedDateString()}}
        	@endif
        </br>
    </p>
    @if(strlen($post->body)>400)
    	{!!printShorterPost($post->body)!!}
    <p>
        ...
    </p>
    @else
		{!!html_entity_decode($post->body)!!}
	@endif
</div>
@endforeach
@endsection
<?php
function printShorterPost($body)
{
	$doc = new DOMDocument();
	$beforeFixing = mb_substr($body,0,700);
	$pos = strrpos($beforeFixing, ">");
	if ($pos === false) 
	{ // note: three equal signs
		return html_entity_decode($body);

	}
	else
	{
		$fixedString = mb_substr($beforeFixing,0,++$pos);
		$doc->loadHTML($fixedString);
		$yourText = $doc->saveHTML();
		return html_entity_decode($yourText);
	}
}
?>
