<!DOCTYPE html5>
<?php 
session_start();
if(isset($_SESSION['username']))
{
header('location:index.php');
}


  require_once('SDK/config.php');
  $redirected_URL = 'https://localhost/login/callback_face.php';
  $scope = ['email'];
  $full_url = $Handler->getLoginUrl($redirected_URL , $scope);

?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/app.css">
    <link rel="stylesheet" href="style/responsive.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/572f378f74.js" crossorigin="anonymous"></script>
    <title>Yenex-Platform</title>
  </head>
  <body>
    <center>
    <div class="bg-forms">
      <div id="login_form" class="login-form">
        <form action='' method='POST' class='login-form-style'>
            <h2>تسجيل الدخول</h2>
            <br>
              <hr>
              <div class='form-group'>
                <input type='text' autofocus  name='Username' class='form-control'autocomplete="off" id='login_username' placeholder='أسم المستخدم' >
            </div>
              <div class='form-group'>
                <input type='Password' name='Password' id="login_password"class='form-control' placeholder='كلمة المرور' >
              </div>
              <div class='form-group'>
              <button type='submit' name='btn-Login' class='btn btn-dark'>تسجيل الدخول</button>
              </div>
              <div class="forgot_password_link">
                  <a href="" style="color:#ffff">هل نسيت الحساب؟</a>
              </div>
              <hr>
              <div class="create_account" id="new_account">
              <a class="btn btn-dark" id="switch_form">انشاء حساب جديد</a>
              </div>
              <div class="signup-with">
                <a href=""><button class="with-google"><i class="fab fa-google-plus-g google"></i> Login With Google</button></a>
                <br>
                <a href=""><button class="with-facebook"><i class="fab fa-facebook-square facebook"></i> Login With Facebook</button></a>
              </div>
          </form>
      </div>





              <div hidden id="register_form" class="login-form">
                <form action='' method='POST' class='login-form-style'>
                   <h2>تسجيل حساب جديد</h2>
                      <hr>
                      <div class='form-group f-l-input'>
                        <input type='text' autofocus  name='First_Name' class='form-control' autocomplete="off" id='signup_first_username' placeholder='ألاسم الاول'  >
                        <input type='text' name='Last_Name' class='form-control' autocomplete="off" id='signup_last_username' placeholder='أسم العائلة'  >
                      </div>
                      <div class='form-group'>
                        <input type='text' name='Add_Username' class='form-control'autocomplete="off" id='signup_username' placeholder='أسم المستخدم'  >

                      </div>
                      <div class='form-group'>
                        <input type='Password' name='Password' id="signup_password" class='form-control' placeholder='كلمة المرور' >
                      </div>

                      <div class='form-group'>
                        <input type='email' name='Email' id="signup_email" class='form-control' placeholder='البريد الإلكتروني' >
                      </div>

                      <div class='form-group'>
                        <input type='date' name='date_time' id="signup_date" class='form-control' value='1990-01-01' >
                      </div>
                    <div class='form-group'>
                      <select class='form-control' name='Gender' >
                        <option value='Male'>ذكر</option>
                        <option value='Female'>أنثي</option>
                        <option value='other'>مخصص</option>
                     </select>
                    </div>
                      <div class='form-group'>
                      <button type='submit' name='btn_signup' class='btn btn-dark'>إنشاء الحساب </button>
                      </div>
                      <hr>
                      <div class="create_account" id="new_account">
                      <a class="btn btn-dark" id="switch_form_2">تسجيل الدخول</a>
                      </div>
                      <div class="signup-with">
                        <a href=""><button class="with-google"><i class="fab fa-google-plus-g google"></i> Login With Google</button></a>
                        <br>
                        <a href="<?php echo $full_url?>" ><button class="with-facebook"><i class="fab fa-facebook-square facebook"></i> Login With Facebook</button></a>
                      </div>
                  </form>
              </div>





    </center>

    <!-- JavaScript File Include -->
    <script src="javascript/app.js"></script>
    <script src="javascript/jquery-3.3.1.slim.min.js"></script>
    <script src="javascript/popper.min.js"></script>
    <script src="javascript/bootstrap.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
    $( "#switch_form" ).click(function()
     {
         var login = $('#login_form');
         var register = $('#register_form');
         if (login.attr('hidden'))
         {
             login.removeAttr('hidden');
         }
         else
         {
             login.attr('hidden' , true);
         }

         if (register.attr('hidden'))
         {
             register.removeAttr('hidden');
         }
         else
         {
             register.attr('hidden' , true);
         }

     });
     $( "#switch_form_2" ).click(function()
      {
          var login = $('#login_form');
          var register = $('#register_form');
          if (login.attr('hidden'))
          {
              login.removeAttr('hidden');
          }
          else
          {
              login.attr('hidden' , true);
          }

          if (register.attr('hidden'))
          {
              register.removeAttr('hidden');
          }
          else
          {
              register.attr('hidden' , true);
          }
      });
  </script>


  </body>
  <style>

  </style>

</html>
