


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
             integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
    <form action="../controllers/AuthController.php" method="POST" class="container p-4 pt-4  shadow rounded bg-white" autocomplete="off">
        <div class="user-icon">
            <i class="bi bi-person-circle"></i>
        </div>
        <h2 class="mb-3 text-center">Registration Form</h2>
        <div class="mb-2">
            <label for="InputName1" 
                   class="form-label" >Name</label>
            <input type="text" 
                   class="form-control" 
                   id="name" 
                   name="name"
                   placeholder="Enter your full name">
        </div>
        <div class="mb-2">
            <label for="InputUsername1" 
                   class="form-label" >User Name</label>
            <input type="text" 
                   class="form-control" 
                   id="username" 
                   name="username"
                   placeholder="Enter email">
        </div>

        <div class="mb-2">
            <label for="InputEmail1">Email</label>
            <input type="text" 
                   class="form-control" 
                   id="email" 
                   name="email" 
                   placeholder="Full Name">
        </div>

        <div class="mb-2">
            <label for="InputPassword1">Password</label>
            <input type="password"
                   class="form-control" 
                   id="password" 
                   name="password" 
                   placeholder="Password">
        </div>

        <div class="mb-2">
            <label for="InputConfirmPassword1">Confirm Password</label>
            <input type="password"
                   class="form-control" 
                   id="confirmPassword" 
                   name="confirmPassword" 
                   placeholder="Confirm Password">
        </div>
        

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Save Password</label>
        </div>

        <div class="link">
            <a href="#">Already have account?</a>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
       </div>
    </div>
</div>



</body>
</html>