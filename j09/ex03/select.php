<?PHP
function custom_getcsv($arg)
{
	return (str_getcsv($arg, ';'));
}
if (isset($_GET['todo']))
{
	$content = array_map('custom_getcsv', file('list.csv'));
	echo json_encode($content);
}
?>
