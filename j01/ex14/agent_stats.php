#!/usr/bin/php
<?php
function 	get_array()
{
	$i = 0;
	while (feof(STDIN) !== true)
	{
		$array[$i] = trim(fgets(STDIN));
		$i++;
	}
	array_shift($array);
	array_pop($array);
	return ($array);
}

function 	moyenne()
{
	$array = get_array();
	foreach ($array as &$line)
	{
		$tmp = explode(";", $line);
		$line = $tmp[1];
	}
	$array = array_values(array_filter($array, 'strlen'));
	$nb_note = 0;
	$sum = 0;
	foreach ($array as &$note)
	{
		$sum = $sum + $note;
		$nb_note++;
	}
	$nb_note--;
	$moyenne = $sum / $nb_note;
	// print ($sum."\n");
	// print ($moyenne."\n");
	// print ($nb_note."\n");
	// print_r($array);
	echo ($moyenne."\n");
}

function 	moyenne_user()
{
	$array = get_array();
	$array1 = $array;
	$array2 = $array;
	foreach ($array1 as &$line)
	{
		$tmp = explode(";", $line);
		$line = $tmp[0];
	}
	foreach ($array2 as &$line)
	{
		$tmp = explode(";", $line);
		$line = $tmp[1];
	}
	$array1 = array_values(array_filter($array1, 'strlen'));
	$array2 = array_values(array_filter($array2, 'strlen'));
	$array3 = array();
	foreach ($array1 as $student)
	{
		$i = 0;
		$j = 0;
		while ($array3[$i])
		{
			if ($array3[$i] == $student)
				$j++;
			$i++;
		}
		if ($j == 0)
			array_push($array3, $student);
		// if ($array3[$student])
		// print ($array3['$student']."\n");
	}
	print_r($array3);
}

// function 	moyenne_user()
// {
// 	$array = get_array();
// 	$array1 = $array;
// 	$array2 = $array;
// 	foreach ($array1 as &$line)
// 	{
// 		$tmp = explode(";", $line);
// 		$line = $tmp[0];
// 	}
// 	foreach ($array2 as &$line)
// 	{
// 		$tmp = explode(";", $line);
// 		$line = $tmp[1];
// 	}
// 	$array1 = array_values(array_filter($array1, 'strlen'));
// 	$array2 = array_values(array_filter($array2, 'strlen'));
// 	$array3 = array();
// 	foreach ($array1 as $student)
// 	{
// 		// print ($student);
// 		$i = 0;
// 		foreach($array3 as $exist)
// 		{
// 			if ($exist != NULL)
// 				$i++;
// 		}
// 		if ($i == 0)
// 			array_push($array3, $student);
// 		// print ($array3[$student]);
// 		// if ($array3[$student])
// 		// print ($array3['$student']."\n");
// 	}
// 	print_r($array3);
// }

function 	ecart_moulinette()
{

}

if ($argc == 2)
{
	if ($argv[1] === "moyenne")
		moyenne();
	if ($argv[1] === "moyenne_user")
		moyenne_user();
	if ($argv[1] === "ecart_moulinette")
		ecart_moulinette();
	return (0);
}
else
{
	echo ("\n");
	return (0);
}
?>
