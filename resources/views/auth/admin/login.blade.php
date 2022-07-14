@include('backend.code-section.js.header.head')

@php
$setting = DB::table('settings')->first();  
@endphp

<div class="hold-transition login-page">
 <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
            <a href="/auth/login">  <img src="{{ (!empty($setting->image)) ? url('backend/all-images/web/logo/'.$setting->image): url('backend/all-images/web/default/loader.png') }}" alt="" class="brand-image" height="50px" width="180px"><br/></a>
          </div>
          <p class="login-box-msg text-danger">Use your email and password to Login</p>
        <form method="POST" action="{{ route('submit.login') }}">
            @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
        <!-- /.col -->
        <div class="col-12" align="right">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
        </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>


  @include('backend.code-section.js.footer.foot')