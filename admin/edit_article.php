<?php
	require_once '../init.php';
	
	if (!$backend->isLogin('admin_id')) {
	$backend->redirect('login.php?msg=logup');
	}
	if ($backend->get('logout') == '1') {
	$backend->logout();
	$backend->redirect('login.php?msg=logout');
	}
	$title=$backend->safeString($backend->get('title'));

	$id=$backend->toInt($backend->get('id'));
	$article=$backend->getArticle($id);

	if ($backend->post('btn_update')) {
	$res=$backend->updateArticle($id);
	$backend->redirect("?title=$title&page=$page&id=$id&msg=e$res");
	}
	if (!$id) {
		$backend->redirect("list_article.php?page=$page");
		
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>در حال ویرایش - <?php print $article['title']; ?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- IonIcons -->
		<!-- Theme style -->
		<link rel="stylesheet" href="css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<!-- bootstrap rtl -->
		<link rel="stylesheet" href="css/bootstrap-rtl.min.css">
		<!-- template rtl version -->
		<link rel="stylesheet" href="css/custom-style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/select2.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<?php require_once 'template/header.php'; ?>
			<?php require_once 'template/side_bar.php'; ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<!-- /.col -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-header p-2">
										<ul class="nav nav-pills">
											<li class="nav-item"><h5 data-toggle="tab">در حال ویرایش - <?php print $article['title']; ?></h5></li>
										</ul>
										</div><!-- /.card-header -->
										<div class="card-body">
											<?php $backend->setAlert('success','e1','ویرایش با موفقیت انجام شد'); ?>
											<?php $backend->setAlert('danger','e-1','عنوان وارد شده در این زیر دسته وجود دارد'); ?>
											<div class="tab-content">
												<div class="active tab-pane" id="activity">
													<div class="tab-pane" id="settings">
														<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
															<div class="form-group">
																<label for="title" class="col-sm-2 control-label">عنوان مقاله </label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" value="<?php print $article['title']; ?>" id="title" name="title" placeholder="عنوان مقاله جدید">
																</div>
															</div>
															<div class="form-group">
																<label for="cat_id" class="col-sm-2 control-label">
																	انتخاب دسته بندی
																</label>
																<div class="col-sm-10">
																	<select class="form-control select2" style="width:100%;" name="cat_id" id="cat_id">
																		<?php
																		$resGroup=$backend->getGroupsList();
																		while ($rowGroup=$backend->getRow($resGroup)) {
																			$sel=($rowGroup['id']==$article['cat_id'])?'selected':'';
																		?>
																		<option <?php print $sel; ?> value="<?php print $rowGroup['id']; ?>"><?php print $rowGroup['title'];?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="form-group">
																<label for="sub_cat_id" class="col-sm-2 control-label">
																	انتخاب زیر دسته
																</label>
																<div class="col-sm-10">
																	<div id="sub_cat_result">
																		<select class="form-control select2" style="width:100%;" name="sub_cat_id" id="sub_cat_id">
																		<option value="" selected>زیر دسته موجود را انتخاب کنید</option>
																		<?php
																		$resGroup=$backend->getGroupsList($article['cat_id']);
																		while ($rowGroup=$backend->getRow($resGroup)) {
																			$sel=($rowGroup['id']==$article['sub_cat_id'])?'selected':'';

																		?>
																		<option <?php print $sel; ?> value="<?php print $rowGroup['id']; ?>"><?php print $rowGroup['title'];?></option>
																		<?php
																		}
																		?>
																	</select>
																	</div>
																</div>
															</div>
															<div class="col-sm-10">
																<div class="form-group">
																	<label for="short_desc">متن کوتاه</label>
																	<textarea class="form-control" name="short_desc" style="resize:none;" id="short_desc" height="100px" placeholder=""><?php print $article['short_desc']; ?></textarea>
																</div>
																<div class="form-group">
																	<label for="long_desc">متن بلند</label>
																	<textarea class="form-control" name="long_desc" style="resize:none;" id="long_desc" rows="4" placeholder=""><?php print $article['long_desc']; ?></textarea>
																</div>
															</div>
															<div class="col-md-10">
																<div class="form-group">
																	<label for="seo_keywords">کلیدواژه ها</label>
																	<input class="form-control" type="text" name="seo_keywords" id="seo_keywords" value="<?php print $article['seo_keywords']; ?>">
																</div>
																<div class="form-group">
																	<label for="seo_desc">متن SEO</label>
																	<textarea name="seo_desc" id="seo_desc" style="resize:none;" class="form-control" rows="4" style="width:100%"; placeholder=""><?php print $article['seo_desc']; ?></textarea>
																</div>
															</div>
															<div class="form-group">
																<label for="tiny_img" class="col-sm-2 control-label">عکس مقاله</label>
																<div class="col-sm-10">
																	<input type="text" value="<?php print $article['tiny_image']; ?>" class="form-control" id="tiny_img" name="tiny_image">
																</div>
															</div>
															
															<div class="form-group">
																<div class="col-sm-offset-2 col-sm-10">
																	<button type="submit" name="btn_update" value="1" class="btn btn-warning">ویرایش</button>
																	<button type="button" class="btn btn-secondary" onclick="redirect('list_article.php?title=<?php print $title; ?>&page=<?php print $page; ?>');">برگشت</button>
																</div>
															</div>
															
														</form>
													</div>
													<!-- /.tab-pane -->
												</div>
												<!-- /.tab-content -->
												</div><!-- /.card-body -->
											</div>
											<!-- /.nav-tabs-custom -->
										</div>
										<!-- /.col -->
									</div>
									<!-- /.row -->
									</div><!-- /.container-fluid -->
								</section>
								<!-- /.content -->
							</div>
							<!-- /.content-wrapper -->
							<?php require_once 'template/footer.php'; ?>
							
							<!-- Control Sidebar -->
							<aside class="control-sidebar control-sidebar-dark">
								<!-- Control sidebar content goes here -->
							</aside>
							<!-- /.control-sidebar -->
						</div>
						<!-- ./wrapper -->
						<script src="js/jquery-3.6.0.min.js"></script>
						<!-- Bootstrap -->
						<script src="js/bootstrap.bundle.min.js"></script>
						<!-- AdminLTE -->
						<script src="js/adminlte.js"></script>
						<script src="js/app.js"></script>
						<script src="js/select2.full.min.js"></script>
						<script src="tinymce/tinymce.min.js"></script>

						<script type="text/javascript">
							$(document).ready(function(){
								$('#parent_id').select2();
								initEditor('#long_desc');

								$('.select2').select2()
								$('#cat_id').change(function(event) {
									var cat_id=$(this).val();
									if(cat_id > 0){
									var params='do=getSubCatId&cat_id='+cat_id;
									$.post('ajax.php',params,function(res){
										$('#sub_cat_result').html(res);
										$('#sub_cat_id').select2();
										
									});
									}
								});
							});
						
							
						</script>
					</body>
				</html>