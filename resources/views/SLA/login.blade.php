<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body, html {
            height: 100%;
            background: url('backgroundlogin.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container-login {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-logo {
            margin-bottom: 20px;
            text-align: center;
        }
        .login-logo img {
            max-width: 150px;
            height: auto;
        }
        footer {
            margin-top: 20px;
            text-align: center;
        }
        .social-icons a {
            margin: 0 10px;
            color: inherit; 
            text-decoration: none;
        }
        .social-icons a:hover {
            color: #007bff; 
        }
    </style>
</head>
<body>
<div class="container-login">
    <div class="login-form">
        <div class="login-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/TVRI_Jawa_Barat_2023.svg/800px-TVRI_Jawa_Barat_2023.svg.png" alt="TVRI Jawa Barat">
        </div>
        <h2 class="text-center mt-5">Login</h2>
        <form id="loginForm" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <footer>
            <p>&copy; 2024 TVRI Jawa Barat. <br> Muhammad Daffa Fikriawan</p>
            <div class="social-icons">
                <a href="https://www.instagram.com/tvrijabar/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/LPPTVRIJABAR" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.tiktok.com/@tvri_jabar" target="_blank"><i class="fab fa-tiktok"></i></a>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('login') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        text: response.message + response.user.name
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('menu') }}";
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: xhr.responseJSON.message
                    });
                }
            });
        });
    });
</script>
</body>
</html>
