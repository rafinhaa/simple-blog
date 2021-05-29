<?= $this->extend('blog/template') ?>

<?= $this->section('content') ?>
		<section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">DevBlog - A Blog Template Made For Developers</h2>
			    <div class="intro">Welcome to my blog. Search and get my blog post result.</div>
			    <form class="signup-form form-inline justify-content-center pt-3">
                    <div class="form-group">
                        <label class="sr-only" for="semail">Your email</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
		    </div><!--//container-->
	    </section>
	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
				<?php foreach($posts as $post): ?>
					<div class="item mb-5">
						<div class="media">
							<a href="<?= base_url('/post-blog/'.$post['slug']) ?>">
								<?php if(!is_null($post['photo_post'])): ?>
									<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="<?= base_url('upload/posts-img/'.$post['photo_post']) ?>" alt="image" >			
								<?php else: ?>
									<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg" alt="image">
								<?php endif; ?>								
							</a>
							<div class="media-body">
								<h3 class="title mb-1"><a href="<?= base_url('/post-blog/'.$post['slug']) ?>"><?= $post['title'] ?></a></h3>
								<div class="meta mb-1"><span class="date"><?= date("d/m/Y - H:i", strtotime($post['created_at'])) ?></span></div>
								<div class="intro"><?= substr($post['body'],0, 219)  ?>...</div>
								<a class="more-link" href="<?= base_url('/post-blog/'.$post['slug']) ?>">Leia mais &rarr;</a>
							</div><!--//media-body-->
						</div><!--//media-->
					</div><!--//item-->	
				<?php endforeach; ?>						
				<div class="d-flex justify-content-center">
					<?= $pager->links('blog','blog_pagination') ?>
				</div>
		    </div>
	    </section>
<?= $this->endSection() ?>