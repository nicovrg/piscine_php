<div>
	<p>Categories</p>
	<?php
		$categories = unserialize(file_get_contents("../htdocs/items/categories"));
		foreach ($categories as $category)
		{
			print_r($categories);
			echo ('<div class="sidebar">');
			echo ($category);
			echo ('</div>');
		}
	?>
</div>