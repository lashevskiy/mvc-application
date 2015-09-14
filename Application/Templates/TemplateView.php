<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BookStore</title>

	<?php include(BASE_PATH . D_CONFIG . "css.php"); ?>
	<?php include(BASE_PATH . D_CONFIG . "js.php"); ?>

</head>
<body>

<?php include("Header.php"); ?>
<?php include("Navigation.php"); ?>
<?php include("Aside.php"); ?>


<?php include D_VIEW . $content_view; ?>

<div class="clearfix"></div>
<?php include("Footer.php"); ?>

</body>
</html>