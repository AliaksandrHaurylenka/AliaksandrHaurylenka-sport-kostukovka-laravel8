@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.photo_image_page.title')</h3>
    {!! Form::model($photoImagePage, ['method' => 'PUT', 'route' => ['admin.photo_image_pages.update', $photoImagePage->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <img src="{{ asset(env('UPLOAD_PATH'). App\PhotoImagePage::PATH . $photoImagePage->photo) }}" style="width: 50%">
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', trans('quickadmin.photo_image_page.fields.photo').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;', 'required' => '']) !!}
                    {!! Form::hidden('photo_max_size', 2) !!}
                    <p class="help-block"></p>
                    @if($errors->has('photo'))
                        <p class="help-block">
                            {{ $errors->first('flag') }}
                        </p>
                    @endif
                </div>
            </div>


            <h4>К какому блоку принадлежит изображение.</h4>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-check">
                        {!! Form::radio('section', 'Главное изображение', ['class' => 'form-check-input', 'id' => 'exampleRadios1']) !!}
                        <label class="form-check-label" for="exampleRadios1">
                            Главное изображение
                        </label>
                    </div>
                    <div class="form-check">
                    {!! Form::radio('section', 'Блок 1', ['class' => 'form-check-input', 'id' => 'exampleRadios2']) !!}
                        <label class="form-check-label" for="exampleRadios2">
                            Блок 1
                        </label>
                    </div>
                    <div class="form-check">
                    {!! Form::radio('section', 'Блок 2', ['class' => 'form-check-input', 'id' => 'exampleRadios3']) !!}
                        <label class="form-check-label" for="exampleRadios3">
                            Блок 2
                        </label>
                    </div>
                    <p class="help-block"></p>
                    @if($errors->has('section'))
                        <p class="help-block">
                            {{ $errors->first('section') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

