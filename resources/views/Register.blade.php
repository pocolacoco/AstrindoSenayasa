<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="css/register.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <script>
        $(document).ready(function() {
            $('#registerForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var method = form.attr('method');
                var data = form.serialize();

                $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    success: function(response) {
                        alert(response.message);
                        window.location.href = '/login';

                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>

</head>
<body>
<div class="card">
    <div class="card-body">
        <h2>Register</h2>
        <form id="registerForm" class="mx-1 mx-md-4" action="{{ route('register') }}" method="POST">
            @csrf

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="name" class="form-control" name="name" />
                    <label class="form-label" for="name">Your Name</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-id-card fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="nim" class="form-control" name="nim" />
                    <label class="form-label" for="nim">Your NIM</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="email" id="email" class="form-control" name="email" />
                    <label class="form-label" for="email">Your Email</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="password" class="form-control" name="password" />
                    <label class="form-label" for="password">Password</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" />
                    <label class="form-label" for="password_confirmation">Repeat your password</label>
                </div>
            </div>

            <div class="form-check d-flex justify-content-center mb-5">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                <label class="form-check-label" for="form2Example3c">
                    I agree to all statements in <a href="#!">Terms of service</a>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
        </form>
    </div>
    <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="regis2.png" class="img-fluid" alt="Phone image">
    </div>
</div>
</body>
</html>
