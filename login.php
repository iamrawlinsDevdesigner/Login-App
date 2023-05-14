<?php
$database = './usersdb.php';
$success_page = '';
$error_message = "";
if (!file_exists($database))
{
   die('User database not found!');
   exit;
}
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
   $items = file($database, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   foreach($items as $line)
   {
      list($username, $password, $email, $fullname) = explode('|', trim($line));
      if ($newusername == $username)
      {
         $error_message = 'Username already used. Please select another username.';
         break;
      }
   }
   if (empty($error_message))
   {
      $file = fopen($database, 'a');
      fwrite($file, $newusername);
      fwrite($file, '|');
      fwrite($file, md5($newpassword));
      fwrite($file, '|');
      fwrite($file, $newemail);
      fwrite($file, '|');
      fwrite($file, $newfullname);
      fwrite($file, '|1|');
      fwrite($file, $code);
      fwrite($file, "\r\n");
      fclose($file);
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
<link href="login.css?v=5" rel="stylesheet">
</head>
<body>
   <div id="wb_Signup1">
      <form name="signupform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="signupform">
         <input type="hidden" name="form_name" value="signupform">
         <table id="Signup1">
            <tr>
               <td class="header">Sign up for a new account</td>
            </tr>
            <tr>
               <td class="label"><label for="fullname">Full Name</label></td>
            </tr>
            <tr>
               <td class="row"><input class="input" name="fullname" type="text" id="fullname"></td>
            </tr>
            <tr>
               <td class="label"><label for="username">User Name</label></td>
            </tr>
            <tr>
               <td class="row"><input class="input" name="username" type="text" id="username"></td>
            </tr>
            <tr>
               <td class="label"><label for="password">Password</label></td>
            </tr>
            <tr>
               <td class="row"><input class="input" name="password" type="password" id="password"></td>
            </tr>
            <tr>
               <td class="label"><label for="confirmpassword">Confirm Password</label></td>
            </tr>
            <tr>
               <td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td>
            </tr>
            <tr>
               <td class="label"><label for="email">E-mail</label></td>
            </tr>
            <tr>
               <td class="row"><input class="input" name="email" type="text" id="email"></td>
            </tr>
            <tr>
               <td><?php echo $error_message; ?></td>
            </tr>
            <tr>
               <td id="wb_uid0"><input class="button" type="submit" name="signup" value="Create User" id="signup"></td>
            </tr>
         </table>
      </form>
   </div>
   <div id="wb_LayoutGrid1">
      <div id="LayoutGrid1">
         <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2">
               <div class="col-2-padding">
                  <div id="wb_LayoutGrid2">
                     <form name="registerform" method="post" action="" accept-charset="UTF-8" id="LayoutGrid2">
                        <div class="row">
                           <div class="col-1">
                              <div class="col-1-padding">
                                 <input type="text" id="Editbox1" name="fullname" value="" spellcheck="false" placeholder="Full Name:">
                                 <input type="text" id="Editbox2" name="email" value="" spellcheck="false" placeholder="Email:">
                                 <input type="password" id="Editbox3" name="password" value="" spellcheck="false" placeholder="Password:">
                                 <input type="password" id="Editbox4" name="repeatpassword" value="" spellcheck="false" placeholder="Repeat Password">
                                 <input type="submit" id="Button1" name="btn_register" value="Register">
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