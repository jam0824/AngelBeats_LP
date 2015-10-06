<?php

class CONNECTDB{
	var $link;
	var $db_selected;
	var $close_flag;
	var $result;
	//DB接続
	function connect($db_url, $db_user, $db_pw){
		$this->link = mysql_connect($db_url, $db_user, $db_pw);
		if (!$this->link) {
			die('接続失敗です。'.mysql_error());
		}
	}
	//DB選択
	function selected($db_name){
		$this->db_selected = mysql_select_db($db_name, $this->link);
		if (!$this->db_selected){
			die('データベース選択失敗です。'.mysql_error());
		}
		mysql_set_charset('utf8');
	}
	//DB切り離し
	function disconnect(){
		$this->close_flag = mysql_close($this->link);
	}

	//コマンド実行
	function getResult($query){
		$this->result = mysql_query($query);
		if (!$this->result) {
			die($query.'クエリーが失敗しました。'.mysql_error());
		}
		return $this->result;
	}

	//結果を配列データにする
	function makeArray($result){
		$data = array();
		//データ数取得
		$rows_num = mysql_num_rows($result);
		if($rows_num != 0){
			//各行を分解
			while($row = mysql_fetch_assoc($result)){
				//各データを分解
				$row_data = array();
				foreach($row as $key=>$temp){
					//$str .= $key . "=" . $temp . "&";
					$row_data[$key] = $temp;
				}
				$data[] = $row_data;
				//$str .= "<br>";
			}
		}
		return $data;
	}

	//結果をJSONにする
	function makeJSON($result){
		$data = "";
		//データ数取得
		$rows_num = mysql_num_rows($result);
		if($rows_num != 0){
			$data = "[";
			//各行を分解
			while($row = mysql_fetch_assoc($result)){
				$data .= "{";
				//各データを分解
				foreach($row as $key=>$temp){
					$data .= '"' . $key . '":"' . $temp . '",';
				}
				$data = substr($data, 0, -1);   //最後の「,」を削除
				$data .= "},";
			}
			$data = substr($data, 0, -1);   //最後の「,」を削除
			$data .= "]";
		}
		return $data;
	}

}


function checkSession(){
	if(!isset($_SESSION['oauth_token_secret'])){
	    echo "Error : Please go back to the login page.";
	    exit;
	}
	else{
	    //セッション持続の場合

	}
}









?>