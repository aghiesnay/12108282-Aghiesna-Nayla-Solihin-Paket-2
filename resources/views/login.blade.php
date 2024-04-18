<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/app.css" />
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/dashboard/auth" method="POST" class="sign-in-form">
                    @csrf
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Name"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-block text-uppercase">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <img src="/assets/img/log.svg" class="image" alt="" />
            </div>
        </div>
    </div>
</body>
</html>
