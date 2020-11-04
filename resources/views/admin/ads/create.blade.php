@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ads.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.ads.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.ads.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.ads.fields.photo').'', ['class' => 'control-label']) !!}
                    {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('photo_max_size', 2) !!}
                    {!! Form::hidden('photo_max_width', 800) !!}
                    {!! Form::hidden('photo_max_height', 450) !!}
                    <p class="help-block"></p>
                    @if($errors->has('photo'))
                        <p class="help-block">
                            {{ $errors->first('photo') }}
                        </p>
                    @endif
                </div>
            </div>

            <div>
                <p>
                    <strong style="color: red;">Прочитать!!!</strong>
                    Папка для изображений:
                    <span style="color: red;">
                        {{ App\Models\Ad::createFolder() }}
                    </span>
                </p>
                <p class="help-block">
                    Если добавляем изображение, то в тектовом редакторе жмем на иконку
                    <span class="cke_button_icon cke_button__image_icon"
                          style="float: none; margin-bottom: -3px;"></span>,
                    далее жмем кнопку "Выбор на сервере", находим папку
                    <span style="color: red;">
                        {{ App\Models\Ad::createFolder() }}
                    </span>
                    и загружаем в нее фотографии.
                </p>
                <input type="hidden" name="folder" value="{{ App\Models\Ad::createFolder() }}">
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('content', trans('quickadmin.ads.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', trans('quickadmin.ads.fields.date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>

        @if(App\Models\Ad::authUserRole() == 'administrator')
            <!-- checkbox -->
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="status" class="minimal" id="Draft">
                    </label>
                    <label for="Draft">
                        Опубликовать
                    </label>
                </div>
            @endif

        </div>
    </div>
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@include('admin.block.editor')
@include('admin.block.date')