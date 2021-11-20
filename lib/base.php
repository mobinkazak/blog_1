<?php
defined('DB_HOST') or die;
class Base
{
	private $dbLink;
	public function __construct(){
		$this->dbLink=mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die(mysqli_connect_error());
		mysqli_select_db($this->dbLink,DB_NAME) or die($this->getMysqlErr());
		$this->query("SET NAMES 'UTF8'");
	}
	public function __destruct(){
		if (is_resource($this->dbLink)) {
			mysqli_close($this->dbLink);
		}
	}
	public function getMysqlErr(){
		return mysqli_error($this->dbLink);
	}
	
	public function query($q){
		$res=mysqli_query($this->dbLink,$q);
		if (stristr($q,"insert")) {
			return mysqli_insert_id($this->dbLink);
		}elseif (stristr($q,'update') || stristr($q,'delete')) {
			return mysqli_affected_rows($this->dbLink);
		}else{
			return $res;
		}
	}
	public function redirect($url){
		header("Location:$url");
		die;
	}
	public function post($key){
		return isset($_POST[$key])?trim($_POST[$key]) :'';
	}
	public function get($key){
		return isset($_GET[$key])?trim($_GET[$key]) :'';
	}
	public function setAlert($alert,$key, $msg){
		$html="<div class=\"alert alert-$alert\">$msg</div>";
		if ($this->get('msg')==$key) {
			print $html;
		}
	}
	public function safeString($str){
		return htmlentities($str,ENT_QUOTES,'UTF-8');
	}
	public function getRow($result){
		return mysqli_fetch_assoc($result);
	}
	public function freeResult($res){
		return mysqli_free_result($res);
	}
	public function toInt($str){
		return (int)$str;
	}
	public function toFloat($str){
		return (float)$str;
	}
	public function checkUsername($user){
		$user=$this->safeString($user);
		$q="SELECT id FROM admins WHERE username='$user' ";
		$r=$this->query($q);
		return $r->num_rows;
	}
	public function checkEmail($email){
		$email=$this->safeString($email);
		$q="SELECT id FROM admins WHERE email='$email' ";
		$r=$this->query($q);
		return $r->num_rows;
	}
	public function imageUploader($field,$folder){
		$allowType=['jpg','png','jpeg'];
		$error=$_FILES[$field]['error'];
		$file=$_FILES[$field];
		if (isset($file) && trim($file['name']) !='') {
			if ($error==0) {
				$nameFile=mb_strtolower($file['name'],'UTF-8');
				$ext=pathinfo($nameFile,PATHINFO_EXTENSION);
				$indexAllow=array_search($ext,$allowType);
				if ($indexAllow===false) {
					return -2;
				}else{
					$tempFile=$file['tmp_name'];
$newFileName = md5(date("YmdHis") . mt_rand(1, 99999)) . "." . $allowType[$indexAllow];
$res=move_uploaded_file($tempFile,"$folder/$newFileName");
if ($res) {
	return $newFileName;
}else{
	return -3;
}
				}
			}else{
				return -1;
			}
		}else{
			return '';
		}
	}
	public function getList($table_name,$where='',$perShowPage=7){
		global $page;
		$ret=[];
		$perShowPage=$this->toInt($perShowPage);
		$n=($page*$perShowPage)-$perShowPage;
		$q1="SELECT COUNT(*) as n FROM $table_name $where";
		$r1=$this->query($q1);
		$count=$this->getRow($r1);
		$totalPage=ceil($count['n']/$perShowPage);
		$q2="SELECT * FROM $table_name  $where LIMIT $n,$perShowPage";
		$r2=$this->query($q2);
		$ret['result']=$r2;
		$ret['totalRow']=$count['n'];
		$ret['totalPage']=$totalPage;
		return $ret;
	}
	public function getGroup($id){
		$id=$this->toInt($id);
		$q="SELECT * FROM groups WHERE id='$id' ";
		$r=$this->query($q);
		return $this->getRow($r);
	}
	public function renderId($perShowPage){
		global $page;
		if ($page==1) {
			$idList=1;
		}else{
			$idList=1*($page*$perShowPage)-$perShowPage+1;
		}
		return $idList;
	}
	public function menuHandler($activity,$array=array()){
		$currentPage=basename($_SERVER['PHP_SELF']);
		if (in_array($currentPage,$array)) {
			return $activity;
		}else{
			return '';
		}
	}
	public function pagination($url,$totalPage){
		global $page;
?>
	<ul class="pagination m-0" style="direction:ltr;">
		<li class="page-item <?php ($page <= 1)? print 'disabled' :''; ?>">
		<a class="page-link" href="<?php ($page<=1)? print 'javascript:void(0);':print $url.'&page='.($page-1); ?>">&laquo;</a></li>
		<?php
			for ($i=1; $i <=$totalPage ; $i++) {
		?>
		<li class="page-item <?php $this->get('page')==$i ?print 'disabled':''; ?>"><a class="<?php ($this->get('page')==$i)?print 'btn btn-default':print ''; ?> page-link" href="<?php print $url;?>&page=<?php print $i; ?>"><?php print $i; ?></a></li>
		<?php
		}
		?>
		<li class="page-item <?php !($page<$totalPage)? print 'disabled' :''; ?>">
			<a class="page-link" href="<?php !($page<$totalPage)? print 'javascript:void(0);' : print $url.'&page='.($page+1); ?>">&raquo;</a></li>
	</ul>

	<?php

	}

	public function pagination2($totalPage,$url){
		global $page;
?>
	<ul class="pagination m-0" style="direction:ltr;">
		<li class="page-item <?php ($page <= 1)? print 'disabled' :''; ?>">
		<a class="page-link" href="<?php ($page<=1)? print 'javascript:void(0);':print '?page='.($page-1).$url; ?>">&laquo;</a></li>
		<?php
			for ($i=1; $i <=$totalPage ; $i++) {
		?>
		<li class="page-item <?php $this->get('page')==$i ?print 'disabled':''; ?>"><a class="<?php ($this->get('page')==$i)?print 'btn btn-default':print ''; ?> page-link" href="?page=<?php print $i.$url; ?>"><?php print $i; ?></a></li>
		<?php
		}
		?>
		<li class="page-item <?php !($page<$totalPage)? print 'disabled' :''; ?>">
			<a class="page-link" href="<?php !($page<$totalPage)? print 'javascript:void(0);' : print '?page='.($page+1).$url; ?>">&raquo;</a></li>
	</ul>

	<?php

	}

	public function persianDate($date,$key='/'){
		$dateTimeArray=explode(' ',$date);
		$dateArray=explode('-',$dateTimeArray[0]);
		$jdFArray=gregorian_to_jalali($dateArray[0],$dateArray[1],$dateArray[2]);
		return implode($key,$jdFArray).' '.$dateTimeArray[1];
	}

	public function getGroupsList($parent_id=0){
		$parent_id=$this->toInt($parent_id);
		$q="SELECT * FROM groups WHERE parent_id='$parent_id'";
		$result=$this->query($q);
		return $result;
	}


}
