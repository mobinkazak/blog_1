<?php
require_once '../init.php';
if (!$backend->isLogin('admin_id')) {
$backend->redirect('login.php?msg=logup');
}
if ($backend->get('logout') == '1') {
$backend->logout();
$backend->redirect('login.php?msg=logout');
}
$profile=$backend->getProfile();
if ($backend->post('btn_update')) {
$fn=$backend->post('firstname');
$ln=$backend->post('lastname');
$username=$backend->post('username');
$email=$backend->post('email');
$currentPass=$backend->post('currentPass');
$newPass=$backend->post('newPass');
$newPass2=$backend->post('newPass2');
$res=$backend->saveProfile($fn,$ln,$username,$email,$currentPass,$newPass,$newPass2);
$backend->redirect('?msg=e'.$res);
}
if ($backend->post('btn_close')) {
$backend->redirect('index.php');
}
if ($backend->get('del')==1) {
$res=$backend->delAvatar();
$backend->redirect('?msg=deleted'.$res);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | پروفایل کاربری</title>
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
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>پروفایل</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left" style="direction:ltr;">
                  <li class="breadcrumb-item"><a href="<?php print ADMIN_URL; ?>">خانه</a></li>
                  <li class="breadcrumb-item active">پروفایل کاربری</li>
                </ol>
              </div>
            </div>
            </div><!-- /.container-fluid -->
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?php print SITE_URL.'/avatars/'. $profile['avatar']; ?>" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center"><?php print $profile['first_name'].' '.$profile['last_name']; ?></h3>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="" data-toggle="tab">تنظیمات</a></li>
                      </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <?php $backend->setAlert('success','e1','اطلاعات با موفقیت ذخیره شد'); ?>
                        <?php $backend->setAlert('danger','eu-1','آپلود مشکل دارد'); ?>
                        <?php $backend->setAlert('danger','eu-2','فایل های قابل اپلود [jpg,jpeg,png]'); ?>
                        <?php $backend->setAlert('danger','eu-3','آپلود عکس با مشکل مواجه شده است'); ?>
                        <?php $backend->setAlert('success','deleted','عکس پروفایل شما با موفقیت حذف شد'); ?>
                        <div class="tab-content">
                          <div class="active tab-pane" id="activity">
                            <div class="tab-pane" id="settings">
                              <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="firstname" class="col-sm-2 control-label">نام</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="firstname" value="<?php print $profile['first_name']; ?>" name="firstname" placeholder="نام">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php print $profile['last_name']; ?>" id="lastname" name="lastname" placeholder="نام خانوادگی">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="username" class="col-sm-2 control-label required">نام کاربری</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" value="<?php print $profile['username']; ?>" name="username" placeholder="نام کاربری">
                                    <div class="pt-1 ">
                                      <?php $backend->setAlert('danger','e-1','نام کاربری وارد شده وجود دارد'); ?>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="email" class="col-sm-2 control-label required">ایمیل</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" value="<?php print $profile['email']; ?>" id="email" name="email" placeholder="ایمیل">
                                    <div class="pt-1 ">
                                      <?php $backend->setAlert('danger','e-2','ایمیل وارد شده وجود دارد'); ?>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="currentPass" class="col-sm-2 control-label">رمزعبور فعلی</label>
                                  <div class="col-sm-10">
                                    <input type="password" class="form-control" id="currentPass" name="currentPass" placeholder="رمزعبور فعلی">
                                    <div class="pt-1 ">
                                      <?php $backend->setAlert('danger','e-3','رمزعبور فعلی اشتباه وارد شده است'); ?>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="newPass" class="col-sm-2 control-label">رمزعبور جدید</label>
                                  <div class="col-sm-10">
                                    <input type="password" class="form-control" id="newPass" name="newPass" placeholder="رمزعبور جدید">
                                    
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="newPass2" class="col-sm-3 control-label">تکرار رمزعبور جدید</label>
                                  <div class="col-sm-10">
                                    <input type="password" class="form-control" id="newPass2" name="newPass2" placeholder="تکرار رمزعبور جدید">
                                    <div class="pt-1 ">
                                      <?php $backend->setAlert('danger','e-4','رمزعبور جدید وارد شده مطابقت ندارد'); ?>
                                    </div>
                                  </div>
                                </div>
                                <?php
                                if (isset($profile['avatar'])!='' && file_exists('../avatars/'.$profile['avatar'])) {
                                ?>
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <img class="w-25" style="display:block;" src="<?php print SITE_URL.'/avatars/'.$profile['avatar']; ?>" alt="">
                                    <a href="?del=1" class="btn btn-danger mt-2">
                                      <span class="fa fa-trash"></span> حذف عکس </a>
                                    </div>
                                  </div>
                                  <?php
                                  }else{
                                  ?>
                                  <div class="form-group">
                                    <label for="avatar" class="col-sm-2 control-label">آپلود عکس</label>
                                    <div class="col-sm-10">
                                      <input type="file" class="form-control" id="avatar" name="avatar">
                                    </div>
                                  </div>
                                  <?php
                                  
                                  }
                                  ?>
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <button type="submit" name="btn_update" value="1" class="btn btn-success">ذخیره</button>
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
              </body>
            </html>