<?php 
require_once "config.php";
require_once "regscript.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<meta name="generator" content="WYSIWYG Web Builder 16 - http://www.wysiwygwebbuilder.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="registration.css?v=57" rel="stylesheet">
</head>
<body>
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