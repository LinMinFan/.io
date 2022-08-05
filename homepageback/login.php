<?php
include "./base.php";
if (isset($_SESSION['acc'])) {
  to("./back.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>會員登入</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class='box'>
    <div class='box-form'>
      <div class='box-login-tab'></div>
      <div class='box-login-title'>
        <div class='i i-login'></div>
        <h2>LOGIN</h2>
      </div>
      <div class='box-login'>
        <div class='fieldset-body' id='login_form'>
          <button onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'></button>
          <p class='field'>
            <label for='acc'>帳號</label>
            <input type='text' id='acc' name='acc' title='Username' />
            <span id='valida' class='i i-warning'></span>
          </p>
          <p class='field'>
            <label for='pw'>密碼</label>
            <input type='password' id='pw' name='pw' title='Password' />
            <span id='valida' class='i i-close'></span>
          </p>

          <label class='reset'>
            <input type='button' value='清除' onclick="reset()" />
          </label>

          <input type='submit' id='do_login' value='登入' title='Get Started' onclick="login()" />
        </div>
      </div>
    </div>
    <div class='box-info'>
      <p><button onclick="closeLoginInfo();" class='b b-info i i-left' title='Back to Sign In'></button>
      <h3>Need Help?</h3>
      </p>
      <div class='line-wh'></div>
      <button onclick="forgot()" class='b-support' title='Forgot Password?'> 忘記密碼</button>
      <!-- <button onclick="support()" class='b-support' title='Contact Support'> Contact Support</button> -->
      <div class='line-wh'></div>
      <button onclick="reg()" class='b-cta' title='Sign up now!'> 註冊帳號</button>
    </div>
  </div>

  <div id="mmodal">
    <button onclick="cl()" class="closebtn">X</button>
    <div id="modalcontent"></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" referrerpolicy="no-referrer"></script>
  <script src="./js/main.js"></script>
  
  
</body>
</html>