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
<style>
        body{
            /*background:#fff url(assets/images/desc.png) no-repeat top center;*/
            font-family:Arial;
            height:2000px;
        }
        .header
        {
            width:600px;
            height:56px;
            position:absolute;
            top:50%;
            left:10px;
            /*background:#fff url(assets/images/title.png) no-repeat top left;*/
        }

        a.back{
            width:256px;
            height:73px;
            position:absolute;
            bottom:15px;
            right:15px;
            /*background:#fff url(assets/images/codrops_back.png) no-repeat top left;*/
        }
        a.dry{
            position:absolute;
            bottom:15px;
            left:15px;
            text-align:left;
            font-size:12px;
            color:#ccc;
            text-transform:uppercase;
            text-decoration:none;
        }
    </style>
<body>
	<div class="header"></div>
        <ul id="navigation">
            <li class="home"><a href="<?php echo site_url('home');?>"><span>首頁</span></a></li>
        <li class="about"><a href="<?php echo site_url('materials_formulas/materials_formulas_management');?>"><span>配方原料管理</span></a></li>
        <li class="search"><a href="<?php echo site_url('daily_orders_formulas/daily_orders_formulas_management');?>"><span>生產排程管理</span></a></li>
        <!-- <li class="photos"><a href="<?php echo site_url('daily_orders_formulas_prod/daily_orders_formulas_production');?>"><span>混料作業管理</span></a></li> -->
        </ul>
	<nav class="nav nav-pills" data-spy="affix" data-offset-top="205" style="margin-bottom: 15pxpx;">
		<a class="nav-link" href='<?php echo site_url('formulas/formulas_management?origin=dayprod')?>'>配方管理</a> 
		<a class="nav-link active" href='<?php echo site_url('daily_orders_formulas/daily_orders_formulas_management')?>'>生產排程</a> 
	</nav>
	<div style='height:40px;'></div>  
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
