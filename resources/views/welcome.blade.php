<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mtaandao</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        body, html {
            height: 100%;
          }
          
          * {
            box-sizing: border-box;
          }
          
          .bg-img {
            /* The image used */
            background-image: url("/images/aerial.jpg");
          
            /* Control the height of the image */
            min-height: 380px;
          
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
          }
          
          /* Add styles to the form container */
          .container {
            position: absolute;
            right: 0;
            margin: 20px;
            max-width: 300px;
            padding: 16px;
            background-color: white;
          }
          
          /* Full-width input fields */
            input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
          }
          
          input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
          }
          
          /* Set a style for the submit button */
          .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
          }
          
          .btn:hover {
            opacity: 1;
          }
        </style>
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="d-flex justify-content-right">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="bg-img">
            <form action=" {{ __('Login') }}" class="container">
              <h1>Login</h1>
          
              <label for="email"><b>Email</b></label>
              <input type="text" placeholder="Enter Email" name="email" required>
          
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>
          
              <button type="submit" class="btn">Login</button>
            </form>
        </div>
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            © {{ date('Y') }} Praxis. All rights reserved.
        </div>
    </body>
</html>
