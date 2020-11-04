@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.avatar')</th>
                            <td field-key='avatar'>
                                @if($data->avatar)
                                    <img class="photo" src="{{ asset(App\Models\User::PATH . $data->avatar) }}"/>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.description')</th>
                            <td field-key='description'>{!! $data->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td field-key='role'>{{ $data->role->title ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


