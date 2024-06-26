@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Info Management</h3>

                        <a href="{{ route('info.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Create
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <!-- Data table -->
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                               user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Text</th>
                                <th>File</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($infos as $info)
                                <tr>
                                    <td>{{ \App\Models\Info::$t[$info->type] }}</td>
                                    <td>{{ $info->text }}</td>
                                    <td>
                                        @if($info->type == 2)
                                            <img src="{{ asset("public/files/".$info->file) }}" height="100">
                                        @elseif($info->type == 3)
                                            <embed src="{{ asset("public/files/".$info->file) }}" type="application/pdf" width="100%" height="200px" />
                                        @elseif($info->type == 4)
                                            <video src="{{ asset("public/files/".$info->file) }}" height="100" width="100" autoplay></video>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="" href="{{ route('info.show',$info->id) }}"
                                               style="margin-right: 10px">
                                                <span class="fa fa-user"></span>
                                            </a>

                                            <form action="{{ route("info.destroy", $info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="button"
                                                        style='display:inline; border:none; background: none'
                                                        onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span
                                                        class="fa fa-trash"></span></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfooter>
                                <tr>
                                    <td colspan="12">
                                        {{ $infos->withQueryString()->links()   }}
                                    </td>
                                </tr>
                            </tfooter>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
