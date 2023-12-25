<?php
var_dump($_POST);

// 変数の初期化
$page_flag = 0;

$clean = array();
$error = array();

// サニタイズ
if( !empty($_POST) ) {
	foreach( $_POST as $key => $value ) {
		$clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	}
}

if( !empty($clean['btn_confirm']) ) {

	$error = validation($clean);

	if( empty($error) ) {
		$page_flag = 1;
	}

}elseif( !empty($clean['btn_submit']) ) {

	$page_flag = 2;

	
	// 変数とタイムゾーンを初期化
	$header = null;
	$auto_reply_subject = null;
	$auto_reply_text = null;
	date_default_timezone_set('Asia/Tokyo');
	$admin_reply_subject = null;
	$admin_reply_text = null;


	// ヘッダーに情報を追加
	$header = "MIME-Version: 1.0\n";
	$header .= "From: GRAYCODE <noreply@gray-code.com>\n";
	$header .= "Reply-To: GRAYCODE <noreply@gray-code.com>\n";

	// 件名を設定
	$auto_reply_subject = 'メール送信のテスト';

	// 本文を設定
	$auto_reply_text = "メール本文です。\n\n";

	//メール本文の追加
	$auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	$auto_reply_text .= "氏名：" . $_POST['your_name'] . "\n";
	$auto_reply_text .= "メールアドレス：" . $_POST['email'] . "\n\n";
	$auto_reply_text .= "GRAYCODE 事務局";

	if( $_POST['gender'] === "male" ) {
		$auto_reply_text .= "性別：男性\n";
	} else {
		$auto_reply_text .= "性別：女性\n";
	}

	if( $_POST['age'] === "1" ){
		$auto_reply_text .= "年齢:〜19歳\n";
	} elseif ( $_POST['age'] === "2" ){
		$auto_reply_text .= "年齢:20歳〜29歳\n";
	} elseif ( $_POST['age'] === "3" ){
		$auto_reply_text .= "年齢:30歳〜39歳\n";
	} elseif ( $_POST['age'] === "4" ){
		$auto_reply_text .= "年齢:40歳〜49歳\n";
	} elseif( $_POST['age'] === "5" ){
		$auto_reply_text .= "年齢:50歳〜59歳\n";
	} elseif( $_POST['age'] === "6" ){
		$auto_reply_text .= "年齢:60歳〜\n";
	}

	$auto_reply_text .= "お問い合わせ内容：" . nl2br($_POST['contact']) . "\n\n";




	// メール送信
	mb_send_mail( $_POST['email'], $auto_reply_subject, $auto_reply_text, $header);

		// 運営側へ送るメールの件名
		$admin_reply_subject = "お問い合わせを受け付けました";
	
		// 本文を設定
		$admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
		$admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
		$admin_reply_text .= "氏名：" . $_POST['your_name'] . "\n";
		$admin_reply_text .= "メールアドレス：" . $_POST['email'] . "\n\n";

		if( $_POST['gender'] === "male" ) {
			$admin_reply_text .= "性別：男性\n";
		} else {
			$admin_reply_text .= "性別：女性\n";
		}
	
		if( $_POST['age'] === "1" ){
			$admin_reply_text .= "年齢:〜19歳\n";
		} elseif ( $_POST['age'] === "2" ){
			$admin_reply_text .= "年齢:20歳〜29歳\n";
		} elseif ( $_POST['age'] === "3" ){
			$admin_reply_text .= "年齢:30歳〜39歳\n";
		} elseif ( $_POST['age'] === "4" ){
			$admin_reply_text .= "年齢:40歳〜49歳\n";
		} elseif( $_POST['age'] === "5" ){
			$admin_reply_text.= "年齢:50歳〜59歳\n";
		} elseif( $_POST['age'] === "6" ){
			$admin_reply_text.= "年齢:60歳〜\n";
		}
	
		$admin_reply_text .= "お問い合わせ内容：" . nl2br($_POST['contact']) . "\n\n";
	
		// 運営側へメール送信
		mb_send_mail('miwa_y@gp1000.jp', $admin_reply_subject, $admin_reply_text, $header);

		
	

}

function validation($data){

	$error = array();

	// 氏名のバリデーション
	if(empty($data['your_name'])){
		$error[] = "「氏名」は必ず入力してください。";
	}elseif( 20 < mb_strlen($data['your_name']) ) {
		$error[] = "「氏名」は20文字以内で入力してください。";
	}

	// メールアドレスのバリデーション
	if( empty($data['email']) ) {
		$error[] = "「メールアドレス」は必ず入力してください。";
	}elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email']) ) {
		$error[] = "「メールアドレス」は正しい形式で入力してください。";
	}

	// 性別のバリデーション
	if( empty($data['gender']) ) {
		$error[] = "「性別」は必ず入力してください。";
	}elseif( $data['gender'] !== 'male' && $data['gender'] !== 'female' ) {
		$error[] = "「性別」は必ず入力してください。";
	}

	// 年齢のバリデーション
	if( empty($data['age']) ) {
		$error[] = "「年齢」は必ず入力してください。";
	} elseif( (int)$data['age'] < 1 || 6 < (int)$data['age'] ) {
		$error[] = "「年齢」は必ず入力してください。";
	}

	// お問い合わせ内容のバリデーション
	if( empty($data['contact']) ) {
		$error[] = "「お問い合わせ内容」は必ず入力してください。";
	}

	// プライバシーポリシー同意のバリデーション
	if( empty($data['agreement']) ) {
		$error[] = "プライバシーポリシーをご確認ください。";
	}elseif( (int)$data['agreement'] !== 1 ) {
		$error[] = "プライバシーポリシーをご確認ください。";
	}

	return $error;
}

?>
<!DOCTYPE>
<html lang="ja">
<head>
<title>お問い合わせフォーム</title>
<style rel="stylesheet" type="text/css">
body {
	padding: 20px;
	text-align: center;
}

h1 {
	margin-bottom: 20px;
	padding: 20px 0;
	color: #209eff;
	font-size: 122%;
	border-top: 1px solid #999;
	border-bottom: 1px solid #999;
}

input[type=text] {
	padding: 5px 10px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}

input[name=btn_confirm],
input[name=btn_submit],
input[name=btn_back] {
	margin-top: 10px;
	padding: 5px 20px;
	font-size: 100%;
	color: #fff;
	cursor: pointer;
	border: none;
	border-radius: 3px;
	box-shadow: 0 3px 0 #2887d1;
	background: #4eaaf1;
}

input[name=btn_back] {
	margin-right: 20px;
	box-shadow: 0 3px 0 #777;
	background: #999;
}

.element_wrap {
	margin-bottom: 10px;
	padding: 10px 0;
	border-bottom: 1px solid #ccc;
	text-align: left;
}

label {
	display: inline-block;
	margin-bottom: 10px;
	font-weight: bold;
	width: 150px;
}

.element_wrap p {
	display: inline-block;
	margin:  0;
	text-align: left;
}

label[for=gender_male],
label[for=gender_female],
label[for=agreement] {
	margin-right: 10px;
	width: auto;
	font-weight: normal;
}

textarea[name=contact] {
	padding: 5px 10px;
	width: 60%;
	height: 100px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}
.error_list {
	padding: 10px 30px;
	color: #ff2e5a;
	font-size: 86%;
	text-align: left;
	border: 1px solid #ff2e5a;
	border-radius: 5px;
}
</style>
</head>
<body>
<h1>お問い合わせフォーム</h1>
<?php if( $page_flag === 1 ): ?>

// ここに確認ページが入る 2ページ目

<form method="post" action="">
	<div class="element_wrap">
		<label>氏名</label>
		<p><?php echo $_POST['your_name']; ?></p>
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<p><?php echo $_POST['email']; ?></p>
	</div>

	<div class="element_wrap">
		<label>性別</label>
		<p><?php if( $_POST['gender'] === "male" ){ echo '男性'; }
		else{ echo '女性'; } ?></p>
	</div>
	<div class="element_wrap">
		<label>年齢</label>
		<p><?php if( $_POST['age'] === "1" ){ echo '〜19歳'; }
		elseif( $_POST['age'] === "2" ){ echo '20歳〜29歳'; }
		elseif( $_POST['age'] === "3" ){ echo '30歳〜39歳'; }
		elseif( $_POST['age'] === "4" ){ echo '40歳〜49歳'; }
		elseif( $_POST['age'] === "5" ){ echo '50歳〜59歳'; }
		elseif( $_POST['age'] === "6" ){ echo '60歳〜'; } ?></p>
	</div>
	<div class="element_wrap">
		<label>お問い合わせ内容</label>
		<p><?php echo nl2br($_POST['contact']); ?></p>
	</div>
	<div class="element_wrap">
		<label>プライバシーポリシーに同意する</label>
		<p><?php if( $_POST['agreement'] === "1" ){ echo '同意する'; }
		else{ echo '同意しない'; } ?></p>
	</div>

	<input type="submit" name="btn_back" value="戻る">
	<input type="submit" name="btn_submit" value="送信">
	<input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
	<input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
	<input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">
	<input type="hidden" name="age" value="<?php echo $_POST['age']; ?>">
	<input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
	<input type="hidden" name="agreement" value="<?php echo $_POST['agreement']; ?>">
</form>

<?php elseif( $page_flag === 2 ): ?>



<p>送信が完了しました。</p>

<?php else: ?>

<?php if( !empty($error) ): ?>
	<ul class="error_list">
	<?php foreach( $error as $value ): ?>
		<li><?php echo $value; ?></li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>	

<form method="post" action="">
	<div class="element_wrap">
		<label>氏名</label>
		<!-- 次のページに自動入力 -->
		<input type="text" name="your_name" value="<?php if( !empty($_POST['your_name']) ){ echo $_POST['your_name']; } ?>">
	</div>
	<div class="element_wrap">
		<label>メールアドレス</label>
		<!-- 次のページに自動入力 -->
		<input type="text" name="email" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>">
	</div>
	<div class="element_wrap">
		<label>性別</label>
		<label for="gender_male"><input id="gender_male" type="radio" name="gender" value="male" <?php if( !empty($_POST['gender']) && $_POST['gender'] === "male" ){ echo 'checked'; } ?>>男性</label>
		<label for="gender_female"><input id="gender_female" type="radio" name="gender" value="female" <?php if( !empty($_POST['gender']) && $_POST['gender'] === "female" ){ echo 'checked'; } ?>>女性</label>
	</div>
	<div class="element_wrap">
		<label>年齢</label>
		<select name="age">
			<option value="">選択してください</option>
			<option value="1" <?php if( !empty($_POST['age']) && $_POST['age'] === "1" ){ echo 'selected'; } ?>>〜19歳</option>
			<option value="2" <?php if( !empty($_POST['age']) && $_POST['age'] === "2" ){ echo 'selected'; } ?>>20歳〜29歳</option>
			<option value="3" <?php if( !empty($_POST['age']) && $_POST['age'] === "3" ){ echo 'selected'; } ?>>30歳〜39歳</option>
			<option value="4" <?php if( !empty($_POST['age']) && $_POST['age'] === "4" ){ echo 'selected'; } ?>>40歳〜49歳</option>
			<option value="5" <?php if( !empty($_POST['age']) && $_POST['age'] === "5" ){ echo 'selected'; } ?>>50歳〜59歳</option>
			<option value="6" <?php if( !empty($_POST['age']) && $_POST['age'] === "6" ){ echo 'selected'; } ?>>60歳〜</option>
		</select>
	</div>
	<div class="element_wrap">
		<label>お問い合わせ内容</label>
		<textarea name="contact"><?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?></textarea>
	</div>
	<div class="element_wrap">
		<label for="agreement"><input id="agreement" type="checkbox" name="agreement" value="1" <?php if( !empty($_POST['agreement']) && $_POST['agreement'] === "1" ){ echo 'checked'; } ?>>プライバシーポリシーに同意する</label>
	</div>
	<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>

<?php endif; ?>

</body>
</html>
