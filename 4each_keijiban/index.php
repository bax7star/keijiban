<!DOCTYPE html>
<html lang="ja">
    
<head>
    <meta charset="utf-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
mb_internal_encoding("utf8");
require "DB.php";
$dbconnect = new DB();
$pdo = $dbconnect->connect();
$stmt = $pdo->prepare($dbconnect->select());
$stmt = execute();
?>
  <Header>
  	<div class="header-logo">
    	<img src="4eachblog_logo.jpg">
    </div>
    <div class="header-bar">
    	<ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
       </ul>
    </div>
  </Header>
    
	<main>
		<div class=left>
    <h1>プログラミングに役立つ掲示板</h1>	
   		<form method="post" action="insert.php">
				<h3>入力フォーム</h3>
		 		<div class="box">
            <label>ハンドルネーム</label>
            <br>
            <input type="text" class="text" size="35" name="handlename">
        </div>
        <div class="box">
            <label>タイトル</label>
            <br>
            <input type="text" class="text" size="35" name="title">
        </div>
        <div class="box">
            <label>コメント</label>
            <br>
            <textarea cols="35" rows="7" name="comments"></textarea>
				</div>
        <div class="box">
            <input type="submit" class="submit" value="送信する">
        </div>
    	</form>
		</div>
    <div class="right">
    	<div class="link-list">
      	<h2>人気の記事</h2>
        <ul>
        	<li>PHPオススメ本</li>
          <li>PHP MyAdminの使い方</li>
          <li>今人気のエディタ Top5</li>
          <li>HTMLの基礎</li>
         </ul>
     </div>
     <div class="link-list">
     	<h2>オススメリンク</h2>
      <ul>
      	<li>インターノウス株式会社</li>
        <li>XAMPPのダウンロード</li>
        <li>Eclipseのダウンロード</li>
        <li>Bracketsのダウンロード</li>
       </ul>
      </div>
      <div class="link-list">
      	<h2>カテゴリ</h2>
        <ul>
        	<li>HTML</li>
          <li>PHP</li>
          <li>MySQL</li>
          <li>JavaScript</li>
         </ul>
       </div>
		 </div>
		<?php
		while($row=$stmt->fetch()){
		 echo "<div class='kiji'>";
		 	echo"<h3>".$row['title']."</h3>";
			echo"<div class='contents'>";
				echo $row['comments'];
				echo"<div class='handlename'>posted by".$row['handlename']."</div>";
			echo"</div>";
		 echo"</div>";
		}
		?>
		<?php
		while($row=$stmt->fetch()){
		 echo "<div class='kiji'>";
		 	echo"<h3>".$row['title']."</h3>";
			echo"<div class='contents'>";
				echo $row['comments'];
				echo"<div class='handlename'>posted by".$row['handlename']."</div>";
			echo"</div>";
		 echo"</div>";
		}
		?>
	</main>
  <footer>
  	<p>copyright©︎ internous | 4each blog the which provides A to Z about programming.</p>
  </footer>
</body>
</html>