<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<nav class="nav nav-pills" data-spy="affix" data-offset-top="205">
		<a class="nav-link" href='<?php echo site_url('formulas/formulas_management')?>'>Formulas</a> 
		<a class="nav-link active" href='<?php echo site_url('materials_formulas/materials_formulas_management')?>'>Materials/Formulas</a> 
		<a class="nav-link" href='<?php echo site_url('materials/materials_management')?>'>Materials</a> 
	</nav>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
