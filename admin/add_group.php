<?php
	require_once '../init.php';
	if (!$backend->isLogin('admin_id')) {
	$backend->redirect('login.php?msg=logup');
	}
	if ($backend->get('logout') == '1') {
	$backend->logout();
	$backend->redirect('login.php?msg=logout');
	}
	if ($backend->post('btn_add')) {
	$title=$backend->post('title');
	$parent_id=$backend->post('parent_id');
	$getGroup=$backend->getGroupsList($parent_id);

	$res=$backend->addGroup($title,$parent_id);
	$backend->redirect('?msg=e'.$res);
	}
	if ($backend->post('btn_close')) {
	$backend->redirect('list_group.php');
	}
	



?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>ثبت دسته جدید</title>
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
					<!-- /.container-fluid -->
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
												<li class="nav-item"><h5 data-toggle="tab">ثبت دسته جدید</h5></li>
											</ul>
											</div><!-- /.card-header -->
											<div class="card-body">
												<?php $backend->setAlert('success','e1','دسته جدید با موفقیت ثبت شد'); ?>
												<?php $backend->setAlert('danger','e-1','دسته وارد شده وجود دارد'); ?>
												<div class="tab-content">
													<div class="active tab-pane" id="activity">
														<div class="tab-pane" id="settings">
															<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="title" class="col-sm-2 control-label">عنوان دسته جدید</label>
																	<div class="col-sm-10">
																		<input type="text" class="form-control" id="title" name="title" placeholder="عنوان دسته جدید">
																	</div>
																</div>
																<div class="form-group">
																	<label for="parent_id" class="col-sm-2 control-label">
																		انتخاب دسته بندی
																	</label>
																	<div class="col-sm-10">
																		<select class="form-control" style="width:100%;" name="parent_id" id="parent_id">
																			<option value="" selected>دسته اصلی</option>
																			<?php 
																			$resGroup=$backend->getGroupsList();
																			while ($rowGroup=$backend->getRow($resGroup)) {
																			?>
																			<option value="<?php print $rowGroup['id']; ?>"><?php print $rowGroup['title'];?></option>
																			<?php
																			}
																				
																			?>
																		</select>
																	</div>
																</div>
																
																<div class="form-group">
																	<div class="col-sm-offset-2 col-sm-10">
																		<button type="submit" name="btn_add" value="1" class="btn btn-success">ثبت</button>
																		<button type="submit" name="btn_close" value="1" class="btn btn-secondary">انصراف</button>
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
							<script src="js/select2.full.min.js"></script>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#parent_id').select2();
								});
								
							</script>
						</body>
					</html>