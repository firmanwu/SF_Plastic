<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/style_menu.css');?>" type="text/css" charset="utf-8"/>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<ul id="navigation">
	    <li class="home"><a href="<?php echo site_url('home');?>"><span>Home</span></a></li>
        <li class="about"><a href="<?php echo site_url('materials_formulas/materials_formulas_management');?>"><span>Formulas/Materials</span></a></li>
        <li class="search"><a href="<?php echo site_url('daily_orders_formulas/daily_orders_formulas_management');?>"><span>Daily Production</span></a></li>
        <li class="photos"><a href="daily_orders_formulas_prod/daily_orders_formulas_production"><span>Mixing Process</span></a></li>
    </ul>
	<nav class="nav nav-pills" data-spy="affix" data-offset-top="205" style="margin-bottom: 15px;">
		<a class="nav-link" href='<?php echo site_url('formulas/formulas_management?origin=dayprod')?>'>Formulas</a> 
        <a class="nav-link" href='<?php echo site_url('daily_orders_formulas/daily_orders_formulas_management')?>'>Daily_orders/Formulas</a> 
        <a class="nav-link active" href='<?php echo site_url('daily_orders/daily_orders_management')?>'>Daily Orders</a>
	</nav>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <script type="text/javascript">
            $(function() {
                var d=300;
                $('#navigation a').each(function(){
                    $(this).stop().animate({
                        'marginTop':'-80px'
                    },d+=0);
                });

                $('#navigation > li').hover(
                function () {
                    $('a',$(this)).stop().animate({
                        'marginTop':'-2px'
                    },200);
                },
                function () {
                    $('a',$(this)).stop().animate({
                        'marginTop':'-80px'
                    },200);
                }
            );
            });
        </script>
</body>
</html>
