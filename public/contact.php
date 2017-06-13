<?php

/*
require_once "./inc/db.php";
require_once "./inc/function.php";
*/


?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8">
<title>お問い合わせ｜サンプルサイト</title>
<meta name="viewport" content="width=1000">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<meta name="keywords" content=",,,,">
<meta name="description" content="">

<!--▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△-->
<meta name="robots" content="noindex,nofollow"><!-- 本アップ前に必ず外す -->
<!--▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△▼△-->

<!-- OGP -->
<meta property="og:type" content="article">
<meta property="og:title" content="お問い合わせ｜サンプルサイト"><!-- titleと文字数も揃える -->
<meta property="og:site_name" content="サイト名">
<meta property="og:url" content="//www.site-one.net/esite/【ファイル名】/">
<meta property="og:image" content="//www.site-one.net/esite/【ファイル名】/img/og_img.png"><!-- 1200x630推奨 -->
<meta property="og:description" content="ディスクリプション">

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@xxx">
<meta name="twitter:creator" content="@xxx">
<meta name="twitter:domain" content="xxx.jp">

<link rel="stylesheet" href="common/css/default.css" media="screen,print">
<link rel="stylesheet" href="common/css/common.css" media="screen,print">

<link rel="shortcut icon" href="./img/favicon.ico">
<link rel="icon" type="image/png" href="./img/favicon.png">
<link rel="apple-touch-icon-precomposed" href="./img/apple-touch-icon-152x152.png">

<script src="common/js/jquery-1.11.0.min.js"></script>
<script src="common/js/over.js"></script>
<script src="common/js/pageTop.js"></script>

<link rel="stylesheet" href="common/css/validationEngine.jquery.css">
<link rel="stylesheet" href="common/plugin/jquery-ui-1.11.4.custom/jquery-ui.min.css">

<script src="common/js/jquery.autoKana.js"></script>
<script src="common/js/jquery.jpostal.js"></script>

<script src="common/js/jquery.validationEngine.js"></script>
<script src="common/js/jquery.validationEngine-ja.js"></script>
<script src="common/plugin/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<script src="common/js/mail_send.js"></script>

<!--[if lt IE 9]>
<script src="common/js/html5shiv.min.js"></script>
<![endif]-->

</head>



<body id="pTop" class="article contact">



<div id="main">

	<div class="conteBox">

<?php if ($_REQUEST['sendFlg'] == 1) { ?>

<p>お問い合わせありがとうございます。<br>
内容などにより回答に時間がかかる場合がございますので、予めご了承ください。</p>
<a href="./" class="toHome">HOMEへ戻る</a>

<?php } else { ?>



<form id="contactForm" method="POST">

<table class="tb tb2 contact_tb">

<tr>
<th><label for="name">お名前<em>必須</em></label></th>
<td><input type="text" name="name" value="" id="name" class="validate[required]"></td>
</tr>

<tr>
<th><label for="kana">お名前　ふりがな<em>必須</em></label></th>
<td><input type="text" name="kana" value="" id="kana" class="validate[required]"></td>
</tr>

<tr>
<th><label for="zip1">ご住所<em>必須</em></label></th>
<td class="zip1">
&#12306;<input type="text" name="zip1" maxlength="3" id="zip1" class="validate[required,custom[integer]]"> - <input type="text" name="zip2" maxlength="4" id="zip2" class="validate[required,custom[integer]]">
<em class="form_notice1">郵便番号を入力すると、自動で都道府県と市町村郡が表示されます。</em><br>

<label>都道府県<input type="text" name="pref" value="" id="pref" class="validate[required]"></label><br>

<label>市区町村<input type="text" name="city" value="" id="city" class="validate[required]"></label><br>

<label>番地<input type="text" name="add" value="" id="add" class="validate[required]"></label>
</td>
</tr>

<tr>
<th><label for="tel">お電話番号<em>必須</em></label></th>
<td><input id="tel" type="text" name="tel" value="" class="validate[required,custom[phone]]"></td>
</tr>

<tr>
<th><label for="mail">メールアドレス<em>必須</em></label></th>
<td><input id="mail" type="text" name="mail" value="" class="validate[required,custom[email]]"></td>
</tr>

<tr>
<th>性別</th>
<td>
<label><input type="radio" name="sex" value="男" checked="checked">男</label>
<label><input type="radio" name="sex" value="女">女</label>
</td>
</tr>

<tr>
<th>カテゴリー</th>
<td>
<select name="cate">
<option value="カテゴリー1">カテゴリー1</option>
<option value="カテゴリー2">カテゴリー2</option>
<option value="カテゴリー3">カテゴリー3</option>
<option value="カテゴリー4">カテゴリー4</option>
<option value="カテゴリー5">カテゴリー5</option>
</select>
</td>
</tr>


<tr>
<th>お問合せ項目（複数可）</th>
<td>
<?php

//項目を配列化
$contents = array("項目1","項目2","項目3","項目4","項目5","項目6");

foreach ( (array)$contents as $key => $val) {
	
?>
<label><input type="checkbox" name="item[<?=$key?>]" value="<?=$val?>"><?=$val?></label>
<?php } ?>
</td>
</tr>


<tr>
<th><label for="msg">お問い合わせ内容<em>必須</em></label></th>
<td><textarea name="msg" id="msg" class="txtfiled validate[required]"></textarea></td>
</tr>

</table>
<input type="hidden" name="upflg" value="1">

<ul class="choose_list1 cf">
<li><input class="clearForm" type="reset" name="reset" value="リセットする"></li>
<li><input class="clearForm2" type="submit" name="send" value="入力内容の確認"></li>
</ul>

</form>

<?php } ?>

</div><!-- /conteBox -->

</div><!-- /#main -->


</body>
</html>