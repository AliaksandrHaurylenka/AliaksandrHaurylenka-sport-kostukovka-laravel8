@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.service.title')</h3>
    
    {!! Form::model($data, ['method' => 'PUT', 'route' => ['admin.services.update', $data->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('service', trans('quickadmin.service.fields.service').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('service', old('service'), ['class' => 'form-control', 'placeholder' => 'Услуга', 'required' => '']) !!}
                    <p class="help-block">Услуга</p>
                    @if($errors->has('service'))
                        <p class="help-block">
                            {{ $errors->first('service') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('quickadmin.service.fields.price').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price', old('price'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_the_evening', trans('quickadmin.service.fields.price-the-evening').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price_the_evening', old('price_the_evening'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_the_evening'))
                        <p class="help-block">
                            {{ $errors->first('price_the_evening') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_5_lessons', trans('quickadmin.service.fields.price-5-lessons').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price_5_lessons', old('price_5_lessons'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_5_lessons'))
                        <p class="help-block">
                            {{ $errors->first('price_5_lessons') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_10_lessons', trans('quickadmin.service.fields.price-10-lessons').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price_10_lessons', old('price_10_lessons'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_10_lessons'))
                        <p class="help-block">
                            {{ $errors->first('price_10_lessons') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price_other', trans('quickadmin.service.fields.price-other').'', ['class' => 'control-label']) !!}
                    {!! Form::text('price_other', old('price_other'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price_other'))
                        <p class="help-block">
                            {{ $errors->first('price_other') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

