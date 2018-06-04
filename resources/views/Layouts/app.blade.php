<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- below style is intended to center the logo -->
    <style type="text/css">
    .navbar-brand {
      position: absolute;
      width: auto;
      left: 0;
      top: 0;
      text-align: center;
      margin-left: 48%;
      margin-right: 50%;
    }
    .nav-link {
      text-align: center;
    }
  </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="margin-bottom:0px">
          <!-- Navbar Brand, should be changed by the logo later-->



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="width: 150%; height: 50%">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto " style="float: right;width: 70%; height: 50%">
                      @guest
                        <button type="button" id="login-drop-down" data-toggle="dropdown" class="btn btn-primary dropdown-toggle " href="{{ route('login') }}" style="font-size: medium" > {{ __('ساحة الكشاف') }} <span class="carret"></span></button>
                          <ul class="dropdown-menu dropdown-menu-left mt-2 bg-secondary" style="width: 50%" >
                             <li class="px-3 py-2">
                               <!-- this is the login form -->
                               <div class="card" >
                               <div class="card-body" >
                                   <form method="POST" action="{{ route('login') }}">
                                       @csrf

                                       <div class="form-group row" >
                                           <label for="email" class="col-sm-4 col-form-label text-md-right" style="font-size: medium">{{ __('البـــريد الالكتروني') }}</label>

                                           <div class="col-md-6">
                                               <input id="email" type="email"  style="font-size: medium" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                               @if ($errors->has('email'))
                                                   <span class="invalid-feedback">
                                                       <strong style="font-size: medium" >{{ $errors->first('email') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <label for="password" class="col-md-4 col-form-label text-md-right" style="font-size: medium" >{{ __('كلــمة السر') }}</label>

                                           <div class="col-md-6">
                                               <input id="password" type="password" style="font-size: medium"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                               @if ($errors->has('password'))
                                                   <span class="invalid-feedback">
                                                       <strong style="font-size: medium" >{{ $errors->first('password') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <div class="col-md-6 offset-md-4">
                                               <div class="checkbox">
                                                   <label style="font-size: small" >
                                                       <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > {{ __('تذكرني على هذا الجهاز') }}
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="form-group row mb-0">
                                           <div class="col-md-8 offset-md-4">
                                               <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: small" >
                                                   {{ __('نسيت كلمة المرور؟') }}
                                               </a>
                                               <button type="submit" class="btn btn-primary" style="font-size: medium">
                                                   {{ __('تسجيل الدخول') }}
                                               </button>


                                           </div>
                                       </div>
                                   </form>
                               </div>
                               </div> <!-- End of Login Card -->
                              </li>
                          </ul>
                      @else
                        <!-- User Profile Snippet (When Logged In)
                        SUGGESTION: in later stages, this part should be snipped out of the collapsed navbar
                              and represented with the user's icon.
                              @hzerrad
                          -->
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                    </ul>

                    <!-- Middle of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-self-end">

                        <li class="nav-item">
                            <!-- this is the about link -->
                            <a class="nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}" href="/about" style="font-size: large ;margin-right: 8px;">تعرف علينا</a>
                        </li>
                        <!-- this is the groups dropdown button -->
                        <li class="nav-item  dropdown mega-dropdown " style="margin-right: 10px">

                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large ;margin-right: 8px;margin-left: 8px">الأفواج</a>
                            <div class="dropdown-menu align-items-center" aria-labelledby="dropdown04">
                                <table >
                                    <tr>
                                        <td>
                                            <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                            <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#" >الكشاف</a>
                                        </td>

                                        <td>
                                            <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                            <a class="dropdown-item align-items-center" style="text-align:center ;font-size: large" href="#">الأشبال</a>
                                        </td>


                                    </tr>
                                    <tr >
                                        <td>
                                            <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                            <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#">الجوالة</a>
                                        </td>
                                        <td >
                                            <img src="/images/motakadim.png" width="20" height="20" style="margin-left: 30px; position: center">
                                            <a class="dropdown-item align-items-center" style="text-align:center ;font-size: large" href="#">المتقدم</a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td></td>

                                        <td style="margin: 50%">
                                            <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                            <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#">القادة</a>
                                        </td>
                                        <td>
                                    </tr>
                                </table>



                            </div>
                        </li>
                        <li class="nav-item" >
                            <!-- this is the news link -->
                            <a class="nav-link" href="#" style="font-size: large ;margin-right: 8px;margin-left: 8px">الأخبار</a>
                        </li>
                        <li class="nav-item">
                            <!-- this is the index link -->
                            <a class="nav-link {{ Route::currentRouteNamed('index') ? 'active' : '' }}" href="/" style="font-size: large ;margin-right: 8px;margin-left: 8px">الرئيسية</a>
                        </li >

                        <li class="nav-item" ><a class="nav-link" href="/"><img src="{{ asset('images/falah.png') }}" width="35" height="35"></img></a></li>
                    </ul>

                </div>

        </nav>


    </div>
</body>
</html>
