<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
      <!-- bootstrap js link -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<!-- font awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
body{
    overflow: hidden; 
    /* scroll keliye overflow */
}
</style>


</head>


<body>
    <div class="container-fluid m-3">
        <h2 class = "text-center mb-5">Admin Login</h2>
        <div class = "row d-flex justify-content-center ">
        

            <div class = "col-lg-6 col-xl-4">
                <img src="../images/adminlog.jpeg" alt="admmin registration" class ="image-fluid">
            </div>
            <div class = "col-lg-6">
                <form action="" method = "post">
                    <div class = "form-outline mb-4">
                        <label for="username" class = "form-label">Username</label>
                        <input type="text" id = "username" name = "username" placeholder = "enter the username" required = "requires" class = "form-control" autocomplete="off">
                    </div>


                    <div class = "form-outline mb-4">
                        <label for="password" class = "form-label">password</label>
                        <input type="password" id = "password" name = "password" placeholder = "enter the password" required = "requires" class = "form-control">
                    </div>

                    
                        <input type="submit" value="Login" class = "bg-info py-2 px-3 border-0" name = "admin_login">
                        <p class = "small text-dark fw-bold">Don't you have an account??<a href = "admin_registration.php" class = "text-danger">Register</a></p>
                    <div>

                    </div>
                </form>
            </div>

        </div>
    </div>
    










    
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>