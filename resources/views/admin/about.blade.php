@extends('admin.layouts.app')

@section('content')
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Settings</h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active about"><a href="#"><i class="fa fa-inbox"></i> About</a></li>
                    <li class="contact"><a href="#"><i class="fa fa-file-text-o"></i> Contact</a></li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9 about">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About us Setting</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(!empty($pages->about))
                    <div class="about-content">
                        <p>{!! !empty($pages->about) ? $pages->about : "no about yet" !!}</p>
                        <button class="btn btn-sm btn-info pull-right edit-about-form">Edit</button>
                    </div>
                    <div class="edit-about-form hidden">
                        {!! Form::model($pages, ['action' => ['Admin\PagesController@updateSetting', $pages->id], 'method' => "POST"]) !!}
                        <div class="form-group">
                            {{ Form::label('about', "About") }}
                            {{ Form::textarea('about', $pages->about, ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
                        </div>
                        {{ Form::hidden('aboutEdit', '1') }}
                        <div class="form-group">
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Update', ['class' => "btn btn-sm btn-success pull-right"]) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                @else
                    {!! Form::open(['action' => 'Admin\PagesController@storeSetting', 'method' => "POST", 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{ Form::label('about', "About") }}
                            {{ Form::textarea('about', '', ['id' => 'article-ckeditor', 'class' => 'form-control']) }}
                        </div>
                        {{ Form::hidden('aboutAdd', '1') }}

                        <div class="form-group">
                            {{ Form::submit('Send', ['class' => "btn btn-sm btn-success pull-right"]) }}
                        </div>
                    {!! Form::close() !!}
                @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
    <div class="col-md-9 contact hidden">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(!empty($pages->id))
                    <div class="contact-content">
                        <div class="social-auth-links table-responsive">
                            <table class="table table-condensed table-bordered">
                                <tr>
                                    <th class="text-blue"><em>Facebook <i class="fa fa-facebook-official"></i> </em></th>
                                    <td><span>{!! !empty($pages->facebook) ? $pages->facebook : "no link yet" !!}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-info"><em>Twitter <i class="fa fa-twitter"></i> </em></th>
                                    <td><span>{!! !empty($pages->twitter) ? $pages->twitter : "no link yet" !!}</span></td>
                                </tr>
                                <tr>
                                    <th><em>Instagram <i class="fa fa-instagram"></i> </em></th>
                                    <td><span>{!! !empty($pages->instagram) ? $pages->instagram : "no link yet" !!}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-red"><em>Google+ <i class="fa fa-google-plus"></i> </em></th>
                                    <td><span>{!! !empty($pages->googleplus) ? $pages->googleplus : "no link yet" !!}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-green"><em>Email <i class="fa fa-envelope"></i> </em></th>
                                    <td><span>{!! !empty($pages->email) ? $pages->email : "no mail yet" !!}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-aqua"><em>Phone <i class="fa fa-phone-square"></i> </em></th>
                                    <td><span>{!! !empty($pages->phone) ? $pages->phone : "no phone yet" !!}</span></td>
                                </tr>
                                <tr>
                                    <th><em>Address <i class="fa fa-institution"></i> </em></th>
                                    <td><span>{!! !empty($pages->address) ? $pages->address : "no address yet" !!}</span></td>
                                </tr>
                            </table>
                        </div>
                        <button class="btn btn-sm btn-info edit-contact-form pull-right">Edit</button>
                    </div>
                    <div class="edit-contact-form hidden">
                        {!! Form::model($pages, ['action' => ['Admin\PagesController@updateSetting', $pages->id], 'method' => "POST"]) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('facebook', "Facebook link") }}
                                        {{ Form::text('facebook', $pages->facebook, ['class' => 'form-control']) }}
                                    </div>
                                    {{ Form::hidden('contactEdit', '1') }}
                                    <div class="form-group">
                                        {{ Form::label('twitter', "Twitter link") }}
                                        {{ Form::text('twitter', $pages->twitter, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('instagram', "Instagram link") }}
                                        {{ Form::text('instagram', $pages->instagram, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('googleplus', "Google+ link") }}
                                        {{ Form::text('googleplus', $pages->googleplus, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('phone', "Phone") }}
                                        {{ Form::text('phone', $pages->phone, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('email', "Contact Email") }}
                                        {{ Form::text('email', $pages->email, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('address', "Address") }}
                                        {{ Form::text('address', $pages->address, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Update', ['class' => "btn btn-sm btn-success pull-right"]) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                @else
                    {!! Form::open(['action' => 'Admin\PagesController@storeSetting', 'method' => "POST", 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('facebook', "Facebook link") }}
                                    {{ Form::text('facebook', '', ['class' => 'form-control']) }}
                                </div>
                                {{ Form::hidden('contactAdd', '1') }}

                                <div class="form-group">
                                    {{ Form::label('twitter', "Twitter link") }}
                                    {{ Form::text('twitter', '', ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('instagram', "Instagram link") }}
                                    {{ Form::text('instagram', '', ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('googleplus', "Google+ link") }}
                                    {{ Form::text('googleplus', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('phone', "Phone") }}
                                    {{ Form::text('phone', '', ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', "Contact Email") }}
                                    {{ Form::text('email', '', ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('address', "Address") }}
                                    {{ Form::text('address', '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Add', ['class' => "btn btn-sm btn-success pull-right"]) }}
                        </div>
                    {!! Form::close() !!}
                @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', 'ul.nav-pills li', function(e) {
               $class = $(this).attr('class');
               console.log($class);
               $(this).siblings('li').removeClass('active');
               $(this).addClass('active');
               $('section.content div.col-md-9').not('.'+$class).slideUp('slow').addClass('hidden');
               $("div."+$class).removeClass('hidden').slideDown('slow');
            }).on('click', 'button.edit-about-form', function() {
                $('div.about-content').addClass('hidden');
                $('div.edit-about-form').removeClass('hidden');
            }).on('click', 'button.edit-contact-form', function() {
                $('div.contact-content').addClass('hidden');
                $('div.edit-contact-form').removeClass('hidden');
            })
        });
    </script>
@endsection