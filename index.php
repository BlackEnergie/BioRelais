<?php
include_once 'modeles/hydrate.php';
require_once 'auto/autoload.php';
session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>BioRelais</title>
        <link rel="icon" href="images/trefle.jpg" />
		<style type="text/css">
			@import url(styles/bioRelais.css);
		</style>
	</head>
	<body>
		<?php
			include_once 'controleurs/controleurPrincipal.php';
		?>
	</body>
</html>