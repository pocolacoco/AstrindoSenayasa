<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.card {
  width: 500px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
  text-align: center;
}

h2 {
  margin-bottom: 20px;
  margin-left: -15px;
}

.btn-container {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  justify-content: space-between;
  height: 100%;
  width: 200px;
}

.btn {
  flex: 1;
  padding: 15px;
  margin-bottom: 10px;
  text-decoration: none;
  color: #fff;
  border: none;
  border-radius: 10px;
  transition: background-color 0.3s ease;
  font-size: 18px;
  width: 100%;
  margin-left: -20px;
}

.btn-primary {
  background-color: #428bca;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  width: 100%;
}

.btn-primary:hover {
  background-color: #3071a9;
}

.btn-success {
  background-color: #28a745;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);

}

.btn-success:hover {
  background-color: #218838;
}
</style>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Register</h2>
            <div class="btn-container">
                <a href="register/admin" class="btn btn-primary">Register as Admin</a>
                <a href="/register" class="btn btn-success">Register as Student</a>
            </div>
        </div>
    </div>
</body>
</html>
