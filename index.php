<?php 

	$token='h3h11432hbiu412';
	include("config.php");
	// exit($url);

	if($_GET['p'] == 'pesquisa'){	
		header("Location: https://forms.gle/Adi5fXeAcwwbzcRNA");
	}

	if(@$_GET['acao'] != ''){
		if(is_file('includes/'.$_GET['p'].'.php')){
			include('includes/'.$_GET['p'].'.php');
		}
	}

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="apple-mobile-web-app-capable" content="yes" /> 
		<meta name="mobile-web-app-capable" content="yes" />
		<title><?php echo $nomeCliente ?></title>
		<meta name="author" content="Gabriel De Luca - Cervejaria Santa Catarina" />
		<meta name="description" content="Lobos da Trilhas" />
		<meta property="og:image" content="img/logo.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="250">
        <meta property="og:image:height" content="250">
		<link rel="shortcut icon" href="<?php echo $url ?>img/logo.png"> 
    	<link rel="stylesheet" href="<?php echo $url ?>css/bootstrap.min.css" type="text/css">
    	<link rel="stylesheet" href="<?php echo $url ?>css/font-awesome.min.css" type="text/css">
    	<link rel="stylesheet" href="<?php echo $url ?>css/toastr.css" type="text/css">
  		<link rel="stylesheet" href="<?php echo $url ?>css/sweetalert2.css">
		<link rel="stylesheet" href="<?php echo $url ?>css/swiper-bundle.css">
 		<link rel="stylesheet" href="<?php echo $url ?>css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="<?php echo $url ?>css/style.css" type="text/css">
		<link rel="stylesheet" href="<?php echo $url ?>css/estilo.css?<?php echo time(); ?>" type="text/css">
	</head>
	<body>	
		<?php
			include('includes/header.php');
			if(@$_GET['p']=='' OR @$_GET['p'] == 'home'){      
	            include('includes/home.php');
	        } else {
	            if(is_file('includes/'.@$_GET['p'].'.php')){
	                include('includes/'.@$_GET['p'].'.php');  
	            } else {
	            	exit(loc($url));
	            }
	        }   
	        include('includes/footer.php');
		?>
		<script src="<?php echo $url ?>js/jquery.min.js"></script>
    	<script src="<?php echo $url ?>js/bootstrap.min.js"></script>
    	<script src="<?php echo $url ?>js/toastr.js"></script> 
  		<script src="<?php echo $url ?>js/sweetalert2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="<?php echo $url ?>js/bootstrap-datepicker.js"></script>    
		<script src="<?php echo $url ?>js/bootstrap-datepicker.pt-BR.min.js"></script>   
		<script src="<?php echo $url ?>js/script.js?<?php echo time(); ?>"></script>
	</body>
</html>
