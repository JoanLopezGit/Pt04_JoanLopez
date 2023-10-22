<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="../Estils/estils.css">
    <link rel="stylesheet" type="text/css" href="../Estils/miscEstils.css">
    <title>Update</title>
</head>
<body>
    <?php if( !isset( $_SESSION['newsession'])){session_start();} ?>
    <?php if( !isset( $_SESSION['newsession'])){
	    header("Location: ../Vista/index.vista.php");
        exit();}
    ?>
    <nav>
		<ul>
			<li ><a href="../Vista/index.vista.php"><b>Articles</b> </a></li>
			<?php if( isset( $_SESSION['newsession'])):?>
				<li ><a href="../Vista/create.vista.php">Create</a></li>
				<li class="active"><a href="../Vista/update.vista.php">Update</a></li>
				<li ><a href="../Vista/delete.vista.php">Delete</a></li>
				<li class="logs"><a href="../Controlador/exit.php" style="color: red;">Abandona</a></li>
				<li class="logs"><?php echo("Benvingut ".$_SESSION['nom'] );?></li>
            <?php endif; ?>
		</ul>
	</nav>
    <div class="container">
        <div>
        <h1 class="box">Modifica un article</h1>
        </div>
        <div class="principalBox">
            <form action="../Controlador/update.php" method="post">
                <br>
                <label>
                Número d'article(id):<input type="text" name="id_article" required value="<?php if(isset($idArticle)){echo $idArticle;}?>">
                </label>
                <br>
                <label>
                    Descripció:<input type="text" name="article" maxlength="50" minlength="3" required value="<?php if(isset($article)){echo $article;}?>">
                </label>
                <br>
                <?php if (!empty($errors)):?>
                    <div><?php
                        echo "<p class='errors resultado'>".$errors."</p>";
                        ?>
                    </div>
                <?php endif ?>
                <?php if (!empty($msg_confirm)):?>
                    <div><?php
                        echo "<p class='msg_confirm resultado'>".$msg_confirm."</p>";
                        ?>
                    </div>
                <?php endif ?>
                <br>
                <div>
                    <input type="submit" value="Enviar" onclick="return confirm('Segur que vols modificar un article?')">
                </div>
            </form>
                
        </div>
    </div>
</body>
</html>