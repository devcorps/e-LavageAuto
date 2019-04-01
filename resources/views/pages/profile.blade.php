@extends('layouts.dashbord')

@section('title', '| Profile')

@section('stylesheet')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{(url('home'))}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="/uploads/logos/{{Auth::user()->logo}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">Manager</p>
                        <p class="text-muted text-center">
                            @if(Auth::user()->status != 0)
                                <span class='badge badge-success'>Abonné </span>
                            @else
                                <span class='badge badge-danger'>Non abonné </span>
                            @endif
                        </p>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <b>Fideles</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Clients</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Vehicules</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{Auth::user()->localisation}}</p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>

                        <p class="text-muted">{{Auth::user()->email}}</p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Telephone</strong>

                        <p class="text-muted">{{Auth::user()->telephone}}</p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                        <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="/uploads/logos/{{Auth::user()->logo}}" alt="user image">
                                    <span class="username">
                          <a href="#">Station {{Auth::user()->name}}</a>
                        </span>
                                    <span class="description">Dernier mis a jour le {{Auth::user()->updated_at}}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>
                            </div>
                            <div align="center">
                                <form role="form" enctype ="multipart/form-data" action="/profile" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="logo">Selectionner une image pour votre entreprise </label>
                                            <input type="file" id="logo" name="logo" required>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info">
                                            @if(Auth::user()->logo != 'default.png')
                                                Changer Logo
                                            @else
                                                Ajouter Logo
                                            @endif
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form class="form-horizontal" action="/change_Password" method="POST">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">{{ __('Password') }} <span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" placeholder="New Password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-sm-2 control-label">{{ __('Confirm') }} <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input  type="password" id="password-confirm" class="form-control" name="password_confirmation"
                                                   required placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-info pull-right">Change</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" action="/edit" method="POST">
                                @csrf
                                <div class="box-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-user"></i></span>
                                        <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" placeholder="Name">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input id="localisation" type="text" class="form-control{{ $errors->has('localisation') ? ' is-invalid' : '' }}"
                                               name="localisation" value="{{ old('localisation') }}" placeholder="Adresse">
                                        @if ($errors->has('localisation'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('localisation') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="tel" id="telephone" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}"
                                               name="telephone" value="{{ old('telephone') }}"  placeholder="telephone" data-inputmask='"mask": "(225) 99-99-99-99"' data-mask>
                                        @if ($errors->has('telephone'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('telephone') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="flat-red" checked> I agree to the <a
                                                            href="{{(url('terms'))}}">terms and conditions</a>
                                                </label>
                                            </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        var password = document.getElementById("password")
            , confpassword = document.getElementById("password-confirm");

        function validatePassword(){
            if(password.value != confpassword.value) {
                confpassword.setCustomValidity("Passwords Don't Match");
            } else {
                confpassword.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confpassword.onkeyup = validatePassword;

        $(function () {

            $('[data-mask]').inputmask()

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })
        })
    </script>
@endsection
