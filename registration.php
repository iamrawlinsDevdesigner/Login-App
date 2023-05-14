<?php
$mysql_server = 'localhost';
$mysql_username = 'freeuser';
$mysql_password = 'freepassword';
$mysql_database = 'loginapp';
$mysql_table = 'persons';
$success_page = './login.php';
$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'signupform')
{
   $newusername = $_POST['username'];
   $newemail = $_POST['email'];
   $newpassword = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];
   $newfullname = $_POST['fullname'];
   $code = 'NA';
   if ($newpassword != $confirmpassword)
   {
      $error_message = 'Password and Confirm Password are not the same!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $newusername))
   {
      $error_message = 'Username is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $newpassword))
   {
      $error_message = 'Password is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^[A-Za-z0-9-_!@$.' &]{1,50}$/", $newfullname))
   {
      $error_message = 'Fullname is not valid, please check and try again!';
   }
   else
   if (!preg_match("/^.+@.+\..+$/", $newemail))
   {
      $error_message = 'Email is not a valid email address. Please check and try again.';
   }
   if (empty($error_message))
   {
      $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
      if (!$db)
      {
         die('Failed to connect to database server!<br>'.mysqli_error($db));
      }
      mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
      mysqli_set_charset($db, 'utf8');
      $sql = "SELECT username FROM ".$mysql_table." WHERE username = '".$newusername."'";
      $result = mysqli_query($db, $sql);
      if ($data = mysqli_fetch_array($result))
      {
         $error_message = 'Username already used. Please select another username.';
      }
   }
   if (empty($error_message))
   {
      $crypt_pass = md5($newpassword);
      $newusername = mysqli_real_escape_string($db, $newusername);
      $newemail = mysqli_real_escape_string($db, $newemail);
      $newfullname = mysqli_real_escape_string($db, $newfullname);
      $sql = "INSERT `".$mysql_table."` (`username`, `password`, `fullname`, `email`, `active`, `code`, `role`) VALUES ('$newusername', '$crypt_pass', '$newfullname', '$newemail', 1, '$code', '')";
      $result = mysqli_query($db, $sql);
      mysqli_close($db);
      $subject = 'Your new account';
      $message = 'A new account has been setup.';
      $message .= "\r\nUsername: ";
      $message .= $newusername;
      $message .= "\r\nPassword: ";
      $message .= $newpassword;
      $message .= "\r\n";
      $header  = "From: webmaster@yourwebsite.com"."\r\n";
      $header .= "Reply-To: webmaster@yourwebsite.com"."\r\n";
      $header .= "MIME-Version: 1.0"."\r\n";
      $header .= "Content-Type: text/plain; charset=utf-8"."\r\n";
      $header .= "Content-Transfer-Encoding: 8bit"."\r\n";
      $header .= "X-Mailer: PHP v".phpversion();
      mail($newemail, $subject, $message, $header);
      header('Location: '.$success_page);
      exit;
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 16 - http://www.wysiwygwebbuilder.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="registration.css?v=4" rel="stylesheet">
</head>
<body>
   <div id="wb_LayoutGrid1">
      <div id="LayoutGrid1">
         <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2">
               <div class="col-2-padding">
                  <div id="wb_signupform">
                     <form name="signupform" method="post" action="<?php echo basename(__FILE__); ?>" accept-charset="UTF-8" id="signupform">
                        <div class="row">
                           <div class="col-1">
                              <div class="col-1-padding">
                                 <input type="submit" id="Button1" name="btn_register" value="Register">
                                 <input type="text" id="fullname" name="fullname" value="" spellcheck="false" placeholder="Fullname">
                                 <input type="text" id="username" name="username" value="" spellcheck="false" placeholder="Username">
                                 <input type="password" id="password" name="password" value="" spellcheck="false" placeholder="Password">
                                 <input type="password" id="confirmpassword" name="confirmpassword" value="" spellcheck="false" placeholder="Confirm Password">
                                 <input type="text" id="email" name="email" value="" spellcheck="false" placeholder="Email:">
                                 <input type="text" id="error" name="error" value="<?php echo $error_message; ?>" spellcheck="false">
                                 <input type="submit" id="signup" name="signup" value="Create User">
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-3">
            </div>
         </div>
      </div>
   </div>
</body>
</html>