<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Anki-Web Search</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

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
                    Anki-Web Search
                </a>

                <div class="nav-collapse">
                    <ul class="nav pull-right">

                        <li class="">
                            <a href="signup.html" class="">
                                Don't have an account?
                            </a>

                        </li>

                        <!-- <li class="">
                            <a href="index.html" class="">
                                <i class="icon-chevron-left"></i>
                                Back to Homepage
                            </a>

                        </li> -->
                    </ul>

                </div>
                <!--/.nav-collapse -->

            </div> <!-- /container -->

        </div> <!-- /navbar-inner -->

    </div> <!-- /navbar -->



    <div class="account-container">

        <div class="content clearfix">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Member Login</h1>

                <div class="login-fields">

                    <p>Please provide your details</p>

                    <div class="field">
                        <label for="username">Username</label>
                        <input id="username" type="email" class="login username-field" name="email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> <!-- /field -->

                    <div class="field">
                        <label for="password">Password:</label>
                        <input id="password" type="password" class="login password-field" name="password" required >
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> <!-- /password -->

                </div> <!-- /login-fields -->

                <div class="login-actions">

                    <span class="login-checkbox">
                        <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                        <label class="choice" for="Field">Keep me signed in</label>
                    </span>

                    <button type="submit" class="button btn btn-success btn-large">Sign In</button>

                </div> <!-- .actions -->



            </form>

        </div> <!-- /content -->

    </div> <!-- /account-container -->



    <div class="login-extra">
        <a href="#">Reset Password</a>
    </div> <!-- /login-extra -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/signin.js"></script>

</body>

</html> 