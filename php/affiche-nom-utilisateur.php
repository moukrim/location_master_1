<?php
//yassine
 if (isset($_SESSION['prenom'])) {

echo(' <div id="moncompte">
			<span class="label label-primary" style="float:right;">Bonjour '.$_SESSION["prenom"].'</span>
			<a href="mon-compte.php"><span class="label label-warning" style="float:right;">Votre compte</span></a>
	</div>');
}?>