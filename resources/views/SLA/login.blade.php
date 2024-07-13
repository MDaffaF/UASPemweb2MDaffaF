<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f0f0f0; /* Ubah warna latar belakang */
        }
        .container-login {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-form {
            background-color: #ffffff; /* Ubah warna background container */
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
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "{{ route('login') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        text: response.message
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
