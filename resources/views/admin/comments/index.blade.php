@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comment.title')</h3>

    @can('comment_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.comments.index') }}"
                   style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a>
            </li>
            |
            <li><a href="{{ route('admin.comments.index') }}?show_deleted=1"
                   style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a>
            </li>
        </ul>
        </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table
                    class="table table-bordered table-striped {{ count($data) > 0 ? 'datatable' : '' }} @can('comment_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('comment_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>@endif
                    @endcan

                    <th>@lang('quickadmin.comment.fields.text')</th>
                    <th>@lang('quickadmin.comment.fields.post-id')</th>
                    <!--<th>Вид спорта</th>-->
                    {{--<th>@lang('quickadmin.comment.fields.status')</th>--}}
                    <th>@lang('quickadmin.comment.fields.name')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $comment)
                        <tr data-entry-id="{{ $comment->id }}">
                            @can('comment_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>@endif
                            @endcan

                            <td field-key='text'>{!! $comment->text !!}</td>
                            <td field-key='post_id'>
                              <a href="{{ route('post.show', $comment->post->slug) }}" class="post_comments_link">
                                {{ $comment->post->title }}
                              </a>

                            </td>
                            {{--<td field-key='post_id'>{{ $comment->post->section->title }}</td>--}}
                            @if($comment->user_id != null)
                                <td field-key='user_id'>{{ $comment->author->name }}</td>
                            @else
                                <td field-key='name'>{{ $comment->name }}</td>
                            @endif

                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('comment_delete')
                                        {!! Form::open(array(
                    'style' => 'display: inline-block;',
                    'method' => 'POST',
                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                    'route' => ['admin.comments.restore', $comment->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('comment_delete')
                                        {!! Form::open(array(
                    'style' => 'display: inline-block;',
                    'method' => 'DELETE',
                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                    'route' => ['admin.comments.perma_del', $comment->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>

                                    @if(\Auth::user()->role_id == 1)
                                        @if($comment->status == 1)
                                            {{--<a href="/admin/ad/toggle/{{$comment->id}}" class="fa fa-lock" title="Запретить"></a>--}}
                                            <a href="/admin/comment/toggle/{{$comment->id}}"
                                               class="btn btn-xs btn-success">Запретить</a>
                                        @else
                                            {{--<a href="/admin/ad/toggle/{{$comment->id}}" class="fa fa-thumbs-o-up" title="Опубликовать"></a>--}}
                                            <a href="/admin/comment/toggle/{{$comment->id}}"
                                               class="btn btn-xs btn-warning">Опубликовать</a>
                                        @endif
                                    @endif

                                    @can('comment_edit')
                                        <a href="{{ route('admin.comments.edit',[$comment->id]) }}"
                                           class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>                                 @endcan
                                    @can('comment_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.comments.destroy', $comment->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('comment_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.comments.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection