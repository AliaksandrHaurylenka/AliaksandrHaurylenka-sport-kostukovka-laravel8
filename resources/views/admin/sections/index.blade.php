@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.section.title')</h3>
    @can('section_create')
    <p>
        <a href="{{ route('admin.sections.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

    </p>
    @endcan

    @can('section_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.sections.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.sections.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($data) > 0 ? 'datatable' : '' }} @can('section_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('section_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.section.fields.title')</th>
                        <th>@lang('quickadmin.section.fields.photo_section_menu')</th>
                        <th>@lang('quickadmin.section.fields.photo')</th>
                        <th>@lang('quickadmin.section.fields.description_main_page')</th>
                        <th>@lang('quickadmin.section.fields.photo_sport')</th>
                        <th>@lang('quickadmin.section.fields.description')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>

                <tbody>

                  @forelse ($data as $section)
                      <tr data-entry-id="{{ $section->id }}">
                          @can('section_delete')
                              @if ( request('show_deleted') != 1 )<td></td>@endif
                          @endcan

                          <td field-key='title'>{{ $section->title }}</td>
                          <td field-key='photo_section_menu'>
                              <img class="photo" src="{{ asset($section->getImageAdminPanel()['photo_section_menu']) }}"/>
                          </td>
                          <td field-key='photo'>
                              @if($section->photo)
                                  <img class="photo" src="{{ asset($section->getImageAdminPanel()['photo']) }}"/>
                              @endif
                          </td>
                          <td field-key='description_main_page'>{!! $section->description_main_page !!}</td>
                          <td field-key='photo_sport'>
                              @if($section->photo_sport)
                                  <img class="photo" src="{{ ($section->getImageAdminPanel()['photo_sport']) }}">
                              @endif
                          </td>
                          <td field-key='description'>{!! $section->description !!}</td>
                          @if( request('show_deleted') == 1 )
                          <td>
                              @can('section_delete')
                                                                  {!! Form::open(array(
                                  'style' => 'display: inline-block;',
                                  'method' => 'POST',
                                  'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                  'route' => ['admin.sections.restore', $section->id])) !!}
                              {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                              {!! Form::close() !!}
                          @endcan
                              @can('section_delete')
                                                                  {!! Form::open(array(
                                  'style' => 'display: inline-block;',
                                  'method' => 'DELETE',
                                  'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                  'route' => ['admin.sections.perma_del', $section->id])) !!}
                              {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                              {!! Form::close() !!}
                          @endcan
                          </td>
                          @else
                          <td>                                    @can('section_edit')
                              <a href="{{ route('admin.sections.edit',[$section->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                              @endcan
                              @can('section_delete')
                                {!! Form::open(array(
                                  'style' => 'display: inline-block;',
                                  'method' => 'DELETE',
                                  'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                  'route' => ['admin.sections.destroy', $section->id])) !!}
                              {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                              {!! Form::close() !!}
                              @endcan
                          </td>
                          @endif
                      </tr>
                  @empty
                    <tr>
                        <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                  @endforelse

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('section_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.sections.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
