<?PHP

$todo = $_POST["todo"];
function custom_getcsv($arg)
{
	return (str_getcsv($arg, ';'));
}
if ($todo && $f = fopen("list.csv", 'r+'))
{
	$content = array_map('custom_getcsv', file("list.csv"));
	$content[] = array(uniqid(), $todo);
	foreach ($content as $line)
		fputcsv($f, $line, ";");
}
?>