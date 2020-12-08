@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ads.title')</h3>
    @can('ad_create')
        <p>
            <a href="{{ route('admin.ads.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    @endcan

    @can('ad_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.ads.index') }}"
                   style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a>
            </li>
            |
            <li><a href="{{ route('admin.ads.index') }}?show_deleted=1"
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
            <table class="table table-bordered table-striped {{ count($data) > 0 ? 'datatable' : '' }} @can('ad_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                  <tr>
                    @can('ad_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                        @endif
                    @endcan

                    <th>@lang('quickadmin.ads.fields.title')</th>
                    <th>@lang('quickadmin.ads.fields.photo')</th>
                    <th>@lang('quickadmin.ads.fields.description')</th>
                    <th>@lang('quickadmin.ads.fields.date')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                  </tr>
                </thead>

                <tbody>
                  @forelse ($data as $ad)
                      <tr data-entry-id="{{ $ad->id }}">
                          @can('ad_delete')
                              @if ( request('show_deleted') != 1 )
                                  <td></td>@endif
                          @endcan

                          <td field-key='title'>{{ $ad->title }}</td>
                          <td field-key='photo'>
                              @if($ad->photo)
                                  <img class="photo" src="{{ asset($ad->getImagePostAdminPanel()) }}"/>
                              @endif
                          </td>
                          <td field-key='content'>{!! $ad->content !!}</td>
                          <td field-key='date'>{{ $ad->date }}</td>
                          @if( request('show_deleted') == 1 )
                              <td>
                                  @can('ad_delete')
                                      {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'POST',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.ads.restore', $ad->id]))
                                      !!}
                                      {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                      {!! Form::close() !!}
                                  @endcan
                                  @can('ad_delete')
                                      {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.ads.perma_del', $ad->id]))
                                      !!}
                                      {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                      {!! Form::close() !!}
                                  @endcan
                              </td>
                          @else
                              <td>
                                  @if($ad::authUserRole() == 'administrator')
                                      @if($ad->postStatus() == 'active')
                                          <a href="/admin/ad/toggle/{{$ad->id}}" class="fa fa-lock" title="Запретить"></a>
                                      @else
                                          <a href="/admin/ad/toggle/{{$ad->id}}" class="fa fa-thumbs-o-up" title="Опубликовать"></a>
                                      @endif
                                  @endif

                                  @can('ad_edit')
                                      <a href="{{ route('admin.ads.edit',[$ad->id]) }}"
                                         class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                  @endcan
                                  @can('ad_delete')
                                      {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.ads.destroy', $ad->id]))
                                      !!}
                                      {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                      {!! Form::close() !!}
                                  @endcan
                              </td>
                          @endif
                      </tr>
                  @empty
                      <tr>
                          <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                      </tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('ad_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.ads.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
