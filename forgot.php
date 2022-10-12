<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
require_once "conexion.php";
  $select=mysql_query("select email,password from users where email='$email'");
  if(mysql_num_rows($select)==1)
  {
    while($row=mysql_fetch_array($select))
    {
      $email=md5($row['email']);
      $pass=md5($row['password']);
    }
    $link="<a href='https://jacmarcofidel.agenciaeaglesoftware.com/forgot.php/key=".$email."&reset=".$pass."'>Click en restablecer contraseña</a>";
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "info@agenciaeaglesoftware.com";
    // GMAIL password
    $mail->Password = "Abbigail@2108";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "mail.agenciaeaglesoftware.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='info@agenciaeaglesoftware.com';
    $mail->FromName='CORPORACIÓN COARDECOM';
    $mail->AddAddress('reciever_email_id', 'reciever_name');
    $mail->Subject  =  'Restablecer Contraseña';
    $mail->IsHTML(true);
    $mail->Body    = 'Haz click en el siguiente enlace para restablecer la contraseña '.$pass.'';
    if($mail->Send())
    {
      echo "Check Your Email and Click on the link sent to your email";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }	
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php');?>

</head>

<body>
    <div class="login-container container">
        <div class="form-login">
            <ul class="login-nav">
                <li class="login-nav__item ">
                    <a href="index.php">Iniciar sesión</a>
                </li>
                <li class="login-nav__item active">
                    <a href="register.php">Registrarme</a>
                </li>
            </ul>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label style="color:#fff">Ingrese su correo electrónico</label>
                    <input type="email" name="email" class="form-control" placeholder="Documento de identidad"
                        value="<?php echo $username; ?>">
                    <span class="help-block" style="color:#fff"><?php echo $username_err; ?></span>
                </div>
        
                <div class="form-group">
                    <input type="submit" name="submit_email" class="btn btn-success" value="Enviar contraseña">
                    <input type="reset" class="btn btn-danger" value="Borrar">
                </div>

            </form>
        </div>

    </div>
</body>
<style>
body {
    background-color: #e9e9e9;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
    line-height: 1.25;
    letter-spacing: 1px;
}

* {
    box-sizing: border-box;
    transition: .25s all ease;
}

.help-block {
    color: #ffffff;
}

.login-container {
    display: block;
    position: relative;
    z-index: 0;
    margin: 4rem auto 0;
    padding: 5rem 4rem 0 4rem;
    width: 100%;
    max-width: 525px;
    min-height: 680px;
    background-image: url(images/fondo.png);
    box-shadow: 0 50px 70px -20px rgba(0, 0, 0, 0.85);
    background-size: cover;
}

.login-container:after {
    content: '';
    display: inline-block;
    position: absolute;
    z-index: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: radial-gradient(ellipse at left bottom, rgba(1, 184, 253) 0%, rgba(38, 20, 72, .9) 59%, rgba(1, 184, 253) 100%);
    box-shadow: 0 -20px 150px -20px rgba(0, 0, 0, 0.5);
}

.form-login {
    position: relative;
    z-index: 1;
    padding-bottom: 4.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
}

.login-nav {
    position: relative;
    padding: 0;
    margin: 0 0 6em 1rem;
}

.login-nav__item {
    list-style: none;
    display: inline-block;
}

.login-nav__item+.login-nav__item {
    margin-left: 2.25rem;
}

.login-nav__item a {
    position: relative;
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 1.25rem;
    padding-bottom: .5rem;
    transition: .20s all ease;
}

.login-nav__item.active a,
.login-nav__item a:hover {
    color: #ffffff;
    transition: .15s all ease;
}

.login-nav__item a:after {
    content: '';
    display: inline-block;
    height: 10px;
    background-color: rgb(255, 255, 255);
    position: absolute;
    right: 100%;
    bottom: -1px;
    left: 0;
    border-radius: 50%;
    transition: .15s all ease;
}

.login-nav__item a:hover:after,
.login-nav__item.active a:after {
    background-color: rgb(17, 97, 237);
    height: 2px;
    right: 0;
    bottom: 2px;
    border-radius: 0;
    transition: .20s all ease;
}

.login__label {
    display: block;
    padding-left: 1rem;
}

.login__label,
.login__label--checkbox {
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    font-size: .75rem;
    margin-bottom: 1rem;
}

.login__label--checkbox {
    display: inline-block;
    position: relative;
    padding-left: 1.5rem;
    margin-top: 2rem;
    margin-left: 1rem;
    color: #ffffff;
    font-size: .75rem;
    text-transform: inherit;
}

.login__input {
    color: white;
    font-size: 1.15rem;
    width: 100%;
    padding: .5rem 1rem;
    border: 2px solid transparent;
    outline: none;
    border-radius: 1.5rem;
    background-color: rgba(255, 255, 255, 0.25);
    letter-spacing: 1px;
}

.login__input:hover,
.login__input:focus {
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.5);
    background-color: transparent;
}

.login__input+.login__label {
    margin-top: 1.5rem;
}

.login__input--checkbox {
    position: absolute;
    top: .1rem;
    left: 0;
    margin: 0;
}

.login__submit {
    color: #ffffff;
    font-size: 1rem;
    font-family: 'Montserrat', sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 1rem;
    padding: .75rem;
    border-radius: 2rem;
    display: block;
    width: 100%;
    background-color: rgba(17, 97, 237, .75);
    border: none;
    cursor: pointer;
}

.login__submit:hover {
    background-color: rgba(17, 97, 237, 1);
}

.login__forgot {
    display: block;
    margin-top: 3rem;
    text-align: center;
    color: rgba(255, 255, 255, 0.75);
    font-size: .75rem;
    text-decoration: none;
    position: relative;
    z-index: 1;
}

.login__forgot:hover {
    color: rgb(17, 97, 237);
}
</style>

<script src="js/login.js?v=0.0.0.4"></script>

</html>