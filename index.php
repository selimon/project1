<?php
include_once 'config.php';

if (isset($_GET['act']) AND $_GET['act'] == 'logout')
{
	setcookie('username', '', time()-1, '/');
	setcookie('password', '', time()-1, '/');
	
	header('Location: index.php');
	die();
}

$logged = 0;

$mysqli = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
mysqli_query($mysqli, "SET NAMES utf8");

if (isset($_COOKIE['username']) AND isset($_COOKIE['password']))
{
	$auth_query = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM users WHERE login='".$_COOKIE['username']."' AND password='".$_COOKIE['password']."'"));
	
	if ($auth_query['id'] > 0)
	{
		$logged = 1;
		$user = $auth_query;
	}
}

if (isset($_POST['act']) AND $_POST['act'] == 'login' AND $logged == 0)
{
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$passwd = mysqli_real_escape_string($mysqli, $_POST['passwd']);
	
	$auth_query = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `users` WHERE login = '$username' AND password='".md5($passwd)."'"));
	
	if ($auth_query['id'] > 0)
	{
		setcookie("username", $username, time()+3600*24*7, "/");
		setcookie("password", md5($passwd), time()+3600*24*7, "/");
		
		header('Location: ../../../index.php');
		die();
	}
	else
	{
		$auth_error = 1;
	}
}

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html dir="ltr" lang="ru-ru">
<head>
    <xbasehref="http://obmen.tw1.ru/" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="title" content="Bitcoin Invest" />
    <meta name="author" content="Administrator" />
    <meta name="description" content="Начинайте зарабатывать деньги от 9000 рублей ежедневно прямо сейчас.
Заработок на дому всем желающим вместе с &quot;Bitcoin Invest&quot;" />
    <meta name="generator" content="Joomla! 1.5 - Open Source Content Management; jQuery++ Intergator by tushev.org" />
    <title>Bitcoin Invest</title>
    <link href="templates/bitcoin11/favicon.ico.png" tppabs="http://obmen.tw1.ru/templates/bitcoin11/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="plugins/system/cdscriptegrator/libraries/highslide/css/highslide.css" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/highslide/css/highslide.css" type="text/css" />
    <link rel="stylesheet" href="components/com_jcomments/tpl/default/style.css-v=21.css" tppabs="http://obmen.tw1.ru/components/com_jcomments/tpl/default/style.css?v=21" type="text/css" />
    <link rel="stylesheet" href="media/plg_vtemtooltip/css/jquery.qtip.css" tppabs="http://obmen.tw1.ru/media/plg_vtemtooltip/css/jquery.qtip.css" type="text/css" />
    <link rel="stylesheet" href="modules/mod_jmlogin/mod_jmlogin.css.php.css" tppabs="http://obmen.tw1.ru/modules/mod_jmlogin/mod_jmlogin.css.php" type="text/css" />
    <link rel="stylesheet" href="modules/mod_jmlogin/styles/horizontal/yellow/style.css" tppabs="http://obmen.tw1.ru/modules/mod_jmlogin/styles/horizontal/yellow/style.css" type="text/css" />
    <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/highslide/js/highslide-full.min.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/highslide/js/highslide-full.min.js"></script>
    <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/jquery/js/jquery-1.4.2.min.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/jquery/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/jquery/js/jquery-noconflict.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/jquery/js/jquery-noconflict.js"></script>
    <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/jquery/js/ui/jquery-ui-1.8.2.custom.min.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/jquery/js/ui/jquery-ui-1.8.2.custom.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/system/jqueryintegrator/jquery.noconflict.js" tppabs="http://obmen.tw1.ru/plugins/system/jqueryintegrator/jquery.noconflict.js"></script>
    <script type="text/javascript" src="components/com_jcomments/js/jcomments-v2.3.js-v=8.js" tppabs="http://obmen.tw1.ru/components/com_jcomments/js/jcomments-v2.3.js?v=8"></script>
    <script type="text/javascript" src="components/com_jcomments/libraries/joomlatune/ajax.js-v=4.js" tppabs="http://obmen.tw1.ru/components/com_jcomments/libraries/joomlatune/ajax.js?v=4"></script>
    <script type="text/javascript" src="media/system/js/mootools.js" tppabs="http://obmen.tw1.ru/media/system/js/mootools.js"></script>
    <script type="text/javascript" src="media/system/js/caption.js" tppabs="http://obmen.tw1.ru/media/system/js/caption.js"></script>
    <script type="text/javascript" src="media/plg_vtemtooltip/js/jquery.qtip.js" tppabs="http://obmen.tw1.ru/media/plg_vtemtooltip/js/jquery.qtip.js"></script>
    <script type="text/javascript">

        <!--
        hs.graphicsDir = '/plugins/system/cdscriptegrator/libraries/highslide/graphics/';
        hs.outlineType = 'rounded-white';
        hs.outlineWhileAnimating = false;
        hs.showCredits = false;
        hs.expandDuration = 450;
        hs.anchor = 'auto';
        hs.align = 'center';
        hs.transitions = ["fade"];
        hs.dimmingOpacity = 0.5;
        hs.lang = {
            loadingText :     'Загрузка...',
            loadingTitle :    'Нажмите для отмены',
            focusTitle :      'Нажмите для возврата',
            fullExpandTitle : 'Расширение до фактических размеров',
            fullExpandText :  'Полный размер',
            creditsText :     'Сделано на Highslide JS',
            creditsTitle :    'Перейти на Highslide JS страницу',
            previousText :    'Предыдущий',
            previousTitle :   'Предыдущий(стрелка влево)',
            nextText :        'Следующий',
            nextTitle :       'Следующий(стрелка вправо)',
            moveTitle :       'Перемещение',
            moveText :        'Перемещение',
            closeText :       'Закрыть',
            closeTitle :      'Закрыть(esc)',
            resizeTitle :     'Изменить размеры',
            playText :        'Игра',
            playTitle :       'Проиграть слайдшоу (spacebar)',
            pauseText :       'Пауза',
            pauseTitle :      'Пауза слайдшоу (spacebar)',
            number :          'Картинка %1 of %2',
            restoreTitle :    'Нажмите, чтобы закрыть изображение. Нажмите и удерживайте кнопку мыши, чтобы переместить изображение. Используйте стрелки влево и вправо, чтобы переходить на следующее и предыдущее изображение.'
        };
        //-->

    </script>

    <link rel="stylesheet" href="templates/system/css/system.css" tppabs="http://obmen.tw1.ru/templates/system/css/system.css" />
    <link rel="stylesheet" href="templates/system/css/general.css" tppabs="http://obmen.tw1.ru/templates/system/css/general.css" />

    <!-- Created by Artisteer v4.0.0.58475 -->




    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js" tppabs="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="templates/bitcoin11/css/template.css" tppabs="http://obmen.tw1.ru/templates/bitcoin11/css/template.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="templates/bitcoin11/css/template.ie7.css" tppabs="http://obmen.tw1.ru/templates/bitcoin11/css/template.ie7.css" media="screen" /><![endif]-->


    <script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
    <script src="templates/bitcoin11/jquery.js" tppabs="http://obmen.tw1.ru/templates/bitcoin11/jquery.js"></script>
    <script>jQuery.noConflict();</script>

    <script src="templates/bitcoin11/script.js" tppabs="http://obmen.tw1.ru/templates/bitcoin11/script.js"></script>
    <script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
</head>
<body>




<div id="art-main">
    <div class="art-sheet clearfix">
        <header class="art-header clearfix">


            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="65" style="opacity: 0.5" alt="" /></div1>
            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="75" style="opacity: 0.3" alt="" /></div1>

            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="60" style="opacity: 0.5" alt="" /></div1>
            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="50" style="opacity: 0.6" alt="" /></div1>
            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="40" style="opacity: 0.7" alt="" /></div1>
            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="30" style="opacity: 0.8" alt="" /></div1>
            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="55" style="opacity: 0.7" alt="" /></div1>
            <div1><img src="images/stories/bitcoin.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin.png" width="45" style="opacity: 0.4" alt="" /></div1>






            <div class="art-shapes">
















            </div>



        </header>









        <div class="test5"><div style="padding:732px 0 0 366px;"><img src="images/stories/ikran.png" tppabs="http://obmen.tw1.ru/images/stories/ikran.png" alt="" /></div>
            <div style="padding:20px 0 0 475px;"><img src="images/stories/tk7.gif" tppabs="http://obmen.tw1.ru/images/stories/tk7.gif" width="70" style="opacity: 0.5" alt="" /></div></div>





        <div class="test1"><div style="padding:0px 0px 0px 20px;"><img src="images/stories/57c5be9861f5302a33116316_bitcoin-rotate.gif" tppabs="http://obmen.tw1.ru/images/stories/57c5be9861f5302a33116316_bitcoin-rotate.gif" border="0" width="180" /></div></div>
        <div class="test10"><a href="vopros.htm" tppabs="http://obmen.tw1.ru/vopros" class="button5 brown"><div class="light"  style="width: 38px;"></div>Вопросы</a></div>
        <div class="test11"><a href="otzivi.htm" tppabs="http://obmen.tw1.ru/otzivi" class="button5 brown"><div class="light" "></div>Отзывы</a></div>
    <div class="test12"><a href="kontakti.htm" tppabs="http://obmen.tw1.ru/kontakti" class="button5 brown"><div class="light"></div>Контакты</a></div>
    
	<?php if (isset($auth_error) AND $auth_error == 1) { ?><div class="test20" style="color:red; font-size:14px; font-weight:700; top:200px; left:125px;">Неправильный логин или пароль.</div><?php } ?>


    <div class="test3">
		<?php if ($logged == 1) { ?>
		<div class="userinfo ">Здравствуйте, <?=$user['name'];?> <a class="button1" href="index.php?act=logout">Выход</a></div>
		<?php } ?>

		<?php if ($logged == 0) { ?>
        <form method="post" name="login">

<span class="horizontal" style="display: block;">
	<span class="jm-login">



		<span class="login">


			<span class="username">

				<input type="text" name="username" size="18" alt="Логин" value="Логин" onblur="if(this.value=='') this.value='Логин';" onfocus="if(this.value=='Логин') this.value='';" />

			</span>


			<span class="password">

				<input type="password" name="passwd" size="10" alt="Пароль" value="Пароль" onblur="if(this.value=='') this.value='Пароль';" onfocus="if(this.value=='Пароль') this.value='';" />
							</span>

						<input type="hidden" name="remember" value="yes" />

			<span class="login-button-icon">
				<button value="" name="Submit" type="submit" title="Вход"></button>
							</span>






				<input type="hidden" name="act" value="login" />
	</span>
</span>
        </form>
		<?php } ?>
		
		
		</div>
    <div class="test8"><a href="index.php" tppabs="http://obmen.tw1.ru/" class="button5 brown"><div class="light" style="width: 38px;"> </div>Главная</a></div>
    <div class="test7"></div>
    <div class="test9"><a href="instrykciya.htm" tppabs="http://obmen.tw1.ru/instrykciya" class="button5 brown"><div class="light"> </div>Правила</a></div>






    <div class="art-layout-wrapper clearfix">
        <div class="art-content-layout">
            <div class="art-content-layout-row">

                <div class="art-layout-cell art-content clearfix">
                    <article class="art-post art-messages"><div class="art-postcontent clearfix"></div></article><div class="item-page"><article class="art-post"><div class="art-postcontent clearfix"><div class="art-article"><!DOCTYPE HTML>

                    <html>

                    <head>
                        <title>Untitled</title>
                        <meta charset="utf-8">
                        <style type="text/css">
                            .parent_popup1 {
                                background-color: rgba(0, 0, 0, 0);
                                display: none;
                                position: fixed;
                                z-index: 99999;
                                top: 300px;
                                right: 0;
                                bottom: 0;
                                left: 900px;
                            }
                            .parent_popup1.show{
                                display: block;
                            }

                            .popup1 {
                                background: #fbe3df;
                                width: 190px;
                                margin: 0% auto;
                                padding: 0px 0px 0px 0px;
                                border: 2px solid #ada8a0;
                                position: relative;
                                /*--CSS3 Тени для Блока--*/
                                -webkit-box-shadow: 0px 0px 20px #000;
                                -moz-box-shadow: 0px 0px 20px #000;
                                box-shadow: 0px 0px 20px #000;
                                /*--CSS3 Скругленные углы--*/
                                -webkit-border-radius: 55px;
                                -moz-border-radius: 55px;
                                border-radius: 55px;
                            }










                        </style>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(51990071, "init", {
        id:51990071,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/51990071" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
                    </head>

                    <body>
                    <div class="parent_popup1" >
                        <div class="popup1">

                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka Somov</font>"
                            title[5]="<font>Ирина Стежко</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>Ангелина</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Павел Рудько</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="11"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[1]="<font>Andrey Mochalin</font>"
                            title[2]="<font>AndreyChumachenko</font>"
                            title[3]="<font>AndreyJive</font>"
                            title[4]="<font>AnthonyGlorm</font>"
                            title[5]="<font>AndrezPourf</font>"
                            title[6]="<font>Bedilo Alina</font>"
                            title[7]="<font>Cухинина Галина</font>"
                            title[8]="<font>Cулейманов Руслан</font>"
                            title[9]="<font>Damir Zalaev</font>"
                            title[10]="<font>Danchin Nikita</font>"
                            title[11]="<font>DANIL KORKO</font>"
                            title[12]="<font>korkorich</font>"
                            title[13]="<font>NormanHit</font>"
                            title[14]="<font>nurbek urinov</font>"
                            title[15]="<font>Pavel</font>"
                            title[16]="<font>Petrov Olego</font>"
                            title[17]="<font>Абрашкин Илья</font>"
                            title[18]="<font>Елена Рассыхаева</font>"
                            title[19]="<font>Агапов Игорь</font>"
                            title[20]="<font>HereaJLbnbiyXAM</font>"
                            title[21]="<font>Lorety</font>"
                            title[22]="<font>Eman1007</font>"
                            title[23]="<font>wladislaw</font>"
                            title[24]="<font>lemel</font>"
                            title[25]="<font>Емельянова Ирина</font>"
                            title[26]="<font>Емельянова Лариса</font>"
                            title[27]="<font>Жаксыбай Дана</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Наталья Кузнецова</font>"
                            title[1]="<font>Вадим Петров</font>"
                            title[2]="<font>Сергей Тукайло</font>"
                            title[3]="<font>Егор Новиков</font>"
                            title[4]="<font>novikovegor</font>"
                            title[5]="<font>anikiev86</font>"
                            title[6]="<font>ankim</font>"
                            title[7]="<font>Роман Савинов</font>"
                            title[8]="<font>Игорь Михайлов</font>"
                            title[9]="<font>Виктория Ермолина</font>"
                            title[10]="<font>Антропов Алексей</font>"
                            title[11]="<font>Mikhael666</font>"
                            title[12]="<font>torbor</font>"
                            title[13]="<font>Morfly</font>"
                            title[14]="<font>mugiwara</font>"
                            title[15]="<font>Eman1007</font>"
                            title[16]="<font>zxcvbnmm</font>"
                            title[17]="<font>vitek567</font>"
                            title[18]="<font>егор</font>"
                            title[19]="<font>nikolos97</font>"
                            title[20]="<font>NapoLe</font>"
                            title[21]="<font>VIP_XXL</font>"
                            title[22]="<font>lebedev_saneok</font>"
                            title[23]="<font>KVAND</font>"
                            title[24]="<font>Карпочев Виктор</font>"
                            title[25]="<font>Нина Сергеевна</font>"
                            title[26]="<font>Айнур Бикбулатов</font>"
                            title[27]="<font>Алексей Гребнев</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Царенок Андрей</font>"
                            title[1]="<font>Anton Voloshin</font>"
                            title[2]="<font>Климов Роман</font>"
                            title[3]="<font>Ислам Адаев</font>"
                            title[4]="<font>Лера надиевская</font>"
                            title[5]="<font>Базрбеков Куаныш</font>"
                            title[6]="<font>Трушина Любовь</font>"
                            title[7]="<font>Анастасия Шихова</font>"
                            title[8]="<font>Евгений Илларионов</font>"
                            title[9]="<font>малышкин виктор</font>"
                            title[10]="<font>Лопухов Станислав</font>"
                            title[11]="<font>Шутов Дмитрий Алексеевич</font>"
                            title[12]="<font>бондяев вячеслав</font>"
                            title[13]="<font>Владик Плтапов</font>"
                            title[14]="<font>vladik2305</font>"
                            title[15]="<font>Esmirnov.2093</font>"
                            title[16]="<font>dashkent8</font>"
                            title[17]="<font>nadezhda_boyko_77</font>"
                            title[18]="<font>1olgar23</font>"
                            title[19]="<font>killex</font>"
                            title[20]="<font>Sasha123</font>"
                            title[21]="<font>romik43</font>"
                            title[22]="<font>kirill_cheg</font>"
                            title[23]="<font>scheldon</font>"
                            title[24]="<font>sayfutdinovnafis</font>"
                            title[25]="<font>bogomolovsn72</font>"
                            title[26]="<font>Мороз Игорь</font>"
                            title[27]="<font>andrey20030312</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Тарасов Александр</font>"
                            title[1]="<font>marlogram</font>"
                            title[2]="<font>Ильмир Харисов</font>"
                            title[3]="<font>Михаил михаилов</font>"
                            title[4]="<font>petrovanton</font>"
                            title[5]="<font>mark</font>"
                            title[6]="<font>SADBOY</font>"
                            title[7]="<font>Владимир Акимов</font>"
                            title[8]="<font>panchenko95</font>"
                            title[9]="<font>boris01</font>"
                            title[10]="<font>Geos93</font>"
                            title[11]="<font>Александр</font>"
                            title[12]="<font>Ринат Атнагулов</font>"
                            title[13]="<font>Щекотуров</font>"
                            title[14]="<font>Грек Артём</font>"
                            title[15]="<font>adnaskel</font>"
                            title[16]="<font>Егор Галанцев</font>"
                            title[17]="<font>Протасов Денис</font>"
                            title[18]="<font>мордвин113</font>"
                            title[19]="<font>BOSS13VK</font>"
                            title[20]="<font>xFreedoms</font>"
                            title[21]="<font>Фридман Максим</font>"
                            title[22]="<font>Саитов Никита</font>"
                            title[23]="<font>екатерина</font>"
                            title[24]="<font>Ольга Коновалова</font>"
                            title[25]="<font>ната1990</font>"
                            title[26]="<font>pupchenko</font>"
                            title[27]="<font>Пупченко Юлия</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka**</font>"
                            title[5]="<font>HND want</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>algerdsharkowski</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Allensycle</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka**</font>"
                            title[5]="<font>HND want</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>algerdsharkowski</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Allensycle</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka**</font>"
                            title[5]="<font>HND want</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>algerdsharkowski</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Allensycle</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka**</font>"
                            title[5]="<font>HND want</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>algerdsharkowski</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Allensycle</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka**</font>"
                            title[5]="<font>HND want</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>algerdsharkowski</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Allensycle</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Марина К.А</font>"
                            title[1]="<font>Василий Кузнецов</font>"
                            title[2]="<font>Волкова Анастасия</font>"
                            title[3]="<font>lolichna</font>"
                            title[4]="<font>Jeka**</font>"
                            title[5]="<font>HND want</font>"
                            title[6]="<font>stanislav</font>"
                            title[7]="<font>azatkham</font>"
                            title[8]="<font>armen1603</font>"
                            title[9]="<font>Sergo14490</font>"
                            title[10]="<font>Laki85</font>"
                            title[11]="<font>JoKeR</font>"
                            title[12]="<font>akimnezenko</font>"
                            title[13]="<font>mr.s-akram</font>"
                            title[14]="<font>Aleks</font>"
                            title[15]="<font>aleksey1996</font>"
                            title[16]="<font>Morgan</font>"
                            title[17]="<font>scet0410</font>"
                            title[18]="<font>Ataman999</font>"
                            title[19]="<font>Cripton</font>"
                            title[20]="<font>sert_00</font>"
                            title[21]="<font>algerdsharkowski</font>"
                            title[22]="<font>Abdurahmonov</font>"
                            title[23]="<font>allanreih2002</font>"
                            title[24]="<font>Allensycle</font>"
                            title[25]="<font>AncicZep</font>"
                            title[26]="<font>Bergh214</font>"
                            title[27]="<font>Andrej</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>

                    <div class="parent_popup1" >
                        <div class="popup1">
                            <p><center><img src="images/stories/778877.png" tppabs="http://obmen.tw1.ru/images/stories/778877.png" width="24" alt="" /><br><script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>Поля</font>"
                            title[1]="<font>Элька</font>"
                            title[2]="<font>Доброволев Никита</font>"
                            title[3]="<font>Арели Верлинден</font>"
                            title[4]="<font>Яхонтов Ярослав</font>"
                            title[5]="<font>Ансель Сабиров</font>"
                            title[6]="<font>Play_Der</font>"
                            title[7]="<font>MR_Vallera</font>"
                            title[8]="<font>mans.1987</font>"
                            title[9]="<font>zalexz</font>"
                            title[10]="<font>Новосельская Александра</font>"
                            title[11]="<font>владимир артурович</font>"
                            title[12]="<font>гаврилов андрей</font>"
                            title[13]="<font>галина михалкова</font>"
                            title[14]="<font>Сергей Бондаренко</font>"
                            title[15]="<font>maliku60</font>"
                            title[16]="<font>PierreDunn</font>"
                            title[17]="<font>Itechmak</font>"
                            title[18]="<font>erikks13</font>"
                            title[19]="<font>NVOrlov</font>"
                            title[20]="<font>shurenok</font>"
                            title[21]="<font>Багаев Сергей</font>"
                            title[22]="<font>Тиванова Анастасия</font>"
                            title[23]="<font>timchel</font>"
                            title[24]="<font>Sergey1969</font>"
                            title[25]="<font>danila.aksenov</font>"
                            title[26]="<font>leha.59</font>"
                            title[27]="<font>Султангулов марат</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script><br> <b>Совершен обмен на сумму</b><br> <script language="javascript">
                            <!--
                            var a=Math.round(Math.random()*26)
                            var b=Math.round(Math.random()*2)
                            title = new Array();
                            title[0]="<font>+12400.11руб</font>"
                            title[1]="<font>+24830.40руб</font>"
                            title[2]="<font>+24812.95руб</font>"
                            title[3]="<font>+6207.61руб</font>"
                            title[4]="<font>+1551.90руб</font>"
                            title[5]="<font>+11131.16руб</font>"
                            title[6]="<font>+3103.81руб</font>"
                            title[7]="<font>+42311.21руб</font>"
                            title[8]="<font>+41875.71руб</font>"
                            title[9]="<font>+6227.22руб</font>"
                            title[10]="<font>+6208.42руб</font>"
                            title[11]="<font>+6209.34руб</font>"
                            title[12]="<font>+40890.19руб</font>"
                            title[13]="<font>+1551.74руб</font>"
                            title[14]="<font>+42791.36руб</font>"
                            title[15]="<font>+1551.77руб</font>"
                            title[16]="<font>+25223.87руб</font>"
                            title[17]="<font>+26845.25руб</font>"
                            title[18]="<font>+27830.43руб</font>"
                            title[19]="<font>+28921.54руб</font>"
                            title[20]="<font>+6207.45руб</font>"
                            title[21]="<font>+12415.55руб</font>"
                            title[22]="<font>+74765.82руб</font>"
                            title[23]="<font>+90214.90руб</font>"
                            title[24]="<font>+12415.23руб</font>"
                            title[25]="<font>+16523.65руб</font>"
                            title[26]="<font>+14436.48руб</font>"
                            title[27]="<font>+12415.23руб</font>"
                            document.write (""+title[a]+"");
                            //-->
                        </script></center></p>
                            <a class="1"title="Закрыть" ></a>
                        </div>
                    </div>
                    <script>

                        window.addEventListener("DOMContentLoaded", function() {
                            function c() {
                                a = b[b.length * Math.random() | 0];
                                a.classList.add("show");
                                d = window.setTimeout(e, 10000) //время просмотра
                            }

                            function e() {
                                window.clearTimeout(d);
                                a && a.classList.remove("show");
                                window.setTimeout(c, 32000) //пауза между показами
                            }
                            document.addEventListener("click", function(a) {
                                ((a = a.target.classList) && a.contains("parent_popup1") || a.contains("1")) && e()
                            });
                            var b = document.querySelectorAll(".parent_popup1"),
                                d, a, b = [].slice.call(b, 0);
                            window.setTimeout(c, 17000) //пауза перед 17 запуском
                        });

                    </script>
                    </body>

                    </html>
                    <div style="padding: 1690px 0 0 430px;"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Простая замена картинок с помощью JQuery</title>

                            <style type="text/css">
                                div#rotator {position:relative; height:150px; margin-left: 15px;}
                                div#rotator ul li {float:left; position:absolute; list-style: none;}
                                div#rotator ul li.show {z-index:500;}
                            </style>

                            <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js" tppabs="http://code.jquery.com/jquery-latest.min.js"></script>

                            <!-- Автор Dylan Wagstaff, http://www.alohatechsupport.net -->
                            <script type="text/javascript">

                                function theRotator() {
                                    // Устанавливаем прозрачность всех картинок в 0
                                    $('div#rotator ul li').css({opacity: 0.0});

                                    // Берем первую картинку и показываем ее (по пути включаем полную видимость)
                                    $('div#rotator ul li:first').css({opacity: 1.0});

                                    // Вызываем функцию rotate для запуска слайдшоу, 5000 = смена картинок происходит раз в 5 секунд
                                    setInterval('rotate()',5000);
                                }

                                function rotate() {
                                    // Берем первую картинку
                                    var current = ($('http://obmen.tw1.ru/div#rotator ul li.show')?  $('http://obmen.tw1.ru/div#rotator ul li.show') : $('div#rotator ul li:first'));

                                    // Берем следующую картинку, когда дойдем до последней начинаем с начала
                                    var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#rotator ul li:first') :current.next()) : $('div#rotator ul li:first'));

                                    // Расскомментируйте, чтобы показвать картинки в случайном порядке
                                    // var sibs = current.siblings();
                                    // var rndNum = Math.floor(Math.random() * sibs.length );
                                    // var next = $( sibs[ rndNum ] );

                                    // Подключаем эффект растворения/затухания для показа картинок, css-класс show имеет больший z-index
                                    next.css({opacity: 0.0})
                                        .addClass('show')
                                        .animate({opacity: 1.0}, 1000);

                                    // Прячем текущую картинку
                                    current.animate({opacity: 0.0}, 1000)
                                        .removeClass('show');
                                };

                                $(document).ready(function() {
                                    // Запускаем слайдшоу
                                    theRotator();
                                });

                            </script>

                        </head>
                        <body>

                        <div id="rotator">
                            <ul>
                                <li class="show"><img src="images/stories/dd1.png" tppabs="http://obmen.tw1.ru/images/stories/dd1.png" width="600"  alt="pic1" /></li>
                                <li><img src="images/stories/dd2.png" tppabs="http://obmen.tw1.ru/images/stories/dd2.png" width="600"  alt="pic2" /></li>
                                <li><img src="images/stories/dd3.png" tppabs="http://obmen.tw1.ru/images/stories/dd3.png" width="600"  alt="pic3" /></li>
                                <li><img src="images/stories/dd4.png" tppabs="http://obmen.tw1.ru/images/stories/dd4.png" width="600"  alt="pic4" /></li>
                                <li><img src="images/stories/dd5.png" tppabs="http://obmen.tw1.ru/images/stories/dd5.png" width="600"  alt="pic5" /></li>
                                <li><img src="images/stories/dd6.png" tppabs="http://obmen.tw1.ru/images/stories/dd6.png" width="600"  alt="pic6" /></li>
                                <li><img src="images/stories/dd7.png" tppabs="http://obmen.tw1.ru/images/stories/dd7.png" width="600"  alt="pic7" /></li>
                                <li><img src="images/stories/dd8.png" tppabs="http://obmen.tw1.ru/images/stories/dd8.png" width="600"  alt="pic8" /></li>
                            </ul>
                        </div>

                        </body>
                        </html></div>
                    <div style="padding: 300px 0 0 0px;"></div>
                    <img src="images/stories/karta1.jpg" tppabs="http://obmen.tw1.ru/images/stories/karta1.jpg" width="1100" alt="" />
                    <br /><br /><br /><br /><br /><br />
                    <div style="padding: 0px 0 0 125px;"><img src="images/stories/kolont.jpg" tppabs="http://obmen.tw1.ru/images/stories/kolont.jpg" alt="" /></div>

                    <br /><br />


                </div></div></body></html>
<br />


</div><script type="text/javascript">
    <!--
    var jcomments=new JComments(46, 'com_content','index.php.htm'/*tpa=http://obmen.tw1.ru/index.php?option=com_jcomments&tmpl=component*/);
    jcomments.setList('comments-list');
    //-->
</script>
<div id="jc">
    <div id="comments"><h2>Общение пользователей <a class="refresh" href="#" title="Обновить список комментариев" onclick="jcomments.showPage(46,'com_content',0);return false;">&nbsp;</a></h2>
        <div id="nav-top"><span class="activepage"><b>1</b></span><span onclick="jcomments.showPage(46, 'com_content', 2);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >2</span><span onclick="jcomments.showPage(46, 'com_content', 3);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >3</span><span onclick="jcomments.showPage(46, 'com_content', 4);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >4</span><span onclick="jcomments.showPage(46, 'com_content', 5);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >5</span><span onclick="jcomments.showPage(46, 'com_content', 6);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >6</span><span onclick="jcomments.showPage(46, 'com_content', 7);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >7</span><span onclick="jcomments.showPage(46, 'com_content', 8);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >8</span><span onclick="jcomments.showPage(46, 'com_content', 9);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >9</span><span onclick="jcomments.showPage(46, 'com_content', 10);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >10</span><span onclick="jcomments.showPage(46, 'com_content', 11);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >11</span><span onclick="jcomments.showPage(46, 'com_content', 12);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >&raquo;</span></div>
        <div id="comments-list" class="comments-list">
            <div class="even" id="comment-item-6895"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6895" tppabs="http://obmen.tw1.ru/marketing.html#comment-6895" id="comment-6895">#301</a>
                    <span class="comment-author">Светочка1997</span>
                    <span class="comment-date">03.01.2019 12:26</span>
                    <div class="comment-body" id="comment-body-6895"><span class="quote">Цитирую anastasiia200:</span><blockquote><div>серьезно работает?</div></blockquote> <br />Ну конечно, спрашиваешь еще, сайт просто бомба<br />  <img src="components/com_jcomments/images/smiles/smile.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/smile.gif" border="0" alt=":-)" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6892"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6892" tppabs="http://obmen.tw1.ru/marketing.html#comment-6892" id="comment-6892">#300</a>
                    <span class="comment-author">anastasiia200</span>
                    <span class="comment-date">03.01.2019 12:17</span>
                    <div class="comment-body" id="comment-body-6892">серьезно работает?</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6891"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6891" tppabs="http://obmen.tw1.ru/marketing.html#comment-6891" id="comment-6891">#299</a>
                    <span class="comment-author">Егорин Антон</span>
                    <span class="comment-date">03.01.2019 12:10</span>
                    <div class="comment-body" id="comment-body-6891"><span class="quote">Цитирую Элеонора:</span><blockquote><div>Просто потрясно за 1 день сегодня наменяла на 24000 рублей, вот это я понимаю хорошее начало нового года  <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />   <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />   <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />   <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />   <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />   <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" /> </div></blockquote><br />Не поспорю, я с тобой полностью согласен, деньжат тут можно прилично поднять )</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6872"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6872" tppabs="http://obmen.tw1.ru/marketing.html#comment-6872" id="comment-6872">#298</a>
                    <span class="comment-author">Элеонора</span>
                    <span class="comment-date">02.01.2019 23:46</span>
                    <div class="comment-body" id="comment-body-6872">Просто потрясно за 1 день сегодня наменяла на 24000 рублей, вот это я понимаю хорошее начало нового года  <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />   <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />   <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />   <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />   <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />   <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6860"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6860" tppabs="http://obmen.tw1.ru/marketing.html#comment-6860" id="comment-6860">#297</a>
                    <span class="comment-author">Володя100</span>
                    <span class="comment-date">02.01.2019 20:04</span>
                    <div class="comment-body" id="comment-body-6860">Народ всех с Новым годом!!!  <img src="components/com_jcomments/images/smiles/rolleyes.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/rolleyes.gif" border="0" alt=":roll:" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6729"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6729" tppabs="http://obmen.tw1.ru/marketing.html#comment-6729" id="comment-6729">#296</a>
                    <span class="comment-author">Михаил Кураков</span>
                    <span class="comment-date">26.12.2018 00:21</span>
                    <div class="comment-body" id="comment-body-6729">Галактик ок спасибо, буду пробовать )</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6728"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6728" tppabs="http://obmen.tw1.ru/marketing.html#comment-6728" id="comment-6728">#295</a>
                    <span class="comment-author">Галактик</span>
                    <span class="comment-date">26.12.2018 00:18</span>
                    <div class="comment-body" id="comment-body-6728"><span class="quote">Цитирую Михаил Кураков:</span><blockquote><div>Вот так не ожидал я такого, тут действительно получается заработать, да еще как  <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />  <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" /> , 37000т.р вывел, весь день сегодня обменивал, щас еще ночью попробую, а то пока, что у меня лимит на обмены закончился</div></blockquote> Нормально, пробуй после часу ночи менять, ночью меньше людей в сервисе, соответственно меньше нагрузка на сайте, обменов получается больше сделать, я так постоянно по ночам обмениваю, но и днем еще, за сутки можно вообще неплохо заработать  <img src="components/com_jcomments/images/smiles/cool.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/cool.gif" border="0" alt="8)" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6727"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6727" tppabs="http://obmen.tw1.ru/marketing.html#comment-6727" id="comment-6727">#294</a>
                    <span class="comment-author">Михаил Кураков</span>
                    <span class="comment-date">26.12.2018 00:12</span>
                    <div class="comment-body" id="comment-body-6727">Вот так не ожидал я такого, тут действительно получается заработать, да еще как  <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" />  <img src="components/com_jcomments/images/smiles/lol.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/lol.gif" border="0" alt=":lol:" /> , 37000т.р вывел, весь день сегодня обменивал, щас еще ночью попробую, а то пока, что у меня лимит на обмены закончился</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6726"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6726" tppabs="http://obmen.tw1.ru/marketing.html#comment-6726" id="comment-6726">#293</a>
                    <span class="comment-author">Эми1989</span>
                    <span class="comment-date">26.12.2018 00:04</span>
                    <div class="comment-body" id="comment-body-6726">Ребята всех с наступающим! Побольше всем денег в новом году  <img src="components/com_jcomments/images/smiles/rolleyes.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/rolleyes.gif" border="0" alt=":roll:" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6337"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6337" tppabs="http://obmen.tw1.ru/marketing.html#comment-6337" id="comment-6337">#292</a>
                    <span class="comment-author">Алина Прахоренко</span>
                    <span class="comment-date">14.12.2018 18:33</span>
                    <div class="comment-body" id="comment-body-6337"><span class="quote">Цитирую Юрий23:</span><blockquote><div>Скажите а если я в логине ошибку сделал когда счет пополнял, тогда деньги не придут на счет?</div></blockquote><br />Нет не придут я первый раз пополняла когда тоже ошиблась в логине, пришлось второй раз пополнять счет, но ничего я зато потом сразу заработала 30000 руб, поэтому пустяки )</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6336"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6336" tppabs="http://obmen.tw1.ru/marketing.html#comment-6336" id="comment-6336">#291</a>
                    <span class="comment-author">9917771222</span>
                    <span class="comment-date">14.12.2018 18:33</span>
                    <div class="comment-body" id="comment-body-6336"><span class="quote">Цитирую Юрий23:</span><blockquote><div>Скажите а если я в логине ошибку сделал когда счет пополнял, тогда деньги не придут?</div></blockquote><br />Я вообще забыл его указать!!!</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6334"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6334" tppabs="http://obmen.tw1.ru/marketing.html#comment-6334" id="comment-6334">#290</a>
                    <span class="comment-author">Юрий23</span>
                    <span class="comment-date">14.12.2018 18:29</span>
                    <div class="comment-body" id="comment-body-6334">Скажите а если я в логине ошибку сделал когда счет пополнял, тогда деньги не придут?</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6293"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6293" tppabs="http://obmen.tw1.ru/marketing.html#comment-6293" id="comment-6293">#289</a>
                    <span class="comment-author">Uperip60</span>
                    <span class="comment-date">13.12.2018 10:44</span>
                    <div class="comment-body" id="comment-body-6293"> <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6263"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6263" tppabs="http://obmen.tw1.ru/marketing.html#comment-6263" id="comment-6263">#288</a>
                    <span class="comment-author">Евгений Воронцов</span>
                    <span class="comment-date">12.12.2018 01:31</span>
                    <div class="comment-body" id="comment-body-6263">Добрый ночи всем, попробовал сегодня по обменивать, весь день делал обмены и вот сейчас уже у меня получилось 41000 рублей, ну просто потрясно, реально рабочий сервис, это просто круто, я за день еще столько не зарабатывал, спасибо Багаеву Сергею что посоветовал мне этот обменник, все действительно как ты и говорил прибыль с обменов просто бешеная  <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />  <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />  <img src="components/com_jcomments/images/smiles/laugh.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/laugh.gif" border="0" alt=":D" />  теперь похоже тут каждый день буду работать, пока есть такая возможность нужно не упускать  <img src="components/com_jcomments/images/smiles/rolleyes.gif" tppabs="http://obmen.tw1.ru/components/com_jcomments/images/smiles/rolleyes.gif" border="0" alt=":roll:" /> </div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="even" id="comment-item-6253"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6253" tppabs="http://obmen.tw1.ru/marketing.html#comment-6253" id="comment-6253">#287</a>
                    <span class="comment-author">Nikitos</span>
                    <span class="comment-date">11.12.2018 17:39</span>
                    <div class="comment-body" id="comment-body-6253"><span class="quote">Цитирую Mishamileev:</span><blockquote><div>Хм и сколько можно примерно за день вывести?</div></blockquote><br />Да тут когда как получается, каждый день по разному, еще зависит с какой суммы начинаешь обмен, чем выше сумма тем больше прибыль</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
            <div class="odd" id="comment-item-6251"><div class="rbox"><div class="rbox_tr"><div class="rbox_tl"><div class="rbox_t">&nbsp;</div></div></div><div class="rbox_m">
                <div class="comment-box">
                    <a class="comment-anchor" href="marketing.html#comment-6251" tppabs="http://obmen.tw1.ru/marketing.html#comment-6251" id="comment-6251">#286</a>
                    <span class="comment-author">Mishamileev</span>
                    <span class="comment-date">11.12.2018 16:46</span>
                    <div class="comment-body" id="comment-body-6251">Хм и сколько можно примерно за день вывести?</div>
                </div><div class="clear"></div>
            </div><div class="rbox_br"><div class="rbox_bl"><div class="rbox_b">&nbsp;</div></div></div></div>
            </div>
        </div>
        <div id="nav-bottom"><span class="activepage"><b>1</b></span><span onclick="jcomments.showPage(46, 'com_content', 2);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >2</span><span onclick="jcomments.showPage(46, 'com_content', 3);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >3</span><span onclick="jcomments.showPage(46, 'com_content', 4);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >4</span><span onclick="jcomments.showPage(46, 'com_content', 5);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >5</span><span onclick="jcomments.showPage(46, 'com_content', 6);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >6</span><span onclick="jcomments.showPage(46, 'com_content', 7);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >7</span><span onclick="jcomments.showPage(46, 'com_content', 8);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >8</span><span onclick="jcomments.showPage(46, 'com_content', 9);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >9</span><span onclick="jcomments.showPage(46, 'com_content', 10);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >10</span><span onclick="jcomments.showPage(46, 'com_content', 11);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >11</span><span onclick="jcomments.showPage(46, 'com_content', 12);" class="page" onmouseover="this.className='hoverpage';" onmouseout="this.className='page';" >&raquo;</span></div>
        <div id="comments-list-footer"><a class="refresh" href="#" title="Обновить список комментариев" onclick="jcomments.showPage(46,'com_content',0);return false;">Обновить список комментариев</a></div>
    </div>
    <a id="addcomments" href="#addcomments"></a>
    <p class="message">Коментарии могут оставлять только зарегистрированные пользователи</p>
    <div id="comments-footer" align="center"></div>
    <script type="text/javascript">
        <!--
        jcomments.setAntiCache(1,0,0);
        //-->
    </script>
</div></div></article></div>


<div class="atest21"></div>
<div class="test15"></div>
<div class="test17"></div>

<div class="test6"><div style="padding: 0px 0 0 510px;"><img src="images/stories/57c48d71160c55f156163bbb_image545.gif" tppabs="http://obmen.tw1.ru/images/stories/57c48d71160c55f156163bbb_image545.gif" width="105" alt="" /></div></div>



<div class="test18"><!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Totem Ticker</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" tppabs="http://obmen.tw1.ru/css/style.css"/>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.mini.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.mini.js"></script>
        <script type="text/javascript" src="buildinternet-totem-326e398/js/jquery.totemticker.js" tppabs="http://obmen.tw1.ru/buildinternet-totem-326e398/js/jquery.totemticker.js"></script>
        <script type="text/javascript">
            $(function(){
                $('#vertical-ticker').totemticker({
                    row_height	:	'77px',
                    next		:	'#ticker-next',
                    previous	:	'#ticker-previous',
                    stop		:	'#stop',
                    start		:	'#start',
                    mousestop	:	true,
                });
            });
        </script>
    </head>
    <body>

    <div id="banner">

        <div class="clear">&nbsp;</div>
    </div>

    <div id="wrapper">

        <h1 class="logo">Totem Ticker</h1>

        <ul id="vertical-ticker">
            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Марина К.А</font>"
title[1]="<font>Василий Кузнецов</font>"
title[2]="<font>Волкова Анастасия</font>"
title[3]="<font>lolichna</font>"
title[4]="<font>Jeka**</font>"
title[5]="<font>HND want</font>"
title[6]="<font>stanislav</font>"
title[7]="<font>azatkham</font>"
title[8]="<font>armen1603</font>"
title[9]="<font>Sergo14490</font>"
title[10]="<font>Laki85</font>"
title[11]="<font>JoKeR</font>"
title[12]="<font>akimnezenko</font>"
title[13]="<font>mr.s-akram</font>"
title[14]="<font>Aleks</font>"
title[15]="<font>aleksey1996</font>"
title[16]="<font>Morgan</font>"
title[17]="<font>scet0410</font>"
title[18]="<font>Ataman999</font>"
title[19]="<font>Cripton</font>"
title[20]="<font>sert_00</font>"
title[21]="<font>algerdsharkowski</font>"
title[22]="<font>Abdurahmonov</font>"
title[23]="<font>allanreih2002</font>"
title[24]="<font>Allensycle</font>"
title[25]="<font>AncicZep</font>"
title[26]="<font>Bergh214</font>"
title[27]="<font>Andrej</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Do_oF</font>"
title[1]="<font>Andrey Mochalin</font>"
title[2]="<font>AndreyChumachenko</font>"
title[3]="<font>AndreyJive</font>"
title[4]="<font>AnthonyGlorm</font>"
title[5]="<font>AndrezPourf</font>"
title[6]="<font>Bedilo Alina</font>"
title[7]="<font>Cухинина Галина</font>"
title[8]="<font>Cулейманов Руслан</font>"
title[9]="<font>Damir Zalaev</font>"
title[10]="<font>Danchin Nikita</font>"
title[11]="<font>DANIL KORKO</font>"
title[12]="<font>korkorich</font>"
title[13]="<font>NormanHit</font>"
title[14]="<font>nurbek urinov</font>"
title[15]="<font>Pavel</font>"
title[16]="<font>Petrov Olego</font>"
title[17]="<font>Абрашкин Илья</font>"
title[18]="<font>Елена Рассыхаева</font>"
title[19]="<font>Агапов Игорь</font>"
title[20]="<font>HereaJLbnbiyXAM</font>"
title[21]="<font>Lorety</font>"
title[22]="<font>Eman1007</font>"
title[23]="<font>wladislaw</font>"
title[24]="<font>lemel</font>"
title[25]="<font>Емельянова Ирина</font>"
title[26]="<font>Емельянова Лариса</font>"
title[27]="<font>Жаксыбай Дана</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Жанат Мандатхан</font>"
title[1]="<font>Janochka</font>"
title[2]="<font>Зайцев Алексей</font>"
title[3]="<font>Zaksergey</font>"
title[4]="<font>Zakirov16</font>"
title[5]="<font>Зеленин Илья</font>"
title[6]="<font>pgumarova</font>"
title[7]="<font>zed777ntr</font>"
title[8]="<font>Иван</font>"
title[9]="<font>Иван Носов</font>"
title[10]="<font>innaArinova</font>"
title[11]="<font>Jairadhe</font>"
title[12]="<font>Wenera</font>"
title[13]="<font>Канаева Нина</font>"
title[14]="<font>Канюк Надежда</font>"
title[15]="<font>КириллНайс</font>"
title[16]="<font>Лютый Никита</font>"
title[17]="<font>Майгефер Александр</font>"
title[18]="<font>Макс</font>"
title[19]="<font>Александр Кухтиков</font>"
title[20]="<font>Якут</font>"
title[21]="<font>Erik</font>"
title[22]="<font>Royal91</font>"
title[23]="<font>Горщук Ольга</font>"
title[24]="<font>Моисеев максим</font>"
title[25]="<font>Мокрушин Станислав</font>"
title[26]="<font>Мороз Игорь</font>"
title[27]="<font>Наталия Гордецкая</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Царенок Андрей</font>"
title[1]="<font>Anton Voloshin</font>"
title[2]="<font>Климов Роман</font>"
title[3]="<font>Ислам Адаев</font>"
title[4]="<font>Лера надиевская</font>"
title[5]="<font>Базрбеков Куаныш</font>"
title[6]="<font>Трушина Любовь</font>"
title[7]="<font>Анастасия Шихова</font>"
title[8]="<font>Евгений Илларионов</font>"
title[9]="<font>малышкин виктор</font>"
title[10]="<font>Лопухов Станислав</font>"
title[11]="<font>Шутов Дмитрий Алексеевич</font>"
title[12]="<font>бондяев вячеслав</font>"
title[13]="<font>Владик Плтапов</font>"
title[14]="<font>vladik2305</font>"
title[15]="<font>Esmirnov.2093</font>"
title[16]="<font>dashkent8</font>"
title[17]="<font>nadezhda_boyko_77</font>"
title[18]="<font>1olgar23</font>"
title[19]="<font>killex</font>"
title[20]="<font>Sasha123</font>"
title[21]="<font>romik43</font>"
title[22]="<font>kirill_cheg</font>"
title[23]="<font>scheldon</font>"
title[24]="<font>sayfutdinovnafis</font>"
title[25]="<font>bogomolovsn72</font>"
title[26]="<font>Мороз Игорь</font>"
title[27]="<font>andrey20030312</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Тарасов Александр</font>"
title[1]="<font>marlogram</font>"
title[2]="<font>Ильмир Харисов</font>"
title[3]="<font>Михаил михаилов</font>"
title[4]="<font>petrovanton</font>"
title[5]="<font>mark</font>"
title[6]="<font>SADBOY</font>"
title[7]="<font>Владимир Акимов</font>"
title[8]="<font>panchenko95</font>"
title[9]="<font>boris01</font>"
title[10]="<font>Geos93</font>"
title[11]="<font>Александр</font>"
title[12]="<font>Ринат Атнагулов</font>"
title[13]="<font>Щекотуров</font>"
title[14]="<font>Грек Артём</font>"
title[15]="<font>adnaskel</font>"
title[16]="<font>Егор Галанцев</font>"
title[17]="<font>Протасов Денис</font>"
title[18]="<font>мордвин113</font>"
title[19]="<font>BOSS13VK</font>"
title[20]="<font>xFreedoms</font>"
title[21]="<font>Фридман Максим</font>"
title[22]="<font>Саитов Никита</font>"
title[23]="<font>екатерина</font>"
title[24]="<font>Ольга Коновалова</font>"
title[25]="<font>ната1990</font>"
title[26]="<font>pupchenko</font>"
title[27]="<font>Пупченко Юлия</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Поля</font>"
title[1]="<font>Элька</font>"
title[2]="<font>Доброволев Никита</font>"
title[3]="<font>Арели Верлинден</font>"
title[4]="<font>Яхонтов Ярослав</font>"
title[5]="<font>Ансель Сабиров</font>"
title[6]="<font>Play_Der</font>"
title[7]="<font>MR_Vallera</font>"
title[8]="<font>mans.1987</font>"
title[9]="<font>zalexz</font>"
title[10]="<font>Новосельская Александра</font>"
title[11]="<font>владимир артурович</font>"
title[12]="<font>гаврилов андрей</font>"
title[13]="<font>галина михалкова</font>"
title[14]="<font>Сергей Бондаренко</font>"
title[15]="<font>maliku60</font>"
title[16]="<font>PierreDunn</font>"
title[17]="<font>Itechmak</font>"
title[18]="<font>erikks13</font>"
title[19]="<font>NVOrlov</font>"
title[20]="<font>shurenok</font>"
title[21]="<font>Багаев Сергей</font>"
title[22]="<font>Тиванова Анастасия</font>"
title[23]="<font>timchel</font>"
title[24]="<font>Sergey1969</font>"
title[25]="<font>danila.aksenov</font>"
title[26]="<font>leha.59</font>"
title[27]="<font>Султангулов марат</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Наталья Кузнецова</font>"
title[1]="<font>Вадим Петров</font>"
title[2]="<font>Сергей Тукайло</font>"
title[3]="<font>Егор Новиков</font>"
title[4]="<font>novikovegor</font>"
title[5]="<font>anikiev86</font>"
title[6]="<font>ankim</font>"
title[7]="<font>Роман Савинов</font>"
title[8]="<font>Игорь Михайлов</font>"
title[9]="<font>Виктория Ермолина</font>"
title[10]="<font>Антропов Алексей</font>"
title[11]="<font>Mikhael666</font>"
title[12]="<font>torbor</font>"
title[13]="<font>Morfly</font>"
title[14]="<font>mugiwara</font>"
title[15]="<font>Eman1007</font>"
title[16]="<font>zxcvbnmm</font>"
title[17]="<font>vitek567</font>"
title[18]="<font>егор</font>"
title[19]="<font>nikolos97</font>"
title[20]="<font>NapoLe</font>"
title[21]="<font>VIP_XXL</font>"
title[22]="<font>lebedev_saneok</font>"
title[23]="<font>KVAND</font>"
title[24]="<font>Карпочев Виктор</font>"
title[25]="<font>Нина Сергеевна</font>"
title[26]="<font>Айнур Бикбулатов</font>"
title[27]="<font>Алексей Гребнев</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Марина К.А</font>"
title[1]="<font>Василий Кузнецов</font>"
title[2]="<font>Волкова Анастасия</font>"
title[3]="<font>lolichna</font>"
title[4]="<font>Jeka**</font>"
title[5]="<font>HND want</font>"
title[6]="<font>stanislav</font>"
title[7]="<font>azatkham</font>"
title[8]="<font>armen1603</font>"
title[9]="<font>Sergo14490</font>"
title[10]="<font>Laki85</font>"
title[11]="<font>JoKeR</font>"
title[12]="<font>akimnezenko</font>"
title[13]="<font>mr.s-akram</font>"
title[14]="<font>Aleks</font>"
title[15]="<font>aleksey1996</font>"
title[16]="<font>Morgan</font>"
title[17]="<font>scet0410</font>"
title[18]="<font>Ataman999</font>"
title[19]="<font>Cripton</font>"
title[20]="<font>sert_00</font>"
title[21]="<font>algerdsharkowski</font>"
title[22]="<font>Abdurahmonov</font>"
title[23]="<font>allanreih2002</font>"
title[24]="<font>Allensycle</font>"
title[25]="<font>AncicZep</font>"
title[26]="<font>Bergh214</font>"
title[27]="<font>Andrej</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Do_oF</font>"
title[1]="<font>Andrey Mochalin</font>"
title[2]="<font>AndreyChumachenko</font>"
title[3]="<font>AndreyJive</font>"
title[4]="<font>AnthonyGlorm</font>"
title[5]="<font>AndrezPourf</font>"
title[6]="<font>Bedilo Alina</font>"
title[7]="<font>Cухинина Галина</font>"
title[8]="<font>Cулейманов Руслан</font>"
title[9]="<font>Damir Zalaev</font>"
title[10]="<font>Danchin Nikita</font>"
title[11]="<font>DANIL KORKO</font>"
title[12]="<font>korkorich</font>"
title[13]="<font>NormanHit</font>"
title[14]="<font>nurbek urinov</font>"
title[15]="<font>Pavel</font>"
title[16]="<font>Petrov Olego</font>"
title[17]="<font>Абрашкин Илья</font>"
title[18]="<font>Елена Рассыхаева</font>"
title[19]="<font>Агапов Игорь</font>"
title[20]="<font>HereaJLbnbiyXAM</font>"
title[21]="<font>Lorety</font>"
title[22]="<font>Eman1007</font>"
title[23]="<font>wladislaw</font>"
title[24]="<font>lemel</font>"
title[25]="<font>Емельянова Ирина</font>"
title[26]="<font>Емельянова Лариса</font>"
title[27]="<font>Жаксыбай Дана</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Жанат Мандатхан</font>"
title[1]="<font>Janochka</font>"
title[2]="<font>Зайцев Алексей</font>"
title[3]="<font>Zaksergey</font>"
title[4]="<font>Zakirov16</font>"
title[5]="<font>Зеленин Илья</font>"
title[6]="<font>pgumarova</font>"
title[7]="<font>zed777ntr</font>"
title[8]="<font>Иван</font>"
title[9]="<font>Иван Носов</font>"
title[10]="<font>innaArinova</font>"
title[11]="<font>Jairadhe</font>"
title[12]="<font>Wenera</font>"
title[13]="<font>Канаева Нина</font>"
title[14]="<font>Канюк Надежда</font>"
title[15]="<font>КириллНайс</font>"
title[16]="<font>Лютый Никита</font>"
title[17]="<font>Майгефер Александр</font>"
title[18]="<font>Макс</font>"
title[19]="<font>Александр Кухтиков</font>"
title[20]="<font>Якут</font>"
title[21]="<font>Erik</font>"
title[22]="<font>Royal91</font>"
title[23]="<font>Горщук Ольга</font>"
title[24]="<font>Моисеев максим</font>"
title[25]="<font>Мокрушин Станислав</font>"
title[26]="<font>Мороз Игорь</font>"
title[27]="<font>Наталия Гордецкая</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;"><script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>+88211.11р</font>"
title[1]="<font>+43930.40р</font>"
title[2]="<font>+24812.95р</font>"
title[3]="<font>+6207.61р</font>"
title[4]="<font>+1551.90р</font>"
title[5]="<font>+11131.16р</font>"
title[6]="<font>+3103.81р</font>"
title[7]="<font>+42311.21р</font>"
title[8]="<font>+41875.71р</font>"
title[9]="<font>+6227.22р</font>"
title[10]="<font>+6208.42р</font>"
title[11]="<font>+6209.34р</font>"
title[12]="<font>+40890.19р</font>"
title[13]="<font>+41894.74р</font>"
title[14]="<font>+42791.36р</font>"
title[15]="<font>+43193.77р</font>"
title[16]="<font>+25223.87р</font>"
title[17]="<font>+26845.25р</font>"
title[18]="<font>+27830.43р</font>"
title[19]="<font>+28921.54р</font>"
title[20]="<font>+92900.45р</font>"
title[21]="<font>+91568.55р</font>"
title[22]="<font>+74765.82р</font>"
title[23]="<font>+87214.90р</font>"
title[24]="<font>+12415.23р</font>"
title[25]="<font>+16523.65р</font>"
title[26]="<font>+14436.48р</font>"
title[27]="<font>+12415.23р</font>"
document.write (""+title[a]+"");
//-->
</script></span>&nbsp<span style= "color:#000000;">(<script language="javascript">
<!--
var a=Math.round(Math.random()*26)
var b=Math.round(Math.random()*2)
title = new Array();
title[0]="<font>Царенок Андрей</font>"
title[1]="<font>Anton Voloshin</font>"
title[2]="<font>Климов Роман</font>"
title[3]="<font>Ислам Адаев</font>"
title[4]="<font>Лера надиевская</font>"
title[5]="<font>Базрбеков Куаныш</font>"
title[6]="<font>Трушина Любовь</font>"
title[7]="<font>Анастасия Шихова</font>"
title[8]="<font>Евгений Илларионов</font>"
title[9]="<font>малышкин виктор</font>"
title[10]="<font>Лопухов Станислав</font>"
title[11]="<font>Шутов Дмитрий Алексеевич</font>"
title[12]="<font>бондяев вячеслав</font>"
title[13]="<font>Владик Плтапов</font>"
title[14]="<font>vladik2305</font>"
title[15]="<font>Esmirnov.2093</font>"
title[16]="<font>dashkent8</font>"
title[17]="<font>nadezhda_boyko_77</font>"
title[18]="<font>1olgar23</font>"
title[19]="<font>killex</font>"
title[20]="<font>Sasha123</font>"
title[21]="<font>romik43</font>"
title[22]="<font>kirill_cheg</font>"
title[23]="<font>scheldon</font>"
title[24]="<font>sayfutdinovnafis</font>"
title[25]="<font>bogomolovsn72</font>"
title[26]="<font>Мороз Игорь</font>"
title[27]="<font>andrey20030312</font>"
document.write (""+title[a]+"");
//-->
</script>)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+24843.67р</span>&nbsp<span style= "color:#000000;">(Karabas 1027)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6230.30р</span>&nbsp<span style= "color:#000000;">(Кирил Кирюха)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12420.66р</span>&nbsp<span style= "color:#000000;">(Поля 093873)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+59681.24р</span>&nbsp<span style= "color:#000000;">(Сергей 777)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+1551.47р</span>&nbsp<span style= "color:#000000;">(DjVova)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+3103.23р</span>&nbsp<span style= "color:#000000;">(Кристина Бойко)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+1551.88р</span>&nbsp<span style= "color:#000000;">(Bankir)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6230.62р</span>&nbsp<span style= "color:#000000;">(Василиска)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+43831.86р</span>&nbsp<span style= "color:#000000;">(Игнат Панчиди)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+23115.23р</span>&nbsp<span style= "color:#000000;">(Grom1993)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6414.42р</span>&nbsp<span style= "color:#000000;">(Ася 10)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+44130.93р</span>&nbsp<span style= "color:#000000;">(Лиза С)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6230.22р</span>&nbsp<span style= "color:#000000;">(sokol 901)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+23319.84р</span>&nbsp<span style= "color:#000000;">(Майк)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6214.68р</span>&nbsp<span style= "color:#000000;">(Женечка222)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+44122.90р</span>&nbsp<span style= "color:#000000;">(Марат Выселков)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.27р</span>&nbsp<span style= "color:#000000;">(Ольга Черканова)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6983.31р</span>&nbsp<span style= "color:#000000;">(Рус190)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.23р</span>&nbsp<span style= "color:#000000;">(Зырков Илья)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+44329.44р</span>&nbsp<span style= "color:#000000;">(Geroy50)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+91311.46р</span>&nbsp<span style= "color:#000000;">(Вера)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6334.21р</span>&nbsp<span style= "color:#000000;">(Совельева Дарина)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+44212.34р</span>&nbsp<span style= "color:#000000;">(12092782BB)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+23919.92р</span>&nbsp<span style= "color:#000000;">(Солдат1)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+1551.21р</span>&nbsp<span style= "color:#000000;">(Карен Микоян)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.23р</span>&nbsp<span style= "color:#000000;">(Валя Ветер 1990)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+24855.46р</span>&nbsp<span style= "color:#000000;">(Lesnik)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+44112.31р</span>&nbsp<span style= "color:#000000;">(Анастасия)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+23219.61р</span>&nbsp<span style= "color:#000000;">(герасим 9090)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+1551.81р</span>&nbsp<span style= "color:#000000;">(Лушко Светлана)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+23332.71р</span>&nbsp<span style= "color:#000000;">(Сергеевна)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6454.46р</span>&nbsp<span style= "color:#000000;">(Томик)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.23р</span>&nbsp<span style= "color:#000000;">(Broker100)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+22319.41р</span>&nbsp<span style= "color:#000000;">(Михаил Кудаков)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+1551.90р</span>&nbsp<span style= "color:#000000;">(Эльнура)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+48972.36р</span>&nbsp<span style= "color:#000000;">(Xalk)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.23р</span>&nbsp<span style= "color:#000000;">(Боксер)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+1551.61р</span>&nbsp<span style= "color:#000000;">(Давид56788)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6224.81р</span>&nbsp<span style= "color:#000000;">(Снежинка)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+44002.40р</span>&nbsp<span style= "color:#000000;">(Наталья Пудова)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+3201.45р</span>&nbsp<span style= "color:#000000;">(Elesey)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.23р</span>&nbsp<span style= "color:#000000;">(Порш 99)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+3204.23р</span>&nbsp<span style= "color:#000000;">(Диана Сова)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+12415.23р</span>&nbsp<span style= "color:#000000;">(KiM)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+49601.51р</span>&nbsp<span style= "color:#000000;">(Русский Горец)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+3204.92р</span>&nbsp<span style= "color:#000000;">(Яна Рыжева)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+24812.90р</span>&nbsp<span style= "color:#000000;">(Олеся)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

            <li><center><table><tr><td><img src="images/stories/user.png" tppabs="http://obmen.tw1.ru/images/stories/user.png" width="35" border="0"/></td><td><span style= "color: #f96300;">+6214.53р</span>&nbsp<span style= "color:#000000;">(Виктор220)</span> <span style= "background-color: #000000;"> </span></td></tr></table></center></li>

        </ul>



    </div>



    </body>
    </html>
    <div style="padding: 900px 0 0 0px;"></div></div>

<div class="test13"><div style="padding: 955px 0 0 147px;"></div>














    <center><table style="height: 710px; width: 1000px;" border="0">
        <tbody>
        <tr>
            <td>
                <div style="padding:68px 0 0 85px;">


                    <html>
                    <head>
                        <meta charset="utf-8">
                        <title>overflow</title>
                        <style>
                            .layer {
                                overflow: hidden; /* Добавляем полосы прокрутки */
                                width: 440px; /* Ширина блока */
                                height: 430px; /* Высота блока */
                                padding: 2px; /* Поля вокруг текста */
                                border: solid 0px black; /* Параметры рамки */
                                background: #fff;
                            }
                        </style>
                    </head>
                    <body>
                    <div class="layer">
                        <p>

                            <table border="0">
                                <tbody>
                                <tr>
                                    <td><br /><img src="images/stories/3rub.jpg" tppabs="http://obmen.tw1.ru/images/stories/3rub.jpg" border="0" width="100" /></td>
                                    <td><img src="images/stories/19758815.png" tppabs="http://obmen.tw1.ru/images/stories/19758815.png" border="0" width="35" /></td>
                                    <td><br />

                                        <br />
                        <p><div style="padding:0px 0 14px 0px;">&nbsp&nbsp&nbsp<input class="button1" style="width: 130px; height: 40px;" onclick="javascript:window.location='register.php'/*tpa=http://obmen.tw1.ru/index.php/component/user/register*/" type="button" value="&#10;Запросить обмен" />&nbsp&nbsp&nbsp</div></p>
                        <br /><br /><br />


            </td>
            <td><strong><span style="color: #000000;"><span style="text-decoration: underline;"><center>Cуммы 0.00 RUB<br /><div style="padding:0px 0 0 0px;"><img src="images/stories/unnamed.png" tppabs="http://obmen.tw1.ru/images/stories/unnamed.png" border="0" width="27" alt="" /></div></center></span></strong></td>
        </tr></table><hr />
        <table><tr>
            <td><br /><br /><img src="images/stories/1bitkoin.jpg" tppabs="http://obmen.tw1.ru/images/stories/1bitkoin.jpg" border="0" width="100" /></td>
            <td><br /><img src="images/stories/19758815.png" tppabs="http://obmen.tw1.ru/images/stories/19758815.png" border="0" width="35" /></td>
            <td><br /><br />
                <br />
                <p><div style="padding:0px 0 14px 0px;">&nbsp&nbsp&nbsp<input class="button1" style="width: 130px; height: 40px;" onclick="javascript:window.location='register.php'/*tpa=http://obmen.tw1.ru/index.php/component/user/register*/" type="button" value="&#10;Запросить обмен" />&nbsp&nbsp&nbsp</div></p>
                <br /><br /><br /></td><td><br /><strong><span style="color: #000000;"><span style="text-decoration: underline;"><center>Cуммы 0.00 BTC<br /><img src="images/stories/bitcoin_icon2x.png" tppabs="http://obmen.tw1.ru/images/stories/bitcoin_icon2x.png" border="0" width="30" alt="" /></center></span></span></strong></td>
        </tr></table><hr />
        <table>
            <tr>
                <td><br /><br /><img src="images/stories/2dollar.jpg" tppabs="http://obmen.tw1.ru/images/stories/2dollar.jpg" border="0" width="100" /></td>
                <td><br /><img src="images/stories/19758815.png" tppabs="http://obmen.tw1.ru/images/stories/19758815.png" border="0" width="35" /></td>
                <td><br /><br />
                    <br />
                    <p><div style="padding:0px 0 14px 0px;">&nbsp&nbsp&nbsp<input class="button1" style="width: 130px; height: 40px;" onclick="javascript:window.location='register.php'/*tpa=http://obmen.tw1.ru/index.php/component/user/register*/" type="button" value="&#10;Запросить обмен" />&nbsp&nbsp&nbsp</div></p>
                    <br /><br /><br /></td><td><br /><strong><span style="color: #000000;"><span style="text-decoration: underline;"><center>Cуммы 0.00 USD<br /><img src="images/stories/dlree.png" tppabs="http://obmen.tw1.ru/images/stories/dlree.png" border="0" width="30" alt="" /></center></span></strong></td>
            </tr>
            </tbody>
        </table>

        </p>
</div>
</body>
</html>








</div></td>
<td><center><div style="height:68px;width:480px;"> </div>












</center>


    </center>
    </tr>
    </tbody>
    </table>
    </div>

    <div class="test4"><div style="padding:2px 0 0 210px;"><iframe width="668" height="364" src="https://www.youtube.com/embed/gNbfUolZLpM?rel=0&showinfo=0" tppabs="https://www.youtube.com/embed/gNbfUolZLpM?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe></div></div>

    <div class="test14"></div>







    <div class="test2">
    	<?php if($logged == 0){ ?>
	    	<a href="register.php" tppabs="http://obmen.tw1.ru/index.php/component/user/register"><img src="images/stories/reg.jpg" tppabs="http://obmen.tw1.ru/images/stories/reg.jpg" width="350" height="60" border="0" alt="Пример"></a>
	   	<?php } else { ?>
	   		<div style="margin-left: -100px; margin-top: 30px;">
	   			<a id="cash_in" class="button1" style="float: left; font-weight: bold;" href="#">Пополнить счет</a>
	   			<a id="cash_out" class="button1" style="float: right; font-weight: bold;" href="#">Вывести деньги</a>
	   			<span style="font-weight: bold; margin: 0 100px; line-height: 27px;">Ваш баланс: 0.00 RUB</span>
	   		</div>
			<?php } ?>
    </div>






    <div class="test16"></div>




    </div>
    </div>
    </div>
    </div>

    <footer class="art-footer clearfix">


        <center>
            <!--LiveInternet counter--><script type="text/javascript"><!--
        document.write("<a href='http://www.liveinternet.ru/click' "+
            "target=_blank><img src='//counter.yadro.ru/hit?t21.6;r"+
            escape(document.referrer)+((typeof(screen)=="undefined")?"":
                ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
            ";"+Math.random()+
            "' alt='' title='LiveInternet: показано число просмотров за 24"+
            " часа, посетителей за 24 часа и за сегодня' "+
            "border='0' width='88' height='31'><\/a>")
        //--></script><!--/LiveInternet--></center>




    </footer>

    </div>
    <p class="art-page-footer" style="display:none">
        <span id="art-footnote-links"><a href="javascript:if(confirm(%27http://www.artisteer.com/?p=joomla_templates  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.artisteer.com/?p=joomla_templates%27" tppabs="http://www.artisteer.com/?p=joomla_templates" target="_blank"></a></span>
    </p>
    </div>
<style>
.indigo_overlay{
	display: none;
	position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 1000;
}

.indigo_popup{
	width: 630px;
	height: 490px;
	background: #ffe9c6;
	border-radius: 8px;
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%, -50%);
	font: 14px/18px 'Tahoma', Arial, sans-serif;
	padding: 15px;
	border: 1px solid #383838;
	display: none;
}

.indigo_popup p{
	padding: 5px 0;	
}
</style>
<div class="indigo_overlay" >
   <div id="indigo_popup1" class="indigo_popup">
<p style="text-align: center;"><span style="font-size: medium;"><strong><span style="color: #ff5307;">№ ВАШЕГО СЧЕТА <span style="color: #ff5307;">-</span> <span style="color: #000000;">79164443801</span></span></strong></span></p>
<p style="text-align: center;"><span style="text-decoration: underline;"><span style="font-size: medium;"><strong><span style="color: #000000;"><br></span></strong></span></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">Пополнение счета производится при помощи электронной платежной системы 'QIWI' </span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">Перейдите на сайт <a href="http://qiwi.com" target="_blank"><strong><span style="font-size: medium;"><span style="color: #993300;">http://qiwi.com</span></span></strong></a> (Если у вас еще нет электронного кошелька, тогда зарегистрируете), </span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">далее пройдите в раздел '</span><span style="color: #ff5307;">Переводы</span><span style="color: #000000;">' и заполните форму в следующей последовательности:</span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"> </span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">1. В поле "Номер кошелька" укажите № счета который вы получили в данной&nbsp;системе после регистрации (Ваш № счета указан выше)</span> <span style="color: #ff5307;"><span style="text-decoration: underline;"></span></span><span style="color: #000000;"> </span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">2. В поле 'Комментарий к переводу'</span> <span style="color: #ff5307;">обязательно укажите свое логинное имя</span><span style="color: #000000;"> (Скопировать его можно в верхней части сайта) </span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">3. В поле 'Сумма' укажите сумму в рублях (Минимальный депозит для обмена 0.002 биткойнa) </span><span style="color: #ff5307;"> не менее 776.00 рублей</span><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;"></span></strong></span></p>
<p><span style="font-size: medium;"><strong><span style="color: #000000;">4.&nbsp;И в завершении нажмите 'Оплатить'</span></strong></span></p>

 
    <a class="close" title="Закрыть" href="#close"></a>
    </div>

       <div id="indigo_popup2" class="indigo_popup">
				<p style="color: red; font-size: 30px; text-align: center; margin-top: 200px;">У вас недостаточно средств на счете!</p>
 
    <a class="close" title="Закрыть" href="#close"></a>
    </div>
</div>

    </body>
    </html>

 <script>
 	$(".indigo_popup .close").click(function(){
 		$(".indigo_popup").fadeOut("medium", function(){
 			$(".indigo_overlay").fadeOut("fast");
 		});
 		return false;
 	});

 	$("#cash_in").click(function(){
 		$(".indigo_overlay").fadeIn("fast", function(){
 			$("#indigo_popup1").fadeIn("medium");
 		});
 		return false;
 	});

 	$("#cash_out").click(function(){
 		$(".indigo_overlay").fadeIn("fast", function(){
 			$("#indigo_popup2").fadeIn("medium");
 		});
 		return false;
 	});
 </script>