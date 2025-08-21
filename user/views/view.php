<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <form action="#" method="POST" class="container mt-5">
        
        <div class="mb-3">
            <label for="exampleInputEmail1" 
                   class="form-label" >User Name</label>
            <input type="email" 
                   class="form-control" 
                   id="email" 
                   name="email"
                   placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="text" 
                   class="form-control" 
                   id="email" 
                   name="email" 
                   placeholder="Full Name">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password"
                   class="form-control" 
                   id="password" 
                   name="password" 
                   placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputConfirmPassword1">Confirm Password</label>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>