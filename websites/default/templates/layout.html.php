
<!DOCTYPE html>
<html>


	<head>
		<title><?=$title?></title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
      integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
      crossorigin="anonymous"
    />
	</head>

	<body>
			<header class="header  text-white row py-1">
				<div class="logo col-4" id="logo" style="height:100px">
					<img src="/images/logo3.jpeg" style="height: -webkit-fill-available;" alt="">
				</div>
				<div class="banner col-8" id="banner">
					<h3 class="font-weight-bolder py-4">Woodlands University College</h3>
				</div>
			</header>

			<main class="main">
			<div>	<?php require 'search.html.php';	?></div>
			<div class="row">				
				<section class="left col-3">
					<?php require 'nav.html.php';	?>
				</section>
				<section class="content col-8">
					
				<?=$output?>
				
				</section>	
			</div>			
			</main>
			<footer class="primary-bg-color mt-2">
				<div class="container p-3 ">
					<p class="lead text-white text-center">&copy;WOODLANDS COLLEGE RMS 2020</p>
				</div>
			</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	</body>
</html>
