@extends('layouts.site')

@section('title', 'Спорт-Костюковка')
@section('description', 'г. Гомель, микрорайон Костюковка, Государственное учреждение "Физкультурно-оздоровительный центр "Костюковка-Спорт"')

@section('content')
    
        @include('site.main-blocks.one-block')
        <hr class="my-5">
        @include('site.main-blocks.two-block')
        <hr class="my-5">
        @include('site.main-blocks.three-block')
        <hr class="my-5">
                    
        
        @include('site.blocks.block-rtb-1')
@endsection