<?php
	require_once '../init.php';
	if (!$backend->isLogin('admin_id')) {
	$backend->redirect('login.php?msg=logup');
	}
	$do=$backend->post('do');

	if ($do=='getSubCatId') {
		$cat_id=$backend->toInt($backend->post('cat_id'));

		?>
		<select class="form-control select2" style="width:100%;" name="sub_cat_id" id="sub_cat_id">
		<?php
		$resGroup=$backend->getGroupsList($cat_id);
		if ($resGroup->num_rows==0) {
		?>
			<option value="">زیر دسته ای یافت نشد</option>
		<?php
		}else{
			while ($rowGroup=$backend->getRow($resGroup)) {
			?>
			<option value="<?php print $rowGroup['id']; ?>"><?php print $rowGroup['title'];?></option>
			<?php
			}

		}
		?>
		</select>
		<?php 
	}

	
?>