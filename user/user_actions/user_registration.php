<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registration Form</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- External CSS -->
    <link rel="stylesheet" href="../user_assets/user_css/registration.css" />
</head>

<body>

    <div class="registration-form">
        <h2 class="mb-4 text-center">Register</h2>
        <form id="regForm" novalidate>
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" required />
                <div class="invalid-feedback">
                    Please enter your full name.
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address *</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required />
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password *</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" minlength="6"
                    required />
                <div class="invalid-feedback">
                    Password must be at least 6 characters.
                </div>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password *</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password"
                    required />
                <div class="invalid-feedback" id="confirmPasswordFeedback">
                    Please confirm your password.
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- External JS -->
    <script src="script.js"></script>
</body>

</html>