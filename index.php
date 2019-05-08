<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="js/jquery-3.4.0.min.js"></script><!-- Load jquery -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"><!-- Custom CSS -->
    <!-- Include Google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,600">



    <link href="https://fonts.googleapis.com/css?family=Gugi|Montserrat" rel="stylesheet">
    <script src="js/bootstrap.min.js" ></script><!-- Load bootstrap js -->
    <script src="js/app.js" ></script><!-- Load custom js -->
</head>

<style>

    body {
        background: #fe8c00; /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #f83600, #fe8c00); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #f83600, #fe8c00); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    
    .manager-section {
        background: white;
    }
    .student-section {
        background: white;
    }

    .title1 {
        height: 75px;
        font-family: Gugi;
        justify-content: center;
        align-content: center;
        display: flex;
        font-size: x-large;
        padding-top: 25px;
    }

        .title2 {
            display: flex;
        }

</style>

<body>
    <img src="./gau_logo_kartal.png" alt="" style="height:60px !important" class="title2 ml-auto mr-auto mt-4">
    <div class="title1">
        <span>GAU E-Participation</span></div>
    <div class="container mt-4" id="main-container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4 manager-section">
                <!-- Default form login -->
                <form method="post" id="login_form_manager" autocomplete="off" class="text-center border border-light p-5" name="manager_login">

                    <p class="h4 mb-4">Login as Manager</p>

                    <!-- Email -->
                    <input type="email" name="Email" id="ManagerEmail" class="form-control mb-4" placeholder="E-mail">

                    <!-- Password -->
                    <input type="password" name="Password" id="ManagerPassword" class="form-control mb-4"
                        placeholder="Password">

                    <!-- Sign in button -->
                    <button type="submit" class="btn btn-success btn-block my-4" id = "login_form_manager">Sign in</button>
                    <div id="display_error_manager" class="alert alert-danger fade in"></div><!-- Display Error Container -->

                    <!-- Register -->
                    </form>
                <!-- Default form login -->
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4 student-section">
                <!-- Default form login -->
                <form  method="post" id="login_form_student" name = "student_login" class="student_login text-center border border-light p-5">

                    <p class="h4 mb-4">Login as Student</p>

                    <!-- Email -->
                    <input type="email" name="Email" id="StudentEmail" class="form-control mb-4" placeholder="E-mail">

                    <!-- Password -->
                    <input type="password" name="Password" id="StudentPassword" class="form-control mb-4"
                        placeholder="Password">


                    <!-- Sign in button -->
                    <button type="submit" class="btn btn-info btn-block my-4" name = "login_form" id = "login_form_student">Sign in</button>

                    <!-- Register -->
                    <!-- Registration Form -->
                   
                    


                </form>
                <div id="display_error_student" class="alert alert-danger fade in"></div><!-- Display Error Container -->

                <p>Not a member?
                <button type="button" class="btn btn-info btn-block my-4" data-toggle="modal" data-target="#registration_modal">Create an account</button>
                    </p>
  <div class="modal fade" role="dialog" id="registration_modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- HTML Form -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registration form</h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
        <form  method="post" name="registration_form" id="registration_form">

                <input type="text" name="Name" id="reg_name" class="form-control"  pattern=".{2,100}" title="min 2 characters."  placeholder = "Name">
                <input type="text" name="Surname" id="reg_surname" class="form-control"  pattern=".{2,100}" title="min 2 characters."  placeholder = "Surname">
                <input type="email" name="Email" id="reg_mail" class="form-control"  placeholder = "Mail">
                <input type="password" name="Password" id="reg_password" class="form-control"  pattern=".{6,12}" title="6 to 12 characters." placeholder = "Password">

                <div id="display_error_register" class="alert alert-danger fade in"></div><!-- Display Error Container -->
        </div>

        <!-- Modal Footer -->
        
        <button type="submit"  class="btn btn-lg btn-success"  id = "register_student"> Submit </button>
          <button type="button" class="btn  btn-lg  btn-default" data-dismiss="modal">Cancel</button>
        </form>

      </div>
    </div>
  </div>
                <!-- Default form login -->
            </div>
        </div>

    </div>
</body>
</html>