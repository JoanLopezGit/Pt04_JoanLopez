<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="../Estils/estils.css"> 
    <link rel="stylesheet" href="../Estils/miscEstils.css"> 
	<title>Register</title>
</head>
<body>
	<?php include_once'../Controlador/register.php' ?>
    <nav>
		<ul>
 			<li><a href="../Vista/index.vista.php"><b>Articles</b></a></li>
  			<li class="logs"><a href="../Vista/login.vista.php">Login</a></li>
			<li class="logs active"><a href="../Vista/register.vista.php">Register</a></li>
		</ul>
	</nav>
    <form action="../Controlador/register.php" method="post">
        <label><h1>Registre</h1></label>
            <br>
        <label> Nom d'usuari: <input type="text" required name="nom" maxlength="15" minlength="1" value="<?php if(isset($nom)){echo $nom;}?>">
            </label>
            <br>
        <label>Adreça electrònica:
                <input type="email" name="correu" maxlength="30" minlength="4" required value="<?php if(isset($correu)){echo $correu;}?>">
            </label>
            <br>
         <label>Contrasenya:
                <input type="password" name="password" required value="<?php if(isset($password)){echo $password;}?>">
        </label>
            <br>
            
            <label>Contrasenya:
                <input type="password" name="confirm_password" required value="<?php if(isset($confirm_password)){echo $confirm_password;}?>">
            </label>
            <?php if (!empty($errors)):?>
                <div><?php
                    echo "<p class='errors'>".$errors."</p>";
                    ?>
                </div>
            <?php endif ?>
            <?php if (!empty($msg_confirm)):?>
                <div><?php
                    echo "<p class='msg_confirm'>".$msg_confirm."</p>";
                    ?>
                </div>
            <?php endif ?>
            <input type="submit" value="Enviar">
        </form>
</body>
</html>