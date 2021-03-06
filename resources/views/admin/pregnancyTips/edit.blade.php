@extends('admin.layouts.app')

@section('content')
    <div class="row" style="margin-left: 15px; margin-bottom: 1em;">
        <a href="{{url()->previous()}}"><button class="btn btn-sm btn-default">Go back <i class="fa fa-link"></i></button></a>
    </div>
    <section class="col-lg-12 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-edit"></i>

                <h3 class="box-title">Pregnancy Tip</h3>

                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! Form::model($pregnancyTip, ['action' => ['Admin\PregnancyTipsController@update', $pregnancyTip->id], 'method' => "POST", 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {{Form::label('tip', 'Tip')}}
                    {{Form::textarea('tip', $pregnancyTip->tip, ['id' => 'article-ckeditor', 'class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('image', 'Image')}}
                    {{Form::file('image', ['class' => 'form-control'])}}
                </div>

                <div class="box-footer">
                    {{ method_field('PUT') }}
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-sm']) }}
                    {!! Form::close() !!}

                    {{ Form::open(['action' => ['Admin\PregnancyTipsController@destroy', $pregnancyTip->id], 'method' => "POST", 'class' => 'pull-right']) }}
                    {{ method_field('DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>

        </div>

    </section>

@endsection