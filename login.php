<html lang="en">

<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" media="all" href="static/css/bootstrap.min.css">

    <title>Drive Storage| Login</title>
</head>

<body>
<div class="container justify-content-center w-25 p-3" style="background-color: #eeeeee; margin-top: 5em;">
            <h1 class="display-5">Login</h1>
            <form action="#" th:action="@{/login}" method="POST">
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="input" class="form-control" name="username" id="inputUsername" placeholder="Enter Username" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Enter Password" maxlength="20" required>
                </div>
                <button type="submit" id="btnSubmit" class="btn btn-primary">Login</button>
            </form>

            <div class="form-group" style="margin-top: 0.5em;">
                <label><a href="signup.php">Click here to sign up</a></label>
            </div>
        </div>
                </form>
                <?php
                require_once ('include/functions.inc.php');
                    showerror('invalidlogin','Please provide a valid Login details');
                ?>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
</body>

</html>