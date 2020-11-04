@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.poststag.title')</h3>
    
    {!! Form::model($poststag, ['method' => 'PUT', 'route' => ['admin.poststags.update', $poststag->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('post_id', trans('quickadmin.poststag.fields.post-id').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('post_id', old('post_id'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('post_id'))
                        <p class="help-block">
                            {{ $errors->first('post_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tag_id', trans('quickadmin.poststag.fields.tag-id').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('tag_id', old('tag_id'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tag_id'))
                        <p class="help-block">
                            {{ $errors->first('tag_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

