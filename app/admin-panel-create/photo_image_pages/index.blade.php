@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.photo_image_page.title')</h3>
    @can('photo_image_page_create')
        <p><a href="{{ route('admin.photo_image_pages.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a></p>
    @endcan

    @can('photo_image_page_delete')
        <p>
            <ul class="list-inline">
                <li><a href="{{ route('admin.photo_image_pages.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
                <li><a href="{{ route('admin.photo_image_pages.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
            </ul>
        </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($photo_image_pages) > 0 ? 'datatable' : '' }} @can('photo_image_page_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('photo_image_page_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all"></th>@endif
                        @endcan

                        <th>@lang('quickadmin.photo_image_page.fields.photo')</th>
                        <th>@lang('quickadmin.photo_image_page.fields.section')</th>
                        @if( request('show_deleted') == 1 )
                            <th>&nbsp;</th>
                        @else
                            <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @if (count($photo_image_pages) > 0)
                        @foreach ($photo_image_pages as $photo)
                            <tr data-entry-id="{{ $photo->id }}">
                                @can('photo_image_page_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='photo'>
                                    @if($photo->photo)
                                        <a href="{{ asset(env('UPLOAD_PATH'). App\PhotoImagePage::PATH . $photo->photo) }}" target="_blank">
                                            <img src="{{ asset(env('UPLOAD_PATH'). App\PhotoImagePage::PATH . $photo->photo) }}" style="width: 50%">
                                        </a>
                                    @endif</td>
                                <td field-key='section'>{{ $photo->section }}</td>
                                @if( request('show_deleted') == 1 )
                                    <td>
                                        @can('photo_image_page_delete')
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'POST',
                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                'route' => ['admin.photo_image_pages.restore', $photo->id])) !!}
                                            {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                        @can('photo_image_page_delete')
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                'route' => ['admin.photo_image_pages.perma_del', $photo->id])) !!}
                                            {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                @else
                                <td>
                                    @can('photo_image_page_edit')
                                        <a href="{{ route('admin.photo_image_pages.edit',[$photo->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('photo_image_page_delete')
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.photo_image_pages.destroy', $photo->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('photo_image_page_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.photo_image_pages.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
