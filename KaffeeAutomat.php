<!DOCTYPE html>
<html>
<body>
<h1>Kaffeeautomat</h1>
<?php
$KaffeeSorten = ["Schwarz","Latte","Mocca","Espresso"];
$KaffeePreise = [       1 ,   1.2 ,   0.9 ,      0.8 ];
$MuenzSpeicher = 0;
if(isset($_POST["MuenzSpeicher"]))
	$MuenzSpeicher = $_POST["MuenzSpeicher"];

if ( isset($_POST["KaffeeWahl"]) )/*kaffee gewählt*/
{
	if (isset($_POST["MuenzEingabe"]))
	{
		$MuenzSpeicher += $_POST["MuenzEingabe"];
		//münzeingabe zum Münzspeicher hinzuzählen
	}
	
	if ( $MuenzSpeicher >= $KaffeePreise[$_POST["KaffeeWahl"]] ) //kaffee gewählt und bezahlt
	{
		
		$Restgeld = $MuenzSpeicher - $KaffeePreise[$_POST["KaffeeWahl"]];
		echo "<p>Danke für ihren Einkauf</p>\n";
		echo "<p>Restgeld: $Restgeld €</p>\n";
	}
	else
	{
		echo "<p>Der gewählte Kaffee ist: ". $KaffeeSorten[$_POST["KaffeeWahl"]] . "</p>\n";
		echo "<p>Bitte werfen sie Geld ein. Bisher eingeworfen $MuenzSpeicher €</p>\n";
		echo "<form method=\"post\" action=\"KaffeeAutomat.php\">\n";
		echo "<input type=\"hidden\" name=\"MuenzSpeicher\" value=\"$MuenzSpeicher\">\n" ;
		echo "<input type=\"hidden\" name=\"KaffeeWahl\" value=\"". $_POST["KaffeeWahl"] . "\">\n";
		echo "<input type=\"text\" name=\"MuenzEingabe\">\n";
		echo "<input type=\"submit\" value=\"OK\">\n</form>\n";
	}
}
else // kein kaffee gewählt, erster seitenaufbau
{
	echo "<form method=\"post\" action=\"KaffeeAutomat.php\">\n";
	echo "<select name=\"KaffeeWahl\">\n";
	for ( $i = 0 ; $i<4; ++$i)
	{
		echo "<option value=\"$i\">$KaffeeSorten[$i] - $KaffeePreise[$i] €</option>\n";
	}
	echo "</select>\n";
	echo "<input type=\"submit\" value=\"OK\">\n</form>";
}

?>
</body>
</html>