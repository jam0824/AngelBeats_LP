<!DOCTYPE html>
<html>
<head>
	<title>ABCastOff</title>
	<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<META name="viewport" content="width=800px">
	<link rel=stylesheet type="text/css" href="../css.css"　media="all">
	<link rel=stylesheet type="text/css" href="../common_css.css"　media="all">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-55121722-5', 'auto');
	  ga('send', 'pageview');

	</script>
<?php
require('config.php');
require('common.php');


//メインルーチン
/////////////////////////////////////////////////////////////////////////////////////

$connect = new CONNECTDB;
$connect->connect(DB_URL, DB_USER, DB_PW);
$connect->selected(DB_DB);

$queryNormal = "SELECT *,(SELECT COUNT(*) FROM ANGEL_BEATS_RANKING b WHERE a.score < b.score AND type=0) + 1 AS rank FROM ANGEL_BEATS_RANKING a WHERE type=0 order by rank asc LIMIT 200;";
//ユーザーデータロード
$tmp = $connect->getResult($queryNormal);
$normalRankingArray = $connect->makeArray($tmp);

$queryR18 = "SELECT *,(SELECT COUNT(*) FROM ANGEL_BEATS_RANKING b WHERE a.score < b.score AND type=1) + 1 AS rank FROM ANGEL_BEATS_RANKING a WHERE type=1 order by rank asc LIMIT 200;";
//ユーザーデータロード
$tmp = $connect->getResult($queryR18);
$r18RankingArray = $connect->makeArray($tmp);


$connect->disconnect();

?>


</head>

<body>
	<div class="main">
		<div class="ad">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- ディスプレイ広告728x90 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:728px;height:90px"
			     data-ad-client="ca-pub-9780802571507911"
			     data-ad-slot="1690570183"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>

		<header>
			<a href="../ABCastOff/index.html"><div class="iconBg fontFrame">Play</div></a>
			<a href="./"><div class="iconBg fontFrame">NetRanking</div></a>
			<a href="../index.html#howToPlaySmallScreen"><div class="iconBg fontFrame">How to play<br>with small screen</div></a>
			<a href="../index.html#system"><div class="iconBg fontFrame">System</div></a>
			<a href="http://novelist.hatenadiary.jp/entry/2015/10/11/005216"><div class="iconBg fontFrame">Story</div></a>
			<div class="clear"></div>
		</header>

		<div id="tabmenu">
		    <div id="tab">
		        <a href="#tab1" class="round">Normal</a>
		        <a href="#tab2" class="round">R15</a>
		    </div>
		    <div id="tab_contents">
		        <ul>
		            <li id="tab1" name="tab1">
		            	
		            	<?php
		            		for($i = 0; $i < count($normalRankingArray); $i++){
		            			
		            			echo '<div class="rankingLine round">';
		            			echo '<div class="rankingRank floatLeft fontFrame">' . $normalRankingArray[$i]["rank"] . "</div>";
		            			echo '<div class="rankingName floatLeft fontFrame">' . $normalRankingArray[$i]["name"] . "</div>";
		            			echo '<div class="rankingScore floatLeft fontFrame">' . number_format($normalRankingArray[$i]["score"]) . "</div>";
		            			echo '<div class="clear"></div></div>';
		            		}
		            	?>
		            	
		            	
		            </li>

		            <li id="tab2" name="tab2">
		            	<?php
		            		for($i = 0; $i < count($r18RankingArray); $i++){
		            			
		            			echo '<div class="rankingLine round">';
		            			echo '<div class="rankingRank floatLeft fontFrame">' . $r18RankingArray[$i]["rank"] . "</div>";
		            			echo '<div class="rankingName floatLeft fontFrame">' . $r18RankingArray[$i]["name"] . "</div>";
		            			echo '<div class="rankingScore floatLeft fontFrame">' . number_format($r18RankingArray[$i]["score"]) . "</div>";
		            			echo '<div class="clear"></div></div>';
		            		}
		            	?>
		            
		            </li>
		        </ul>
		    </div>
		</div>

		<div class="bannerArea">
			Traffic Jam Products<br>
			<div class="floatLeft">
				<a href="http://milk0824.sakura.ne.jp/doukana/" title="Traffi Jam ホーム"><img src="../data/banner20151004.jpg"></a>
			</div>
			<div class="floatLeft">
				<a href="http://www.traffic-jam.me/collection/Collection" title="コレクション共有SNSアイコレ"><img src="../data/collection_banner20151004.jpg"></a>
			</div>
			<div class="clear"></div>
		</div>

		<div class="shareArea">
			<div class="shareIcon floatLeft">
				<a target="_blank" href="http://twitter.com/intent/tweet?hashtags=ABCastoff&amp;text=AngelBeats%21%e3%81%ae%e5%90%8c%e4%ba%ba2D%e5%bc%be%e5%b9%95%e7%b3%bb%e3%82%b7%e3%83%a5%e3%83%bc%e3%83%86%e3%82%a3%e3%83%b3%e3%82%b0%e5%a7%8b%e5%8b%95%ef%bc%81&amp;url=http://milk0824.sakura.ne.jp/app/ab/">
				<img src="../data/share_twitter.png"></a>
			</div>
			<div class="shareIcon floatLeft">
				<a target="_blank" href="http://www.facebook.com/dialog/feed?app_id=765924116887041&display=popup&redirect_uri=http://milk0824.sakura.ne.jp/app/ab/&picture=http://milk0824.sakura.ne.jp/app/ab/data/LP_top.png&link=http://milk0824.sakura.ne.jp/app/ab/&name=AngelBeatsCastOff&description=AngelBeats%21%e3%81%ae%e5%90%8c%e4%ba%ba2D%e5%bc%be%e5%b9%95%e7%b3%bb%e3%82%b7%e3%83%a5%e3%83%bc%e3%83%86%e3%82%a3%e3%83%b3%e3%82%b0%e5%a7%8b%e5%8b%95%ef%bc%81
">
				<img src="../data/share_facebook.png"></a>
			</div>
			<div class="shareIcon floatLeft">
				<a target="_blank" href="http://milk0824.sakura.ne.jp/cgi-bin/webclap/clap.cgi">
				<img src="../data/clap.gif"><br>Clap/拍手
				</a>
			</div>
			<div class="clear"></div>
		</div>
		<footer>
			<div class="QRArea">
				<div class="floatLeft">
					©2005 - Traffic Jam<br>
					<br>
					Official LINE Account<br>
					@hgf7288s
				</div>
				<div class="imgQRCode floatLeft">
					<img src="../data/TJ_LINE_QR.jpg">
				</div>
				<div class="floatLeft">
					<a href="http://milk0824.sakura.ne.jp/doukana/" title="Traffi Jam ホーム"><img src="../data/banner20151004.jpg"></a>
				</div>
				
				<div class="clear"></div>
			</div>
		</footer>

	</div>
</body>
</html>
