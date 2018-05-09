@extends('admin.layouts.app')

@section('content')
    <div class="row" style="margin-left: 15px; margin-bottom: 1em;">
        <a href="/admin/pregnancytips"><button class="btn btn-sm btn-default">Go back <i class="fa fa-link"></i></button></a>
    </div>
    <section class="col-lg-7 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-comments-o"></i>

                <h3 class="box-title">Pregnancy Tip</h3>

                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! Form::model($pregnancyTip, ['action' => ['PregnancyTipsController@update', $pregnancyTip->id], 'method' => "POST"]) !!}

                <div class="form-group">
                    <label>Tip</label>
                    {{Form::textarea('tip', $pregnancyTip->tip, ['id' => 'article-ckeditor', 'class' => 'form-control'])}}
                </div>

                <div class="box-footer">
                    {{Form::hidden('_method', 'PUT')}}
                    {{ Form::submit('Update', ['class' => 'btn btn-success btn-sm']) }}
                    {!! Form::close() !!}

                    {{ Form::open(['action' => ['PregnancyTipsController@destroy', $pregnancyTip->id], 'method' => "POST", 'class' => 'pull-right']) }}
                    {{ Form::hidden('_method', "DELETE") }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                    {{ Form::close() }}
                </div>
            </div>

        </div>

    </section>

@endsection