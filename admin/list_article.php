<?php
	require_once '../init.php';
	if (!$backend->isLogin('admin_id')) {
	$backend->redirect('login.php?msg=logup');
	}
	if ($backend->get('logout') == '1') {
	$backend->logout();
	$backend->redirect('login.php?msg=logout');
	}
	$where=' WHERE 1 = 1 ';
	$title=$backend->safeString($backend->get('title'));
	if ($title != '') {
		$where.=" AND title LIKE '%$title%' ";
	}
	$idList=$backend->renderId(5);
	$articleData=$backend->getList('articles',$where,5);
	$url="?title=$title";
	// if ($backend->get('page')=='' || $backend->get('page')>$groupListData['totalPage']) {
		// 	$backend->redirect($url.'&page=1');
	// }
	$del_id=$backend->toInt($backend->get('del_id'));
	if ($del_id>0) {
		$backend->delArticle($del_id);
		$backend->redirect("$url&page=$page&msg=d");
	}
	$sid=$backend->toInt($backend->get('sid'));
	$val=$backend->get('val');
	if ($sid>0) {
		$res=$backend->ChangeArticleStatus($sid,$val);
		$backend->redirect("$url&page=$page&msg=ch");
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>لیست مقالات</title>
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
		<!-- Modal -->
		<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header" style="direction:ltr;">
						<button style="float:right;" type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						آیا می خواهید
						<span class="text-danger" id="text-title"></span>
						را حذف کنید؟
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
						<button type="button" class="btn btn-danger" data-del-id="" id="btn-del">بله</button>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<?php require_once 'template/header.php'; ?>
			<?php require_once 'template/side_bar.php'; ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<b><h3 class="card-title">لیست دسته ها</h3></b>
										<div class="card-tools">
											<form action="" method="get">
												<div class="input-group input-group-sm" style="width: 300px;">
													<input value="<?php print $title; ?>" type="text" name="title" class="form-control float-right" placeholder="جستجو">
													<div class="input-group-append">
														<button type="submit" value="1" class="btn btn-default"><i class="fa fa-search"></i></button>
														<button type="button" class="btn btn-info text-white"
														onclick="redirect('?page=<?php print $page; ?>')"><i class="fa fa-refresh"></i></button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!-- /.card-header -->
									<div class="card-body">
										<?php $backend->setAlert('success','d','حذف با موفقیت انجام شد'); ?>
										<?php $backend->setAlert('danger','d-1','امکان حذف دسته اصلی وجود ندارد برای حذف دسته اصلی اول باید زیر مجموعه های آن را حذف کنید'); ?>
										<table class="table table-bordered">
											<tr>
												<th style="width: 10px">#</th>
												<th>عنوان مقاله</th>
												<th>دسته بندی</th>
												<th>زیر دسته</th>
												<th>آخرین بروزرسانی</th>
												<th style="width: 40px">وضعیت</th>
												<th style="width: 40px">ویرایش</th>
												<th style="width: 40px">حذف</th>
											</tr>
											<?php
												while ($articleRow=$backend->getRow($articleData['result'])) {
												$cat_id=$backend->getGroup($articleRow['cat_id']);
												$sub_cat_id=$backend->getGroup($articleRow['sub_cat_id']);
												$time=$backend->persianDate($articleRow['created_date_time'],'-');

											?>
											<tr>
												<td><?php print $idList; ?></td>
												<td><?php print $articleRow['title']; ?></td>
												<td><?php print $cat_id['title'];?></td>
												<td><?php print $sub_cat_id['title'] ?></td>
												<td><?php print $time; ?></td>
												<td>
												<?php 
													if ($articleRow['status']==1) {
														?>
														<a href="<?php print $url.'&page='.$page.'&sid='.$articleRow['id'].'&val=0'; ?>" class="btn btn-success" data-toggle="tooltip" title="برای غیرفعال کردن کلیک کنید">فعال</a>
														<?php
													}else{
														?>
														<a href="<?php print $url.'&page='.$page.'&sid='.$articleRow['id'].'&val=1'; ?>" class="btn btn-danger" data-toggle="tooltip" title="برای فعال کردن کلیک کنید">غیرفعال</a>
														<?php
													}
												?>
												</td>
												<td><a class="btn btn-warning" href="edit_article.php?id=<?php print $articleRow['id']; ?>&title=<?php print $title; ?>&page=<?php print $page; ?>">ویرایش</a></td>
												<td><a data-id="<?php print $articleRow['id'];?>" data-title="<?php print $articleRow['title']; ?>" data-toggle="modal" data-target="#delModal" class="btn btn-danger" href="">حذف
												</a>
											</td>
										</tr>
										<?php
										$idList++;
										}
										?>
									</table>
								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
									<?php
									$backend->pagination($url,$articleData['totalPage']);
									?>
								</div>
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
						
						<!-- /.col -->
					</div>
					<!-- /.row -->
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
		<script>
			$('#delModal').on('show.bs.modal', function (e) {
				var id=$(e.relatedTarget).attr('data-id');
				var title=$(e.relatedTarget).attr('data-title');
				$(this).find('#text-title').text(title);
				$(this).find('#btn-del').attr('data-del-id',id);
			});
			$('#btn-del').click(function(){
				var id=$(this).attr('data-del-id');
		redirect("<?php print $url; ?>&page=<?php print $page; ?>&del_id="+id);
		});
		</script>
	</body>
</html>