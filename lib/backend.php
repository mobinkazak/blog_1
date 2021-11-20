<?php 
defined('DB_HOST') or die;
class Backend extends Base{
	

	public function isLogin($key){
		if (isset($_SESSION[$key])) {
			return true;
		}else{
			return false;
		}
	}

	public function login($username,$password){
		$username=$this->safeString($username);
		$password=$this->safeString($password);
		$q="SELECT * FROM admins WHERE status='1' AND username='$username' OR email='$username' AND password='$password'";
		$r=$this->query($q);
		$row=$this->getRow($r);
		$this->freeResult($r);
		if (isset($row['id'])) {
			$_SESSION['admin_id']=$row['id'];
			return true;
		}else{
			return false;
		}
	}
	public function getProfile(){
		$id=$_SESSION['admin_id'];
		$q="SELECT * FROM admins WHERE id='$id'";
		$r=$this->query($q);
		$row=$this->getRow($r);
		$this->freeResult($r);
		return $row;

	}
	public function logout(){
		if ($this->isLogin('admin_id')) {
			unset($_SESSION['admin_id']);
			session_destroy();
		}
	}

	public function saveProfile($fn,$ln,$user,$email,$currentPass,$newPass,$newPass2){
		$id=$_SESSION['admin_id'];
		$fn=$this->safeString($fn);
		$ln=$this->safeString($ln);
		$user=$this->safeString($user);
		$email=$this->safeString($email);
		$currentPass=$this->safeString($currentPass);
		$newPass=$this->safeString($newPass);
		$newPass2=$this->safeString($newPass2);
		$profile=$this->getProfile();
		$q="UPDATE admins SET first_name='$fn',last_name='$ln' ";

		if ($user != $profile['username']) {
			if ($this->checkUsername($user)==0) {
				$q.=" ,username='$user' ";
			}else{
				return -1;
			}
		}

		if ($email != $profile['email']) {
			if ($this->checkEmail($email)==0) {
				$q.=" ,email='$email' ";
			}else{
				return -2;
			}
		}

		if ($currentPass!="") {
			if ($profile['password']==$currentPass) {
				if ($newPass!="" && $newPass2!="") {
					if ($newPass==$newPass2) {
						$q.=" ,password='$newPass2' ";
					}else{
						return -4;
					}
				}
				
			}else{
				return -3;

			}
		}

		$avatarFileName=$this->imageUploader('avatar', '../avatars/');
		if ($avatarFileName!='') {
			if (!is_int($avatarFileName)) {
				$q.=" ,avatar='$avatarFileName' ";
			}else{
				return "u".$avatarFileName;
			}
		}

		$q.=" WHERE id='$id' ";
		$this->query($q);
		return 1;
	}

	public function delAvatar(){
		$id=$_SESSION['admin_id'];
		$profile=$this->getProfile();
		$path='../avatars/'.$profile['avatar'];
		$newImg='../avatars/user_1_2.png';
		if (file_exists($path)) {
			unlink($path);
		}
		$q="UPDATE admins SET avatar='$newImg' WHERE id='$id' ";
		$this->query($q);
	}
	public function checkGroup($title,$parent_id=0){
		$title=$this->safeString($title);
		$parent_id=$this->toInt($parent_id);
		$q="SELECT id FROM groups WHERE title='$title' AND parent_id='$parent_id' ";
		$r=$this->query($q);
		return $r->num_rows;
	}
	
	public function addGroup($title,$parent_id=0){
		$title=$this->safeString($title);
		$parent_id=$this->toInt($parent_id);
		if ($this->checkGroup($title, $parent_id)==0) {
			$q="INSERT INTO groups VALUES('NULL','$title','$parent_id');";
			$this->query($q);
			return 1;
		}else{
			return -1;
		}
	}

	public function getGroup($id){
		$id=$this->toInt($id);
		$q="SELECT * FROM groups WHERE id='$id' ";
		$r=$this->query($q);
		return $this->getRow($r);

	}

	public function delGroup($id){
		$id=$this->toInt($id);
		$currentGroup=$this->getGroup($id);
		if ($currentGroup['parent_id']==0) {
			$countChild=$this->getGroupsList($id);

			if ($countChild->num_rows == 0) {
				$q="DELETE FROM groups WHERE id='$id' ";
				$this->query($q);
				return 1;
			}
			else{
				return -1;
			}
			
		}else{
			$q0="SELECT COUNT(*) AS n FROM articles WHERE sub_cat_id = '$id'";
			$r0=$this->query($q0);
			$row0=$this->getRow($r0);
			if ($row0['n']==0) {
				$q="DELETE FROM groups WHERE id='$id' ";
				$this->query($q);
				return 1;
			}else{
				return -2;
			}

			
		}
	}

	public function updateGroup($id,$title,$parent_id){
		$id=$this->toInt($id);
		$title=$this->safeString($title);
		$parent_id=$this->toInt($parent_id);
		$currentGroup=$this->getGroup($id);
		$titleIsChange=false;
		$q="UPDATE groups SET ";
		if ($currentGroup['title']!=$title) {
			if ($this->checkGroup($title,$parent_id)>0) {
				return -1;
			}else{
				$q .=" title='$title' ";
				$titleIsChange=true;
			}
		}
		if ($currentGroup['parent_id']!=$parent_id) {

			if ($this->checkGroup($title,$parent_id)>0) {
				return -1;
			}else{
				if ($titleIsChange)
					$q.=" , ";
				$q .=" parent_id='$parent_id' ";
			}
			
		}

		$q.=" WHERE id='$id'";
		$this->query($q);
		return 1;

	}
	public function checkArticle($title,$cat_id,$sub_cat_id){
		$title=$this->safeString($this->post('title'));
		$cat_id=$this->toInt($this->post('cat_id'));
		$sub_cat_id=$this->toInt($this->post('sub_cat_id'));
		$q="SELECT id FROM articles WHERE title='$title' AND cat_id='$cat_id' AND sub_cat_id='$sub_cat_id'";
		$r=$this->query($q);
		return $r->num_rows;

	}

	public function addArticle(){
		$title=$this->safeString($this->post('title'));
		$cat_id=$this->toInt($this->post('cat_id'));
		$sub_cat_id=$this->toInt($this->post('sub_cat_id'));
		$short_desc=$this->safeString($this->post('short_desc'));
		$long_desc=$this->safeString($this->post('long_desc'));
		$tiny_image=$this->safeString($this->post('tiny_image'));
		$seo_keywords=$this->safeString($this->post('seo_keywords'));
		$seo_desc=$this->safeString($this->post('seo_desc'));
		$created_date_time=date('Y-m-d H:i:s');

		if ($this->checkArticle($title,$cat_id,$sub_cat_id)>0) {
			return -1;
		}else{
			$q="INSERT INTO articles(title,cat_id,sub_cat_id,short_desc,long_desc,tiny_image,seo_keywords,seo_desc,status,created_date_time) VALUES('$title','$cat_id','$sub_cat_id','$short_desc','$long_desc','$tiny_image','$seo_keywords','$seo_desc','1','$created_date_time')";
			$this->query($q);
			return 1;
		}
	}
	public function ChangeArticleStatus($sid,$val){
		$sid=$this->toInt($sid);
		$val=$this->toInt($val);
		$timeNow=date('Y-m-d H:i:s');
		$q="UPDATE articles SET status='$val',created_date_time='$timeNow' WHERE id='$sid'";
		$this->query($q);
	}
	public function delArticle($id){
		$id=$this->toInt($id);
		$q="DELETE FROM articles WHERE id = '$id'";
		$this->query($q);
	}
	public function getArticle($id){
		$id=$this->toInt($id);
		$q="SELECT * FROM articles WHERE id ='$id'";
		$r=$this->query($q);
		return $this->getRow($r);
	}

	public function updateArticle($id){
		$id=$this->toInt($id);
		$title=$this->safeString($this->post('title'));
		$cat_id=$this->toInt($this->post('cat_id'));
		$sub_cat_id=$this->toInt($this->post('sub_cat_id'));
		$short_desc=$this->safeString($this->post('short_desc'));
		$long_desc=$this->safeString($this->post('long_desc'));
		$tiny_image=$this->safeString($this->post('tiny_image'));
		$seo_keywords=$this->safeString($this->post('seo_keywords'));
		$seo_desc=$this->safeString($this->post('seo_desc'));
		$created_date_time=date('Y-m-d H:i:s');
		$article=$this->getArticle($id);

		$q="UPDATE articles SET short_desc='$short_desc',long_desc='$long_desc',tiny_image='$tiny_image',
			seo_keywords='$seo_keywords',seo_desc='$seo_desc',created_date_time='$created_date_time' ";

		if ($article['title'] != $title 
			|| $article['cat_id'] != $cat_id 
			|| $article['sub_cat_id'] != $sub_cat_id) {
			if ($this->checkArticle($title, $cat_id, $sub_cat_id) > 0) {
				return -1;
			}else{
				$q.=" ,title='$title',cat_id='$cat_id',sub_cat_id='$sub_cat_id' ";
			}
		}

		$q.=" WHERE id = '$id'";
		$this->query($q);

		return 1;
	}
}