<?PHP
if ($_POST['id'] != NULL)
{
	$file = file("./list.csv");
    $count = 0;
    foreach($file as $line)
    {
        $infos = explode(";", $line);
        if ($infos[0] == $_POST['id'])
        {
			unset($file[$count]);
			array_values($file);
            break;
        }
        $count++;
    }
    file_put_contents("./list.csv", $file);
    exit();
}
?>