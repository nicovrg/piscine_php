<?PHP
session_start();
$categories = unserialize(file_get_contents("htdocs/items/categories"));	
?>
<html>
<body>
	<p class="sidebar_title">Categories</p>
	<div class="main_sidebar">
		<div>
			<?php foreach($categories as $category => $value): ?>
				<div class="sidebar">
					<?=$value?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>
