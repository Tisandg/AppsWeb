<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>App Restaurante</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600">        
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
    
        <!-- Loader -->
    	<div class="loader">
    		<div class="loader-img"></div>
    	</div>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav right">
						<li><a class="scroll-link" href="#top-content">Iniciar sesion</a></li>
						<li><a class="scroll-link" href="#services">Registrarse</a></li>
					</ul>
					<div class="navbar-text navbar-right">
						<a href="#">Iniciar sesion</a>
						<a href="#">Registrarse</a>
					</div>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        	<div class="logo wow fadeInDown">
                        		<a href="index.html"></a>
                        	</div>
                            <h1 class="wow fadeInLeftBig">Sistema de gestion de restaurantes</h1>
                            <div class="description wow fadeInLeftBig">
                            	<p>
	                            	@yield ('content')
                            	</p>
                            </div>
                            <div class="top-big-link wow fadeInUp">
                            	<a class="btn btn-link-1" href="">Iniciar sesion</a>
                            	<a class="btn btn-link-2 scroll-link" href="">Registrarse</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
       
        <!-- Footer -->
        <footer class="footer-container">
	        <div class="container">
	        	<div class="row">
	        		
                    <div class="col-sm-6 footer-left">
                    	<h3>Contact us</h3>
                    	<div class="contact-form">
                    		<form role="form" action="assets/contact.php" method="post">
		                    	<div class="form-group">
		                    		<label class="sr-only" for="contact-email">Email</label>
		                        	<input type="text" name="email" placeholder="Email..." class="contact-email form-control" id="contact-email">
		                        </div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="contact-subject">Subject</label>
		                        	<input type="text" name="subject" placeholder="Subject..." class="contact-subject form-control" id="contact-subject">
		                        </div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="contact-message">Message</label>
		                        	<textarea name="message" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
		                        </div>
		                        <button type="submit" class="btn">Send message</button>
		                    </form>
                    	</div>
                    </div>
                    
                    <div class="col-sm-5 col-sm-offset-1 footer-right">
                    	<h3>Follow us</h3>
                    	<div class="footer-social">
                    		<a href="#"><i class="fa fa-facebook"></i></a>
	                    	<a href="#"><i class="fa fa-dribbble"></i></a>
	                    	<a href="#"><i class="fa fa-twitter"></i></a>
	                    	<a href="#"><i class="fa fa-instagram"></i></a>
	                    	<a href="#"><i class="fa fa-pinterest"></i></a>
                    	</div>
                    	<div class="footer-copyright">
                    		&copy; Maren One Page Bootstrap Template <br>Download it for free on <a href="http://azmind.com">AZMIND</a>
                    	</div>
                    </div>
                    
                </div>
	        </div>
	        
	        <div class="container-fluid">
	        	<div class="row">
                	<div class="col-sm-12 footer-bottom">
                		<a class="scroll-link" href="#top-content"><i class="fa fa-chevron-up"></i></a>
                	</div>
                </div>
	        </div>
        </footer>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>