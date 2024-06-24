@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Group Management</h2>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Username</th>
                <th>Type</th>
                <th>Status</th>
                <th></th>
            </tr>
            @foreach ($groups as $key => $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->title }}</td>
                    <td>{{ $group->username }}</td>
                    <td>{{ $group->type }}</td>
                    <td>{{ \App\Models\Group::$statuses[$group->status] }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="" style="margin-right: 10px" href="{{ route('group.show',$group->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" style="margin-right: 2px" href="{{ route('group.edit',$group->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $groups->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
