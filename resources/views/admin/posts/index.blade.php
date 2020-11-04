@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.post.title')</h3>
    @can('post_create')
    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('post_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.posts.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.posts.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped
                {{ count($data) > 0 ? 'datatable' : '' }}
                @can('post_delete')
                    @if ( request('show_deleted') != 1 ) dt-select @endif
                @endcan">
                <thead>
                    <tr>
                        @can('post_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan
                        <th>@lang('quickadmin.post.fields.id')</th>
                        <th>@lang('quickadmin.post.fields.title')</th>
                        <th>@lang('quickadmin.post.fields.content')</th>
                        <th>@lang('quickadmin.post.fields.image')</th>
                        <th>@lang('quickadmin.post.fields.author')</th>
                        <th>@lang('quickadmin.post.fields.date')</th>
                        <th>@lang('quickadmin.post.fields.category-id')</th>
                        <th>@lang('quickadmin.post.fields.tags-id')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $post)
                            <tr data-entry-id="{{ $post->id }}">
                                @can('post_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan
                                <td field-key='id'>{{ $post->id }}</td>
                                <td field-key='title'>{{ $post->title }}</td>
                                <td field-key='content'>{!! Str::limit($post->content, $limit = 300, $end = '...') !!}</td>
                                <td field-key='image'>
                                    <img class="photo" src="{{ asset($post->getImagePostAdminPanel()) }}">
                                </td>
                                <td field-key='date'>{{ $post->author->name }}</td>
                                <td field-key='date'>{{ $post->date }}</td>
                                <td>{{ $post->getSectionTitle() }}</td>
                                <td>{{ $post->getTagsTitle() }}</td>

                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('post_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'POST',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.posts.restore', $post->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('post_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.posts.perma_del', $post->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                                @else
                                <td>
                                    @if($post::authUserRole() == 'administrator')
                                        @if($post->postStatus() == 'active')
                                            <a href="/admin/post/toggle/{{$post->id}}" class="fa fa-lock" title="Запретить"></a>
                                        @else
                                            <a href="/admin/post/toggle/{{$post->id}}" class="fa fa-thumbs-o-up" title="Опубликовать"></a>
                                        @endif
                                    @endif

                                    @can('post_edit')
                                        <a href="{{ route('admin.posts.edit',[$post->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan

                                    @can('post_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.posts.destroy', $post->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('post_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.posts.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection