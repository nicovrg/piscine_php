<?PHP
	session_start();
	$categories = unserialize(file_get_contents("../htdocs/items/categories"));	
?>
<html>
<body>
<div>
	<p>Categories</p>
		<div>
			<?php foreach($categories as $category => $value): ?>
				<p>
					<?=$value?>
				</p>
			<?php endforeach; ?>
		</div>
</div>
</body>
</html>
