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

function 	get_all_students($array)
{
	foreach ($array as &$line)
	{
		$tmp = explode(";", $line);
		$line = $tmp[0];
	}
	$array = array_values(array_filter($array, 'strlen'));
	return ($array);
}

function 	get_unique_student($array)
{
	$new_array = array();
	foreach ($array as $student)
	{
		$i = 0;
		$j = 0;
		while ($new_array[$i])
		{
			if ($new_array[$i] == $student)
				$j++;
			$i++;
		}
		if ($j == 0)
			array_push($new_array, $student);
	}
	return ($new_array);
}

function 	get_all_grades($array)
{
	foreach ($array as &$line)
	{
		$tmp = explode(";", $line);
		$line = $tmp[1];
	}
	return ($array);
}

function 	sum_grade_unique_student($array)
{
	foreach ($array as $val)
	{
		array_push($sum_grade_unique_student, 0);
	}
	return ($sum_grade_unique_student);
}

function 	get_sum_grade_unique_student($all_students, $unique_students, $all_grades)
{
	$k = 0;
	$sum_grade_unique_student = array();
	foreach ($unique_students as $unique)
	{
		foreach ($all_students as $all)
		{
			if ($unique == $all)
			{
				if (is_numeric($all_grades[$k]))
					$sum_grade_unique_student[$k] = $sum_grade_unique_student[$k] + $all_grades[$k]; 
			}
		}
		$k++;
	}
	return ($sum_grade_unique_student);
}

function 	get_number_grade($unique_students, $all_students)
{
	$i = 0;
	$k = 0;
	foreach ($unique_students as $student)
	{
		while ($all_students[$i])
		{
			$j = 0;
			while ($unique_students[$j])
			{
				if ($unique_students[$j] == $student)
				$k++;
				$j++;
			}
			$i++;
		}
	}
	array_push($number_grade, $j);
	return ($number_grade);
}

function 	moyenne_user()
{
	$array = get_array();
	$all_students = get_all_students($array);
	$all_grades = get_all_grades($array);
	$unique_students = get_unique_student($all_students);
	$sum_grade_unique_student = get_sum_grade_unique_student($all_students, $unique_students, $all_grades);
	$number_grade = get_number_grade($unique_students, $all_students);

	// print_r($all_students);
	// print_r($unique_students);
	// print_r($all_grades);
	// print_r($sum_grade_unique_student);
	print_r($number_grade);
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
