@extends('layouts.site')

@section('title', $section->title.'.Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('breadcrumbs')
  {!! Breadcrumbs::render('section', $section); !!}
@endsection

@section('content')
	
	@include('site.sections.sectionsTemplate', ['sport' => $section->title])

@endsection