<html lang="en">

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" media="all" href="static/css/bootstrap.min.css">

    <title>Drive Storage| Signup</title>
</head>

<body class="p-3 mb-2 bg-light text-black">
        <div class="container justify-content-center w-50 p-3" style="background-color: #eeeeee; margin-top: 5em;">
            <div class="form-group">
                <label><a id="login-link" href="login.html">Back to Login</a></label>
            </div>

            <h1 class="display-5">Sign Up</h1>
            <form action="#" action="@{/signup}" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName">First Name</label>
                        <input type="input" name="firstName" class="form-control" id="inputFirstName" placeholder="Enter First Name" maxlength="20" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Last Name</label>
                        <input type="input" name="lastName" class="form-control" id="inputLastName" placeholder="Enter Last Name" maxlength="20" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUsername">Username</label>
                        <input type="input" name="username" class="form-control" id="inputUsername" placeholder="Enter Username" maxlength="20" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password" maxlength="20" required>
                    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="index.html" class="navbar-brand">
        </a>
    </nav>
    <?php
        require_once('include/functions.inc.php');
    ?>
    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" placeholder="Email ID" class="form-control" name="email">
                            <?php
                                showerror('invalidemail','Please provide a valid email');
                                showerror('emailexists','Someone already registered with this email id.');
                            ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" placeholder="Confirm Password" class="form-control"
                                name="confirmPassword">
                                <?php
                                    showerror('passmismatched','Your password mismatched.');
                                ?>
                        </div>
                    </div>
                    <div class="col-sm-8">
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Male" name="gender">
                                <label class="form-check-label">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Female" name="gender" checked>
                                <label class="form-check-label">
                                    Female
                                </label>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit"name="submit" class="btn btn-primary mr-5">Sign Up</button>
</br> Already Registered, <a href="login.php">Click Here</a> for login.
                        </div>
                    </div>
                </form>
                <?php
                    showerror('emptyinput','Please fillup all the fields correctly.');
                    showsuccess('regsuccess','You are registered successfully
                        <a href="login.php" class="btn btn-success ml-3">Login</a>');
                ?>
            </div>
        </div>
    </main>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>