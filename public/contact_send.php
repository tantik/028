<?php

/*
require_once "./inc/db.php";
*/


if ($_POST['upflg'] == 1) {


	// POSTデータのSQLの為のエスケープ処理
	/*foreach ( (array)$_POST as $key => $val ) {
		if (!is_array($val)) $_POST[$key] = htmlentities(pg_escape_string($val), ENT_QUOTES, mb_internal_encoding());
	}
*/

	//チェックボックス
	$item = "";

	foreach ( (array)$_POST['item'] as $key => $val ) {
		$item .= $val."  ";
	}

	// ホームページ運営者に返信するメール
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	$today = date("Y/m/d H:i:s");

	/* 案件によって調整
	------------------------------------------------------------ */

	/* 件名、本文冒頭 */
	$mail_title = "■■■";
	//$mail_title = $passmaster_array['hptitle'];

	/* クライアントメールアドレス */
	$mailto   = "koushin@extlink.co.jp";
	//$mailto = $infomail;

	/* エンドユーザー返信メール末尾の案件アドレス */
	$site_url_mail = "http://site-one.net/esite/●●●/";
	//$site_url_mail = $site_url;

	/* "メインの送信先アドレスをExtlink発行のメールアドレスにしない場合、
		BCC枠に「info@{各ドメインアドレス　例：info@extlink.co.jp}」を入れてください。
		メインアドレスがExtlink発行のメールの場合は別途BCC用のメールアドレスを
		発行し、そちらを設定してください */
	$header_bcc = "system@extlink.co.jp";

	/* --------------------------------------------------------- */


	$subject = "{$mail_title}ホームページの『お問い合わせ』より送信";

	$message = <<< maildata
{$mail_title}ホームページの『お問い合わせ』よりメールがありました。

送信日時：{$today}

＜送信内容＞

お名前：{$_POST['name']}
お名前　ふりがな：{$_POST['kana']}

ご住所：〒{$_POST['zip1']}-{$_POST['zip2']} {$_POST['pref']} {$_POST['city']} {$_POST['add']}
お電話番号：{$_POST['tel']}
メールアドレス：{$_POST['mail']}

性別：{$_POST['sex']}
カテゴリー：{$_POST['cate']}
お問合せ項目：{$item}

お問い合わせ内容：{$_POST['msg']}

maildata;

	$fromName = mb_encode_mimeheader($mail_title);
	$header    = "From:{$fromName} <{$mailto}>" .PHP_EOL;
	
	
	//BCCでメールを送信させる 20170608 kajiwara 編集
	$header   .= "Bcc:{$header_bcc}";

	//メール送信
	mb_send_mail($mailto, $subject, $message, $header);

	// ユーザー宛
	$header = "From:".mb_encode_mimeheader($mail_title)."<".$mailto.">\r\n";
	$mailto_guest = $_POST['mail'];
	$subject = "【{$mail_title}】お問い合わせフォーム確認メール";
	$message = <<<_message
『{$mail_title}』ホームページ より、
お問い合わせ頂きまして、誠にありがとうございます。
お問い合わせ内容については、後日こちらよりご連絡をさせて頂きます。

このメールは、メールサーバより自動送信しています。

送信日時：{$today}

----------------------------------------------------------------------

＜お問い合わせ内容＞

お名前：{$_POST['name']}
お名前　ふりがな：{$_POST['kana']}

ご住所：〒{$_POST['zip1']}-{$_POST['zip2']} {$_POST['pref']} {$_POST['city']} {$_POST['add']}
お電話番号：{$_POST['tel']}
メールアドレス：{$_POST['mail']}

性別：{$_POST['sex']}
カテゴリー：{$_POST['cate']}
お問合せ項目：{$item}

お問い合わせ内容：{$_POST['msg']}

----------------------------------------------------------------------

{$mail_title}ホームページの『お問い合わせ』より送信
URL：{$site_url_mail}

_message;


	//メール送信
	mb_send_mail($mailto_guest,$subject,$message,$header);

} else {

	header("Location: ./contact.php");
	exit;

}