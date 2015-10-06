<!DOCTYPE html>
<html>
<head>
	<title>ABCastOff</title>
	<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<META name="viewport" content="width=800px">
	<link rel=stylesheet type="text/css" href="../css.css"　media="all">
	<link rel=stylesheet type="text/css" href="../common_css.css"　media="all">

<?php
require('config.php');
require('common.php');


//メインルーチン
/////////////////////////////////////////////////////////////////////////////////////

$connect = new CONNECTDB;
$connect->connect(DB_URL, DB_USER, DB_PW);
$connect->selected(DB_DB);

$queryNormal = "SELECT *,(SELECT COUNT(*) FROM ANGEL_BEATS_RANKING b WHERE a.score < b.score AND type=0) + 1 AS rank FROM ANGEL_BEATS_RANKING a WHERE type=0 order by rank asc;";
//ユーザーデータロード
$tmp = $connect->getResult($queryNormal);
$normalRankingArray = $connect->makeArray($tmp);

$queryR18 = "SELECT *,(SELECT COUNT(*) FROM ANGEL_BEATS_RANKING b WHERE a.score < b.score AND type=1) + 1 AS rank FROM ANGEL_BEATS_RANKING a WHERE type=1 order by rank asc;";
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
			<a href="ABCastOff/index.html"><div class="iconBg fontFrame">Play</div></a>
			<a href=""><div class="iconBg fontFrame">NetRanking</div></a>
			<a href="#howToPlaySmallScreen"><div class="iconBg fontFrame">How to play<br>with small screen</div></a>
			<a href="#system"><div class="iconBg fontFrame">System</div></a>
			<a href=""><div class="iconBg fontFrame">Story</div></a>
			<div class="clear"></div>
		</header>

		<div id="tabmenu">
		    <div id="tab">
		        <a href="#tab1">Normal</a>
		        <a href="#tab2">R18</a>
		    </div>
		    <div id="tab_contents">
		        <ul>
		            <li id="tab1" name="tab1">
		            	<?php
		            		for($i = 0; $i < count($normalRankingArray); $i++){
		            			echo '<div class="rankingRank">' . $normalRankingArray[$i]["rank"] . "</div>";
		            			echo '<div class="rankingName">' . $normalRankingArray[$i]["name"] . "</div>";
		            			echo '<div class="rankingScore">' . $normalRankingArray[$i]["score"] . "</div>";
		            		}
		            	?>
		            		
		            </li>

		            <li id="tab2" name="tab2">
		            	<?php
		            		for($i = 0; $i < count($r18RankingArray); $i++){
		            			echo '<div class="rankingRank">' . $r18RankingArray[$i]["rank"] . "</div>";
		            			echo '<div class="rankingName">' . $r18RankingArray[$i]["name"] . "</div>";
		            			echo '<div class="rankingScore">' . $r18RankingArray[$i]["score"] . "</div>";
		            		}
		            	?>
		            </li>
		        </ul>
		    </div>
		</div>

	</div>
</body>
</html>
