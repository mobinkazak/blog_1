<?php 
defined('DB_HOST') or die;

class Frontend extends Base{
	
	public function getLastArticle($n=6){
		$q="SELECT * FROM articles WHERE status='1' ORDER BY id DESC LIMIT 0,$n ";
		return $this->query($q);
	}
	
	public function getArticle($id){
		$id=$this->toInt($id);
		$q="SELECT * FROM articles WHERE id='$id' AND status='1' ";
		$r=$this->query($q);
		return $this->getRow($r);
	}

	public function createSeoUrl($url){
		$url=mb_strtolower($url);
		$url=str_ireplace(' ','-',$url);
		return SITE_URL.$url;
	}
	public function getCountArticle($cat_id,$sub_cat_id=0){
		$cat_id=$this->toInt($cat_id);
		$sub_cat_id=$this->toInt($sub_cat_id);
		$q="SELECT COUNT(*) AS n FROM articles WHERE cat_id='$cat_id' ";

		if ($sub_cat_id>0) {
			$q.=" AND sub_cat_id='$sub_cat_id' ";
		}

		$r=$this->query($q);
		$row=$this->getRow($r);
		return $row['n'];

	}
	public function getArticlesWithCatId($id,$m){
		global $page;
		$id=$this->toInt($id);
		$n=($page*$m)-$m;
		$ret=[];

		$q1="SELECT COUNT(*) as n FROM articles WHERE status='1' ";
		$r1=$this->query($q1);
		$count=$this->getRow($r1);
		$totalPage=ceil($count['n']/$m);

		$q2="SELECT * FROM articles WHERE status='1' AND cat_id='$id' ORDER BY id DESC LIMIT $n,$m ";
		$r2=$this->query($q2);
		$ret['result']=$r2;
		$ret['totalRow']=$count['n'];
		$ret['totalPage']=$totalPage;
		return $ret;
	}
	
	public function insertComment($postId,$name,$comment,$email=''){
		$postId=$this->toInt($postId);
		$name=$this->safeString($name);
		$comment=$this->safeString($comment);
		$email=$this->safeString($email);
		$date=date('Y-m-d H:i:s');
		$q="INSERT INTO comments VALUES('NULL','$comment','$postId','$name','$email','0','$date')";
		$this->query($q);
		

	}	
	public function getPostsComment($postId,$n){
		$postId=$this->toInt($postId);
		$q="SELECT * FROM comments WHERE post_id='$postId' ORDER BY id DESC LIMIT 0,$n";
		$r=$this->query($q);
		return $r;

	}
	
}