<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" >
    <link href="<?php echo base_url('assets/bootstrap/css/login-view.css'); ?>" rel="stylesheet">
  </head>
  <body class="sign_up">

<div class="navbar navbar-default navbar-static-top">
      <div class="container">

        <a href="#" class = "navbar-brand" >Tei athens</a>
        <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" >
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
          <span class = "icon-bar"></span>
        </button>

        <div class = "collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" >
              <a href="<?php echo site_url('login'); ?>"class = "navbar-btn btn-primary btn pull-right"> Sign in</a>
            </form>
          </ul>
        </div>

      </div>
    </div>

  <div class="container">
    <h1 class="text-center">Create an Account</h1>
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="container">
            <form action="<?php echo base_url('login/create_account'); ?>" role="form" method="post" accept-charset="utf-8">
                <div class="form-group">

                  <label for="first_name"></label>
                  <?php echo form_input($first_name); ?>

                  <label for="last_name"></label>
                  <?php echo form_input($last_name); ?>

                  <label for="email"></label>
                  <input name="email" type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo set_value('email' ,''); ?> "/>

                  <label for="username"></label>
                  <?php echo form_input($username); ?>

                  <label for="student_id"></label>
                  <?php echo form_input($student_id); ?>

                  <label for="password"></label>
                  <input name="password" type="password" class="form-control input-lg" id="password" placeholder="Password" />

                  <label for="confirm_password"></label>
                  <input name="confirm_password" type="password" class="form-control input-lg" id="confirm_password" placeholder="Confirm Password"/>

                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-block">Create Account</button>
                </br>

                <?php echo validation_errors(); ?>
            </form>
          </div>
        </div>
      </div>
  </div>

  <div class = "navbar navbar-default navbar-fixed-bottom">
      <div class = "container">
      <p class = "navbar-text pull-left" ></p>
      </div>
    </div>


    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src = "<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
  </body>
</html>
