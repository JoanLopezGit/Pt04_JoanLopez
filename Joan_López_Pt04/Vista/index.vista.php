<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="../Estils/estils.css"> 
	<title>Articles</title>
</head>
<body>
	<?php include_once'../Controlador/index.php';
	session_start();?>
	<nav>
		<ul>
			<li class="active"><a href="../Vista/index.vista.php"><b>Articles</b></a></li>
			<?php if( isset( $_SESSION['newsession'])):?>
				<li ><a href="../Vista/create.vista.php">Create</a></li>
				<li><a href="../Vista/update.vista.php">Update</a></li>
				<li ><a href="../Vista/delete.vista.php">Delete</a></li>
				<li class="logs"><a href="../Controlador/exit.php" style="color: red;">Abandona</a></li>
				<li class="logs"><?php echo("Benvingut ".$_SESSION['nom'] );?></li>
			<?php else: ?>
				<li class="logs"><a href="../Vista/login.vista.php">Login</a></li>
				<li class="logs"><a href="../Vista/register.vista.php">Register</a></li>
            <?php endif; ?>
		</ul>
	</nav>
	<div class="contenidor">
		<h1>Articles</h1>
		<form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<input type="number" name="post_x_pag" placeholder="Articles per pàgina" min=1 
				value="<?php echo (!empty($_GET['post_x_pag'])) ? htmlspecialchars(stripslashes(trim($_GET['post_x_pag']))) : '' ?>">
		</form>
		<section class="articles"> 
			<ul>
					<?php foreach ($result as $article) { ?>
						<li><?php echo $article['id'] . ".- " . $article['article'] ?></li>
					<?php } ?>
			</ul>
		</section>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<section class="paginacio">
			<ul>
					<li <?php echo ($pagina === 1) ? "class=disabled" : "" ?>>
						<a href="<?php echo ($pagina !== 1) ? '?pagina=' . ($pagina-1) . '&post_x_pag=' . $post_per_pag : '#' ?>">&laquo;</a>
					</li> <!-- Decidim quan el botó "Anterior" estarà deshabilitat -->
					<?php for ($i=1; $i <= $maxim_pagines; $i++) { ?>
						<li <?php echo ($i===$pagina) ? "class=active" : "" ?>>
							<a href="<?php echo '?pagina=' . $i . '&post_x_pag=' . $post_per_pag ?>"><?php echo $i ?></a>
						</li>
					<?php } ?>
					<li <?php echo ($pagina == $maxim_pagines) ? "class=disabled" : "" ?>>
						<a href="<?php echo ($pagina != $maxim_pagines) ? '?pagina=' . ($pagina+1) . '&post_x_pag=' . $post_per_pag : '#' ?>">&raquo;</a>
					</li> <!-- Decidim quan el botó "Seguent" estarà deshabilitat -->	
			</ul>
		</section>
	</div>
</body>
</html>