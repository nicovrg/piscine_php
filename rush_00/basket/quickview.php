<?php
if ($_SESSION[basket]){
	foreach ($_SESSION[basket] as $key => $elem)
	{
		$recap_nb= $recap_nb + ($elem[quantity]);
		$total = $total + ($elem[price]);
	}
	echo "<br/><div style=\"font-size:30px\">$total_nb_prod <br/></div>";
	echo "<div> Total : $total €</div>";
}
else {
	echo "<br/><div style=\"font-size:20px;\">0<br/></div>";
	echo "<div> Total : 0 €  - Your basket is empty !</div>";
}
?>