<!DOCTYPE html>
<html>
<head>
    <title>Register Form</title>
    <link rel="stylesheet" href="/css/registeradmin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script>
        $(document).ready(function() {


            $('#registerFormAdmin').submit(function(e) {
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

<div class="card mt-4">
    <div class="card-body">
        <h2>Register as Admin</h2>
        <form id="registerFormAdmin" class="mx-1 mx-md-4" action="/register/admin" method="POST">

            @csrf

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="adminName" class="form-control" name="name" />
                    <label class="form-label" for="adminName">Your Name</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-id-card fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="text" id="idcard" class="form-control" name="idcard" />
                    <label class="form-label" for="adminEmail">Your ID Card</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="email" id="adminEmail" class="form-control" name="email" />
                    <label class="form-label" for="adminEmail">Your Email</label>
                </div>
            </div>


            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="adminPassword" class="form-control" name="password" />
                    <label class="form-label" for="adminPassword">Password</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="adminPasswordConfirmation" class="form-control" name="password_confirmation" />
                    <label class="form-label" for="adminPasswordConfirmation">Repeat your password</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Register as Admin</button>
        </form>
    </div>
    <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="admin.png" class="img-fluid" alt="admin">
    </div>
</div>
</body>
</html>
