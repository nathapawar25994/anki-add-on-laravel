<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Signup - Anki Web App</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf" value="{{ csrf_token() }}">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="navbar navbar-fixed-top">

        <div class="navbar-inner">

            <div class="container">

                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <a class="brand" href="index.html">
                    Bootstrap Admin Template
                </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="">
                            <a href="{{ route('login') }}" class="">
                                Already have an account? Login now
                            </a>

                        </li>
                        
                    </ul>

                </div>
                <!--/.nav-collapse -->

            </div> <!-- /container -->

        </div> <!-- /navbar-inner -->

    </div> <!-- /navbar -->



    <div class="account-container register">

        <div class="content clearfix">

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Signup for Account</h1>

                <div class="login-fields">

                    <p>Create your account:</p>

                    <div class="field">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="" placeholder="Name" class="login" />
                    </div> <!-- /field -->

                    <div class="field">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" value="" placeholder="Email" class="login" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> <!-- /field -->

                    <div class="field">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" value="" placeholder="Password" class="login" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> <!-- /field -->

                    <div class="field">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password-confirm" name="password_confirmation" value="" placeholder="Confirm Password" class="login" />
                    </div> <!-- /field -->

                </div> <!-- /login-fields -->

                <div class="login-actions">

                    <span class="login-checkbox">
                        <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                        <label class="choice" for="Field">Agree with the Terms & Conditions.</label>
                    </span>

                    <button type="submit" class="button btn btn-primary btn-large">Register</button>

                </div> <!-- .actions -->

            </form>

        </div> <!-- /content -->

    </div> <!-- /account-container -->


    <!-- Text Under Box -->
    <div class="login-extra">
        Already have an account? <a href="{{ route('login') }}">Login to your account</a>
    </div> <!-- /login-extra -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/signin.js"></script>

</body>

</html> 