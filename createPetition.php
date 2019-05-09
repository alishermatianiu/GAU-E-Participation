<!DOCTYPE html>
<html lang="en">
    <?php
    require('inc/config.php');
    require('inc/functions.php');
    if (!isset($_SESSION['UserData'])) 
        exit(header("location:index.php"));
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.4.0.min.js"></script><!-- Load jquery -->

    
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Gugi|Montserrat" rel="stylesheet">
    <script src="js/app.js" ></script><!-- Load custom js -->

    <title>Create Petition</title>
</head>
<body>
<!--Header-->
<nav class="navbar navbar-expand-lg navbar-dark grey darken-3">
    
    <p class="navbar-brand m-auto" id="big-header" href="#">GAU E-Participation</p>

</nav>
<!--/Header-->
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark grey darken-1 mb-3">

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li id = "Myinf">
                <a class="nav-link" id = "<?php echo $_SESSION["UserData"]["user_id"]; ?>" > <?php echo $_SESSION['UserMail']; ?>   </a>
            </li>
            
        </ul>
        <!-- Links -->
        
        <form class="form-inline">
            <div class="md-form my-0">
                    <button class="nav-link btn btn-sm btn-danger ml-auto" onclick = "window.location.href = 'logout.php';">Sign Out</button> 
            </div>
        </form>
    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
    <div class="container">
            <div class="row" id="textBox">
                <form class="col-md-6 form-group">
                    <p class="justify-content-center">Petition:</p>
                    <label>Subject</label>
                    <select class="browser-default custom-select mb-4" id = "optPetition">
                        <option value="" disabled>Choose option</option>
                        <option value="1" selected>Feedback</option>
                        <option value="2">Report a bug</option>
                        <option value="3">Feature request</option>
                        <option value="4">Feature request</option>
                    </select>
                    <textarea name="petition-body" id="petitionBody" cols="30" rows="5" class="form-control" placeholder="Write your text here..."></textarea>
                    <!-- Checkbox -->
                    <div class="custom-control custom-checkbox mb-2 mt-2">
                        <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
                        <label class="custom-control-label font-weight-light" for="defaultContactFormCopy">Make this petition private</label>
                    </div>
                    <input type="submit" name="submitBtn" id="submitPetition" class="btn btn-sm ml-auto btn-success">
                </form>
                <div id="display_error_petition" class="alert alert-danger fade in"></div><!-- Display Error Container -->

            </div>
    </div>
    <!-- <div class="title-header">
        <h3>Petition</h3>
    </div> -->
</body>
</html>