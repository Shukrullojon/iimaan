@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Group</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                    <tr>
                        <th>Id</th>
                        <td>{{ $group->chat_id }}</td>
                    </tr>

                    <tr>
                        <th>Title</th>
                        <td>{{ $group->title }}</td>
                    </tr>

                    <tr>
                        <th>Username</th>
                        <td>{{ $group->username }}</td>
                    </tr>

                    <tr>
                        <th>Type</th>
                        <td>{{ $group->type }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ \App\Models\Group::$statuses[$group->status] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
