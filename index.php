
<!--Faris Wijaya & Guntarto Budi Rohmadi (Sept 17, 2014)-->
<!--Faris Wijaya & Guntarto Budi Rohmadi (Sept 17, 2014)-->
<?php
session_start();
	$_SESSION['USERNAME'] 		= '';
	$_SESSION['NAMA_DEPAN'] 	= '';
	$_SESSION['NAMA_BELAKANG'] 	= '';
	$_SESSION['DEPARTEMEN'] 	= '';
	$_SESSION['LEVEL'] 			= '';
	$_SESSION['TIMEOUT']		= '';
session_destroy();
?>
<!DOCTYPE html>
<html lang="en" style="background-color: #33384d;">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height,initial-scale=1">
    <title>SMART FCA</title>
	<link rel="shortcut icon" href="image/logo.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color: #33384d;">
  
<!--Start-->
<!--Start-->
<!--Start-->
<!--Start-->
<!--Start-->

    <!--  sgtartnavbar 
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="zcontainer">
        <div class="navbar-header">          
          <!--<span class="navbar-brand" ><span class="glyphicon glyphicon-calendar">&nbsp</span>SMART FCA</span>-->

      <!--  </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a  href="#"><span class="glyphicon glyphicon-cog">&nbsp</span>Help</a></li>
          </ul>
        </div>
      </div>
    </div>-->

    <!--  endnavbar -->
    
    
    <!--  endnavbar -->
    <div id="zpage-wrap">
    <center style="color:#fff; "><h2><span class="glyphicon glyphicon-book" style="">&nbsp</span>SMART FCA</h2></center>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp</span>Login</h3>
		  </div>
		  <div class="panel-body">
		  
		  	<form>
			 <!--  Panel content -->
					    <div class="row">	
		  <!--  Username -->		    	  		  	  
			</div><!-- /.row -->
			 <!--  Panel content -->
					    <div class="row">	
		  <!--  Username  -->		  
			  <div class="col-lg-12">
			    <div class="input-group">
			      <span class="input-group-addon">Username</span>
				  <input type="text" class="form-control" placeholder="Username" id="username" value="610281"/>
			    </div><!-- /input-group  --> 
			  </div><!-- /.col-lg-6 -->		  	  		  	  
			</div><!-- /.row -->
					
			 <!--  Panel content -->
					    <div class="row">	
		 <!--  Password -->		  
			  <div class="col-lg-12">
			    <div class="input-group">
			      <span class="input-group-addon">Password&nbsp</span>
				  <input type="Password" class="form-control" placeholder="Password" id="password" value="12345"/>
                </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->		  	  		  	  
			</div><!-- /.row -->

					    <div class="row">	
			  <div class="col-lg-12" align="center">
			    <div class="input-group">
			      <div class="login_result" id="login_result"></div>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->		
            </div>
		 <!--  Password 	  
			  <div class="col-lg-12">
			    <div class="input-group">
                  <input type="submit" name="login" id="login" value="Login &raquo;" />
			    </div><!-- /input-group 
			  </div><!-- /.col-lg-6   	  	  	  
			</div><!-- /.row -->
            <center>
            <div class="btn-group btn-group-justified">
            <div class="btn-group"> 
              <button type="button" class="btn btn-default" name="login" id="login">Submit</button>
             
            </div> </div></center>
            
			</form>
		  </div>
		</div>
    </div>

<!--	
	 <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>-->
	
<!--End-->
<!--End-->
<!--End-->
<!--End-->
<!--End-->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     <!-- Menu Toggle Script -->
<!--    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $('.datepicker').datepicker({
		    format: 'mm/dd/yyyy',
		    startDate: '-3d'
		})
     });
    </script>-->
<script type="text/javascript">
$(document).ready(function(){
	$('#username').focus(); // Focus to the username field on body loads
	$('#login').click(function(){ // Create `click` event function for login
		var username = $('#username'); // Get the username field
		var password = $('#password'); // Get the password field
		var login_result = $('.login_result'); // Get the login result div
		//login_result.html("<img src='image/loading.gif'/>"); // Set the pre-loader can be an animation
		if(username.val() == ''){ // Check the username values is empty or not
			username.focus(); // focus to the filed 
			$('#username').val("Enter the username");
			//login_result.html('<span class="error">Enter the username</span>'); 
			var div = $("#username").parents("div.input-group");//$("#cek_username");//.parents("div.control-group");
			div.addClass("has-error");
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			//login_result.html('<span class="error">Enter the password</span>');
			$('#password').val("Enter the password");
			var div = $("#password").parents("div.input-group");//$("#cek_username");//.parents("div.control-group");
			div.addClass("has-error");
			return false;
		}
		if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'admin/destination.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					var div = $("#username").parents("div.input-group");//$("#cek_username");//.parents("div.control-group");
					div.addClass("has-error");
					$('#username').val("");
					var div = $("#password").parents("div.input-group");//$("#cek_username");//.parents("div.control-group");
					div.addClass("has-error");
					$('#password').val("");
					login_result.html('<span class="error">Username or Password Incorrect!</span>');
				}
				else if(responseText == 1){
					window.location = 'dashboard.php?select=1';
				}
				else{
					//alert('Problem with sql query');
					alert(responseText);
					login_result.html('');
					username.val('');
					password.val('');
				}
			}
			});
		}
		return false;
	});
});
</script>
  </body>
</html>