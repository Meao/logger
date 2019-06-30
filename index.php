<meta charset="utf-8">
<h1>Working with log...</h1>

<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$f = '<h2>Form to fill</h2>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$r = htmlentities($_POST['message']) ?? 'Empty message';
	
	$f = fopen('log.txt', 'a');
	fwrite($f, $r);
	fwrite($f, "\n");
	fclose($f);
	
	$f = '<style>.right {width: 60%; margin-left: 35%; zoom: 80%}</style>';
	$f .= '<div class="right"><h2>Add another review</h2></div>';
	echo '<h3 style="color:green">Success! Data has been added, thank you.</h3>';
}

echo $f;
echo "<div class=\"right\">";
echo "<form method=\"post\" action=\"//{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}\" >";
echo <<<_END
			<div>
				<label>Message</label>
				<input id="message" name="message" required="required" type="text">
				<button type="submit">Send message</button>
			</div>
_END;
echo "</form></div>";
echo "<h2>Review list</h2>\n";
echo require_once('list.php');

?>