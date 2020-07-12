@extends('layouts.login')
@section('title','الدخول')
@section('content')
<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
    @include('admin.includes.alerts.errors')
    @include('admin.includes.alerts.success')
    <form class="form" style="margin-top:45%;" action="{{route('admin.login')}}" method="post">
        @csrf
        <div class="card card-login card-hidden">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Login</h4>
                <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body ">
                <p class="card-description text-center">Or Be Classical</p>

                <span class="bmd-form-group">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">email</i>
                            </span>
                        </div>
                        <input type="text" name="email" class="form-control form-control-lg input-lg"
                            value="{{old('email')}}" id="email" placeholder="أدخل البريد الالكتروني ">
                    </div>

                </span>
                <span class="bmd-form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">lock_outline</i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg input-lg"
                            id="user-password" placeholder="أدخل كلمة المرور">
                    </div>
                </span>
                <div class="form-group row">
                    <div class="col-md-6 col-12 text-center text-md-left">
                        <fieldset>
                            <input type="checkbox" name="remember_me" id="remember-me" class="chk-remember">
                            <label for="remember-me">تذكر دخولي</label>
                        </fieldset>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i>
                    دخول
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
