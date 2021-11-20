<?php
	require_once 'init.php';
	$id=$frontend->toInt($frontend->post('id'));
	
	if ($frontend->post('name')) {
	sleep(1);
	$name=$frontend->safeString($frontend->post('name'));
	$email=$frontend->safeString($frontend->post('email'));
	$comment=$frontend->safeString($frontend->post('comment'));
	if ($name!='' || $comment!='') {
		$frontend->insertComment($id,$name,$comment,$email);
		}
	}
	if($frontend->post('newCommentCount')){
		$newCommentCount=$frontend->post('newCommentCount');
		$getPostsComment=$frontend->getPostsComment($id,$newCommentCount);
		while ($getComment=$frontend->getRow($getPostsComment)) {
?>
		<div class="media">
			<!-- <a class="media-left" href="#">
					<img src="upload/author.jpg" alt="" class="rounded-circle">
			</a> -->
			<div class="media-body">
				<h4 class="media-heading user_name ml-3 float-right"><?php print $getComment['name']; ?></h4>
				<small class="pl-0 clearfix"><?php print $frontend->persianDate($getComment['created_date_time']); ?></small>
				<p><?php print $getComment['comment'] ?></p>
				<!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
			</div>
		</div>
<?php
	}
}
	if ($frontend->post('newArticleCount')) {
	$newArticleCount=$frontend->post('newArticleCount');
	$getLastArticle=$frontend->getLastArticle($newArticleCount);
	while ($articles=$frontend->getRow($getLastArticle)) {
	$getCat=$frontend->getGroup($articles['cat_id']);
	$url2=$frontend->createSeoUrl("articles/$articles[id]/$articles[title]/");
	?>
	<div class="blog-box row">
		<div class="col-md-4">
			<div class="post-media">
				<a href="<?php print $url2; ?>" title="<?php print $articles['title']; ?>">
					<img src="<?php print $articles['tiny_image']; ?>" alt="<?php print $articles['title']; ?>" class="img-fluid">
					<div class="hovereffect"></div>
				</a>
				</div><!-- end media -->
				</div><!-- end col -->
				
				<div class="blog-meta big-meta col-md-8">
					<h4><a href="<?php print $url2; ?>" title=""><?php print $articles['title']; ?></a></h4>
					<p><?php print $articles['short_desc']; ?></p>
					<small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">
						<?php print $getCat['title']; ?>
					</a></small>
					<small><?php print $frontend->persianDate($articles['created_date_time'],'-') ?></small>
					<!-- <small><a href="tech-author.html" title="">by Matilda</a></small> -->
					<!-- <small><a href="javascript:void(0);" title=""><i class="fa fa-eye"></i> --> <!-- <?php print $articles['count_view']; ?> --><!-- </a></small> -->
				</div>
				<!-- end meta -->
			</div>
			<!-- end blog-box -->
			<hr class="invis0">
			<?php
			}
	}