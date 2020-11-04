@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comment.title')</h3>
    
    {!! Form::model($data, ['method' => 'PUT', 'route' => ['admin.comments.update', $data->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('text', trans('quickadmin.comment.fields.text').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('text', old('text'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('text'))
                        <p class="help-block">
                            {{ $errors->first('text') }}
                        </p>
                    @endif
                </div>
            </div>
            @if ($data->name)
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('name', trans('quickadmin.comment.fields.user-id').'', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('post_id', trans('quickadmin.comment.fields.post-id').'', ['class' => 'control-label']) !!}
                    {!! Form::number('post_id', old('post_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('status', trans('quickadmin.comment.fields.status').'', ['class' => 'control-label']) !!}
                    {!! Form::number('status', old('status'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

