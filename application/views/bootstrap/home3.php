<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>樹脂生產管理系統</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="assets/css/style_menu.css" type="text/css" charset="utf-8"/>
<!--         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
 -->
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
            <li class="home"><a href="#"><span>首頁</span></a></li>
            <li class="about"><a href="materials_formulas/materials_formulas_management"><span>配方原料管理</span></a></li>
            <li class="search"><a href="daily_orders_formulas/daily_orders_formulas_management"><span>生產排程管理</span></a></li>
            <li class="photos"><a href=""><span>混料作業</span></a></li>
            <!-- <li class="rssfeed"><a href=""><span>Rss Feed</span></a></li>
            <li class="podcasts"><a href=""><span>Podcasts</span></a></li>
            <li class="contact"><a href=""><span>Contact</span></a></li> -->
        </ul>
        <div class="logo">
            <img src="assets/images/generic_logo.jpg" alt="logo" class="img-logo">
        </div>

        <!-- <div class="info">
            <a class="back" href="http://tympanus.net/codrops/2009/12/08/beautiful-slide-out-navigation-revised/"></a>
            <a class="dry" href="http://dryicons.com">Icons by DryIcons.com</a>
        </div> -->

        <script type="text/javascript" src="assets/jquery/jquery-3.3.1.js"></script>
        <script type="text/javascript">
            $(function() {
                var d=300;
                $('#navigation a').each(function(){
                    $(this).stop().animate({
                        'marginTop':'-80px'
                    },d+=150);
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