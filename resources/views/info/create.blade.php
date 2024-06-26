@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Info Create</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'info.store','method'=>'POST', 'enctype'=>"multipart/form-data"]) !!}
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label
                                        for="type"><strong>Type:</strong></label>{!! Form::label('type',"*",['style'=>"color:red"]) !!}
                                    {!! Form::select('type', \App\Models\Info::$t,null, ['autocomplete'=>'OFF','id'=>'type','required'=>true,'class' => "form-control ".($errors->has('type') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('type'))
                                        <span class="error invalid-feedback">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="text"><strong>Text:</strong></label>
                                    {!! Form::textarea('text', null, ['rows' => 5,'autocomplete'=>'OFF','id'=>'text','placeholder' => 'Text','class' => "form-control ".($errors->has('text') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('text'))
                                        <span class="error invalid-feedback">{{ $errors->first('text') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="file"><strong>File:</strong></label>
                                    {!! Form::file('file', null, ['rows' => 5,'autocomplete'=>'OFF','id'=>'text','placeholder' => 'Text', 'class' => "form-control ".($errors->has('file') ? 'is-invalid' : '')]) !!}
                                    @if($errors->has('file'))
                                        <span class="error invalid-feedback">{{ $errors->first('file') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Сохранять</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
