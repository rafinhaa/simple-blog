<?= $this->extend('blog/template') ?>

<?= $this->section('content') ?>
	<?php foreach($posts as $post): ?>
		<div class="item mb-5">
			<div class="media">
				<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg" alt="image">
				<div class="media-body">
					<h3 class="title mb-1"><a href="blog-post.html"><?= $post['title'] ?></a></h3>
					<div class="meta mb-1"><span class="date"><?= $post['created_at'] ?></span><span class="comment"><a href="#">8 comments</a></span></div>
					<div class="intro"><?= substr($post['body'],0, 219)  ?>...</div>
					<a class="more-link" href="blog-post.html">Read more &rarr;</a>
				</div><!--//media-body-->
			</div><!--//media-->
		</div><!--//item-->	
	<?php endforeach; ?>	
<?= $this->endSection() ?>