<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    {{-- content you see when logged in --}}
    @auth
        <p>Congratulations! You are logged in as {{ auth()->user()->name }}.</p>

        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>

        <div class="post-box">
            <h2>Create a Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" value="{{ old('title') }}">
                @error('title')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <textarea name="content" placeholder="Body Content...">{{ old('content') }}</textarea>
                @error('content')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <button>Create Post</button>
            </form>
        </div>

        <style>
            .post-box {
                background: white;
                padding: 30px 40px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
                width: 400px;
                margin-top: 20px;
            }

            .post-box h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            .post-box input, .post-box textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 14px;
            }

            .post-box button {
                width: 100%;
                padding: 10px;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 15px;
                cursor: pointer;
            }

            .post-box button:hover {
                background: #45a049;
            }

            .form-error {
                color: #b91c1c;
                font-size: 14px;
                margin: -6px 0 12px;
            }
        </style>
    @else

    {{-- content you see when not logged in --}}
        <div class="register-box">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button>Register</button>
            </form>
        </div>
        <div class="login-box">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginname" placeholder="Name">
                <input type="password" name="loginpassword" placeholder="Password">
                <button>Login</button>
            </form>
        </div>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f2f2f2;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
        
            .register-box {
                background: white;
                padding: 30px 40px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
                width: 280px;
            }
        
            .register-box h2 {
                text-align: center;
                margin-bottom: 20px;
            }
        
            .register-box input {
                width: 100%;
                padding: 10px;
                margin-bottom: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 14px;
            }
        
            .register-box button {
                width: 100%;
                padding: 10px;
                background: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 15px;
                cursor: pointer;
            }
        
            .register-box button:hover {
                background: #45a049;
            }

            /* login */
            .login-box {
                background: white;
                padding: 30px 40px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
                width: 280px;
                margin-left: 20px;
            }

            .login-box h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            .login-box input {
                width: 100%;
                padding: 10px;
                margin-bottom: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 14px;
            }

            .login-box button {
                width: 100%;
                padding: 10px;
                background: #008CBA;
                color: white;
                border: none;
                border-radius: 4px;
                font-size: 15px;
                cursor: pointer;
            }

            .login-box button:hover {
                background: #007bb5;
            }
        </style>
    @endauth


</body>
</html>
