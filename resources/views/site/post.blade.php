@extends('layouts.site')

@section('title', $post->title)
@section('description', strip_tags(getLengthString($post->content, 140)))

@section('breadcrumbs')
  {!! Breadcrumbs::render('post.show', $post->section, $post); !!}
@endsection

@section('content')

	<!--Featured Image-->
	<div class="card mt-5 mb-4 wow fadeIn">
	  <img src="{{ $post->getImage() }}" class="img-fluid" alt="">
	</div>
	<!--/.Featured Image-->

	@include('site.blocks.post-content')
	@include('site.blocks.user-profile')
	@include('site.blocks.post-next-prev')
	@include('site.blocks.post-carousel')
	@include('site.blocks.block-rtb-1')
	@include('site.blocks.post-comments')
	@include('site.blocks.comments-form')


@endsection