<?php
header("Content-Type: text/html; charset=utf-8");
include_once 'config.php';

if (isset($_POST['name']) AND  $_POST['name']!= '')
{
	$mysqli = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	mysqli_query($mysqli, "SET NAMES utf8");

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$invite = mysqli_real_escape_string($mysqli, $_POST['invite']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$password2 = mysqli_real_escape_string($mysqli, $_POST['password2']);
	$sex = mysqli_real_escape_string($mysqli, $_POST['sex']);

	$check_query = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `users` WHERE login = '$username'"));
	if ($check_query['id'] > 0)
	{
		$err_message = 'Пользователь с таким логином уже существует.';
	}
	else
	{
		$check_query = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'"));
		if ($check_query['id'] > 0)
		{
			$err_message = 'Пользователь с таким email\'ом уже существует.';		
		}
		else
		{
			mysqli_query($mysqli, "INSERT INTO users VALUES('', '$name', '$username', '$email', '$invite', '".md5($password)."', '$sex', '".date('Y-m-d H:i:s')."')");
			
			setcookie("username", $username, time()+3600*24*7, "/");
			setcookie("password", md5($password), time()+3600*24*7, "/");
			
			header('Location: index.php');
			die();
		}
	}

	mysqli_close($mysqli);
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="ru-ru">
<head>
      <xbasehref="http://obmen.tw1.ru/index.php/component/user/register" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="" />
  <meta name="description" content="Начинайте зарабатывать деньги от 9000 рублей ежедневно прямо сейчас.
Заработок на дому всем желающим вместе с &quot;Bitcoin Invest&quot;" />
  <meta name="generator" content="Joomla! 1.5 - Open Source Content Management; jQuery++ Intergator by tushev.org" />
  <title></title>
  <link href="templates/bitcoin11/favicon.ico.png" tppabs="http://obmen.tw1.ru/templates/bitcoin11/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  <link rel="stylesheet" href="plugins/system/cdscriptegrator/libraries/highslide/css/highslide.css" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/highslide/css/highslide.css" type="text/css" />
  <link rel="stylesheet" href="media/plg_vtemtooltip/css/jquery.qtip.css" tppabs="http://obmen.tw1.ru/media/plg_vtemtooltip/css/jquery.qtip.css" type="text/css" />
  <link rel="stylesheet" href="modules/mod_jmlogin/mod_jmlogin.css.php.css" tppabs="http://obmen.tw1.ru/modules/mod_jmlogin/mod_jmlogin.css.php" type="text/css" />
  <link rel="stylesheet" href="modules/mod_jmlogin/styles/horizontal/yellow/style.css" tppabs="http://obmen.tw1.ru/modules/mod_jmlogin/styles/horizontal/yellow/style.css" type="text/css" />
  <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/highslide/js/highslide-full.min.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/highslide/js/highslide-full.min.js"></script>
  <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/jquery/js/jquery-1.4.2.min.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/jquery/js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/jquery/js/jquery-noconflict.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/jquery/js/jquery-noconflict.js"></script>
  <script type="text/javascript" src="plugins/system/cdscriptegrator/libraries/jquery/js/ui/jquery-ui-1.8.2.custom.min.js" tppabs="http://obmen.tw1.ru/plugins/system/cdscriptegrator/libraries/jquery/js/ui/jquery-ui-1.8.2.custom.min.js"></script>
  <script type="text/javascript" src="../ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" tppabs="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script type="text/javascript" src="plugins/system/jqueryintegrator/jquery.noconflict.js" tppabs="http://obmen.tw1.ru/plugins/system/jqueryintegrator/jquery.noconflict.js"></script>
  <script type="text/javascript" src="media/system/js/mootools.js" tppabs="http://obmen.tw1.ru/media/system/js/mootools.js"></script>
  <script type="text/javascript" src="media/system/js/validate.js" tppabs="http://obmen.tw1.ru/media/system/js/validate.js"></script>
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
    
    


    <!--[if lt IE 9]><script src="../html5shiv.googlecode.com/svn/trunk/html5.js" tppabs="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="templates/bitcoin11/css/template.css" tppabs="http://obmen.tw1.ru/templates/bitcoin11/css/template.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="templates/bitcoin11/css/template.ie7.css" tppabs="http://obmen.tw1.ru/templates/bitcoin11/css/template.ie7.css" media="screen" /><![endif]-->


    <script>if ('undefined' != typeof jQuery) document._artxJQueryBackup = jQuery;</script>
    <script src="templates/bitcoin11/jquery.js" tppabs="http://obmen.tw1.ru/templates/bitcoin11/jquery.js"></script>
    <script>jQuery.noConflict();</script>

    <script src="templates/bitcoin11/script.js" tppabs="http://obmen.tw1.ru/templates/bitcoin11/script.js"></script>
    <script>if (document._artxJQueryBackup) jQuery = document._artxJQueryBackup;</script>
</head>
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









<div class="test5"></div>





<div class="test1"><div style="padding:0px 0px 0px 20px;"><img src="images/stories/57c5be9861f5302a33116316_bitcoin-rotate.gif" tppabs="http://obmen.tw1.ru/images/stories/57c5be9861f5302a33116316_bitcoin-rotate.gif" border="0" width="180" /></div></div>
<div class="test10"><a href="vopros.htm" tppabs="http://obmen.tw1.ru/vopros" class="button5 brown"><div class="light"  style="width: 38px;"></div>Вопросы</a></div>
<div class="test11"><a href="otzivi.htm" tppabs="http://obmen.tw1.ru/otzivi" class="button5 brown"><div class="light" "></div>Отзывы</a></div>
<div class="test12"><a href="kontakti.htm" tppabs="http://obmen.tw1.ru/kontakti" class="button5 brown"><div class="light"></div>Контакты</a></div>
<div class="test20"></div>


<div class="test3">
<form method="post" name="login">

<span class="horizontal" style="display: block;">
	<span class="jm-login">
	
				
				
		<span class="login">
		
						
			<span class="username">
			
				<input type="text" name="username" size="18" alt="Логин" value="Логин" onblur="if(this.value=='') this.value='Логин';" onfocus="if(this.value=='Логин') this.value='';" />
									
			</span>

			
			<span class="password">
			
				<input type="password" name="passwd" size="10" alt="" value="" onblur="if(this.value=='') this.value='';" onfocus="if(this.value=='') this.value='';" />
							</span>

						<input type="hidden" name="remember" value="yes" />
						
			<span class="login-button-icon">
				<button value="" name="Submit" type="submit" title="Вход"></button>
							</span>
			
			
	
				
		
								
				<input type="hidden" name="option" value="com_user" />
				<input type="hidden" name="task" value="login" />
				<input type="hidden" name="return" value="L21hcmtldGluZy5odG1s" />
				<input type="hidden" name="08c9a313ff48c5e7d40a94cd2ec9a72f" value="1" />			</span>
		
				
	</span>
</span>
</form></div>
<div class="test8"><a href="index.php" tppabs="http://obmen.tw1.ru/" class="button5 brown"><div class="light" style="width: 38px;"> </div>Главная</a></div>
<div class="test7"></div>
<div class="test9"><a href="instrykciya.htm" tppabs="http://obmen.tw1.ru/instrykciya" class="button5 brown"><div class="light"> </div>Правила</a></div>






<div class="art-layout-wrapper clearfix">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">

                        <div class="art-layout-cell art-content clearfix">
<article class="art-post art-messages"><div class="art-postcontent clearfix"></div></article><article class="art-post"><div class="art-postcontent clearfix"><html> <head>         <style type="text/css">         BODY {         background: url(bg.gif)/*tpa=http://obmen.tw1.ru/index.php/component/user/bg.gif*/;          }         .semiopacity {         position: relative;         width: 100%;         height: 1600px;          }         .semiopacity .transparent {         background: #ffffff;          opacity: 1;          filter: alpha(Opacity=50);          height: 100%;         }         .semiopacity .text {         padding: 5px;         position: absolute;         left: 95px; top: 20px;          }      </style></head><body>      <div class="semiopacity">      <div class="transparent"></div>      <div class="text">
  <div style="color:#EF7F1A; font-size:24px; margin-bottom:10px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspРЕГИСТРАЦИЯ</div>
  <Br><Br>
<script type="text/javascript">
<!--
	Window.onDomReady(function(){
		document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
	});
// -->
</script>


<form method="post" id="josForm" name="josForm" class="form-validate">

<div class="componentheading"></div>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="contentpane">
<?php if (isset($err_message) AND $err_message != '') { ?>
<tr>
	<td width="30%" height="40"></td>
	<td style="color:red; font-weight:bold; font-size:16px;"><?=$err_message;?></td>
</tr>
<?php } ?>

<tr>
	<td width="30%" height="40">
		<label id="namemsg" for="name">
					</label>
	</td>
  <td><b>Имя/Фамилия:</b>
  		<input type="text" name="name" placeholder="Пример: Иванов Иван" id="name" size="40" value="" class="inputbox required" maxlength="50" /><span style="color: #ff0000;">*</span>
  	</td>
</tr>
  
  
  
  
<tr>
	<td height="40">
		<label id="usernamemsg" for="username">
					</label>
	</td>
  <td><b>Логин:</b>
		<input type="text" placeholder="Пример: ivanovivan" id="username" name="username" size="40" value="" class="inputbox required validate-username" maxlength="25" /><span style="color: #ff0000;">*</span>
	</td>
</tr>
  
  
  
  
  
  
<tr>
	<td height="40">
		<label id="emailmsg" for="email">
					</label>
	</td>
	<td>
		<b>Ваш e-mail:</b><input type="text" placeholder="Пример: ivanovivan@gmail.com" id="email" name="email" size="40" value="" class="inputbox required validate-email" maxlength="100" /><span style="color: #ff0000;">*</span>
	</td>
</tr>
  
  
  
  
  
  <tr>
<td height="40">
<label id="invitemsg" for="invite">
</label>
</td>
<td><b>Ваш телефон (номер QIWI-кошелька):</b>
<input type="text" name="invite" placeholder="Пример: +79876565210" id="invite" size="40" value="" class="inputbox" maxlength="100" /><span style="color: #ff0000;">*</span>
</td>
</tr>
  
  
  
  
  
  
  
<tr>
	<td height="40">
		<label id="pwmsg" for="password">
					</label>
	</td>
  	<td><b>Пароль:</b>
  		<input class="inputbox required validate-password" type="password" id="password" name="password" size="40" value="" /><span style="color: #ff0000;">*</span>
  	</td>
</tr>
<tr>
	<td height="40">
		<label id="pw2msg" for="password2">
					</label>
	</td>
	<td><b>Подтвердите пароль:</b>
		<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" size="40" value="" /><span style="color: #ff0000;">*</span>
	</td>
  
  <tr>
<td height="40">
<label id="invitemsg" for="invite">

</label>
  <td><span style="font-weight:bold; color:#223146;">Пол: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><input type="radio" name="sex" value="1" checked>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspМУЖ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="sex" value="2">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspЖЕН</td></tr>
  
  
  
  
  
  
  <tr>
<td height="40">
<label id="invitemsg" for="invite">

</label>
</td>
<td>
<br><br><head>
    <title>Пример работы CSS</title>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<style>
.prokrutka {
height: 150px; /* высота нашего блока */
width: 420px; /* ширина нашего блока */
background: #fff; /* цвет фона, белый */
border: 1px solid #C1C1C1; /* размер и цвет границы блока */
overflow-x: scroll; /* прокрутка по горизонтали */
overflow-y: scroll; /* прокрутка по вертикали */
}
</style>

  </head>

  <body>
<div class="prokrutka">
<p style="font-size: 14px; color: #474747; font-family: 'PT Sans', sans-serif; line-height: normal;" align="left"><strong>1. Общая информация</strong><br />"Bitcoin Broker" - система обмена неравных курсов валют с целью прибыли. Наш сервис - это только программное обеспечение, которое предоставляет участникам личные кабинеты и удобство использования системой обмена. Условия настоящего соглашения принимаются участниками в полном объеме и без каких-либо оговорок путем присоединения к соглашению в том виде, в каком оно изложено на сайте «Bitcoin Broker».<br /><br /><strong>2. Регистрация в проекте </strong><br />Пользоваться сервисом разрешается всем желающим с учетом того, что вы будете без претензионно использовать данную систему. Администрация разрешает создавать несколько аккаунтов от одного человека, только с разными электронными почтами.<br />Для регистрации пользователь обязуется предоставить достоверную и полную информацию о себе по форме регистрации, размещенной на странице «Bitcoin Broker». <br />Администрация оставляет за собой право в любой момент потребовать от участника подтверждения данных, указанных при регистрации, и запросить в связи с этим подтверждающие документы. <br />Персональная информация участника хранится и обрабатывается в режиме, обеспечивающем ее конфиденциальность в соответствии с положениями действующего законодательства. <br />Присоединяясь к сообществу, пользователь дает свое согласие на обработку его персональных данных.<br />Вы соглашаетесь с тем, что Ваши контактные данные, указанные при регистрации, будут доступны Вашим партнёрам для связи с Вами.<br /><br /><strong>3. Руководство проекта не несёт ответственность за получение или неполучение Вами ожидаемой прибыли. Проект не собирает деньги с людей для их дальнейшего распределения, а значит не может быть должен Вам какую бы то ни было сумму. Все финансовые операции производятся исключительно между электронными платежными системами. <br />Так же руководство сервиса не несёт ответственности за проблемы, которые могут возникнуть в используемой платёжной системе QIWI, так как не является владельцем или совладельцем данной платёжной системы.</p>
<p style="font-size: 14px; color: #474747; font-family: 'PT Sans', sans-serif; line-height: normal;" align="left"><strong>4. Удаление пользователей из проекта</strong><br />Удаление Вас из проекта может быть вызвано:<br />- доказанными случаями мошенничества при использовании программного обеспечения проекта;<br />- Доказанными попытками взлома программного кода или базы данных проекта;</p>
<p style="font-size: 14px; color: #474747; font-family: 'PT Sans', sans-serif; line-height: normal;" align="left">Данный договор является публичной офертой и вступает в силу с момента принятия его Вами, посредством отметки о принятии условий договора, когда Вы ставите галочку под данными условиями.</p>  
</div>
  </body>
</td>
</tr>
  
  
  
<tr>
<td height="40">
<label id="citymsg" for="city">
</label>
</td>
<td>
<input type="checkbox" id="city" name="city" size="40" value="yes" class="inputbox required" maxlength="25" /><span style="color: #8e8e8e; font-family: 'PT Sans', sans-serif; font-size: medium; line-height: normal;">&nbsp&nbsp&nbsp&nbsp&nbspЯ прочитал(а) и принимаю условия договора.</span><span style="color: #ff0000;">*</span>
</td>
</tr>

<tr>
	<td colspan="2" height="40">
		поля, отмеченные звездочкой (*), обязательны для заполнения.	</td>
</tr>

</table>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <button class="button validate" style="width: 230px; height: 40px; type="submit">
	Зарегистрироваться</button>
	<input type="hidden" name="task"  value="register_save" />
	<input type="hidden" name="id"  value="0" />
	<input type="hidden" name="gid"  value="0" />
	<input type="hidden" name="08c9a313ff48c5e7d40a94cd2ec9a72f" onclick="ym(51990071, 'reachGoal', 'rega'); return true;" value="1" /></form>
</div></div></body></html></div></article>


<div class="atest21"></div>
<div class="test15"></div>
<div class="test17"></div>

<div class="test6"></div>



<div class="test18"></div>

<div class="test13">
</div>

<div class="test4"></div>

<div class="test14"></div>







<div class="test2">
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
    <p class="art-page-footer">
        <span id="art-footnote-links"><a href="javascript:if(confirm(%27http://www.artisteer.com/?p=joomla_templates  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.artisteer.com/?p=joomla_templates%27" tppabs="http://www.artisteer.com/?p=joomla_templates" target="_blank"></a></span>
    </p>
</div>


</body>
</html>