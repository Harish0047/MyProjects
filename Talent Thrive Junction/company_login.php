<!DOCTYPE html>
<!-- coding by helpme_coder -->
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>company Login Form | helpme_coder</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="container">
        <form  class="login" action="company_process.php"  method="POST">
            <h2>Company Login</h2>
            <div class="input-field">
                <input type="text"  id="username" name="username" required >
                <label>Enter Username</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" placeholder="Password" required> 
                 <label>Enter password</label>
            </div>
            <div class="forget">
                <label for="Save-login">
                    <input type="checkbox" id="Save-login" />
                    <p>Save login information</p>
                </label>
         
            <button type="submit" class="button login__submit">Log In</button>
        </form>
    </div>
</body>

</html>