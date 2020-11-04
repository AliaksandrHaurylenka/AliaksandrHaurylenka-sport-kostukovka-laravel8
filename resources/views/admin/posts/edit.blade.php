@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.post.title')</h3>
    
    {!! Form::model($post, ['method' => 'PUT', 'route' => ['admin.posts.update', $post->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.post.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Название спортивного события', 'required' => '']) !!}
                    <p class="help-block">Название спортивного события</p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>

            <div>
                <p>
                    <strong style="color: red;">Прочитать!!!</strong>
                    Папка для изображений:
                    <span style="color: red;">{{$post->folder}}</span>
                </p>
                <p class="help-block">
                    Если добавляем или удаляем изображение, то в тектовом редакторе жмем на иконку
                    <span class="cke_button_icon cke_button__image_icon" style="float: none; margin-bottom: -3px;"></span>,
                    далее жмем кнопку "Выбор на сервере", находим папку
                    <span style="color: red;">{{$post->folder}}</span>
                    и добавляем, либо удаляем фотографии.
                </p>
                <input type="hidden" name="folder" value="{{$post->folder}}">
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('content', trans('quickadmin.post.fields.content').'*', ['class' => 'control-label']) !!}
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
                    {{-- @if ($post->image) --}}
                        <img class="photo" src="{{ asset($post->getImagePostAdminPanel()) }}">
                    {{-- @endif --}}
                    {!! Form::label('image', trans('quickadmin.post.fields.image').'', ['class' => 'control-label']) !!}
                    {!! Form::file('image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_max_size', 2) !!}
                    {!! Form::hidden('image_max_width', 4096) !!}
                    {!! Form::hidden('image_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', trans('quickadmin.post.fields.date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('section_id', trans('quickadmin.post.fields.category-id').'*', ['class' => 'control-label']) !!}
                    {{Form::select('section_id',
                            ['0' => 'Без категории', $sections],
                            $post->getSectionID(),
                            [
                                'class' => 'form-control select2',
                                'required' => 'required'
                            ])
                    }}
                    <p class="help-block"></p>
                    @if($errors->has('section_id'))
                        <p class="help-block">
                            {{ $errors->first('section_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label>Теги*</label>
                {{Form::select('tags[]',
                    $tags,
                    $selectedTags,
                    [
                        'class' => 'form-control select2',
                        'multiple' => 'multiple',
                        'data-placeholder' => 'Выберите теги',
                        'required' => 'required'
                    ])
                }}
            </div>
            
            @if($post::authUserRole() == 'administrator')
                <!-- checkbox -->
                <div class="form-group">
                    <label>
                        {{Form::checkbox('status', '1', $post->status,
                            ['class' => 'minimal', 'id' => 'Draft']
                        )}}
                    </label>
                    <label for="Draft">
                        Опубликовать
                    </label>
                </div>
                
                <div class="form-group">
                    <label>
                        {{Form::checkbox('is_featured', '1', $post->is_featured,
                            ['class' => 'minimal', 'id' => 'Recommend']
                        )}}
                    </label>
                    <label for="Recommend">
                        Рекомендовать
                    </label>
                </div>
            @endif
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@include('admin.block.editor')
@include('admin.block.date')