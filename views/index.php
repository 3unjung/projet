<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php require("../controllers/connexion.php"); ?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css">
<title>Acceuil</title>
</head>

<body>

	<div class="container-fluid">
		<!-- contenant tous le body -->

    <?php include("headermvc.php"); ?>
    <!-- importe l'header -->

		<!-- section -->
		<div class="col-xs=8 col-sm=8 col-md-8" id="section_de_la_page">
			<section>
				<h1 id="acceuil">Acceuil</h1>
				<h2> <strong>L'entreprise</strong>
				</h2>
				<p>Notre entreprise familiale met tous son savoir-faie a votre disposition dans le domaine du jardin et du paysagagisme.</p>
				<p>Créée il y'a 70 ans, notre enteprise vend des fleus, arbustes, maériel à main et motorisés.</p>
				<p>Implanté à Amiens, nous intevenon dans tous le département de la Somme: Albert, Dolens, Péronne, Abeerville, Corbie.</p>

				<h2><strong>Qualité</strong></h2>

				<p>Nous mettons à votre disposition un service personnalité, avec un 1 se interlocuteur durant tout votre projet</p>
				<p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>

				<h2> <strong>Devis gratuit</strong></h2>
				<p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour unnedemande d'intervention. Vous souhaite un devis? Nous vous le réliseront gratuitement.</p>
			</section>
		</div>

	</div>

	<div>

		<!-- footer-->
    <?php include("footer.php"); ?>
    <!-- importation du footer -->
	</div>
	
</body>

</html>