<?= $this->extend('blog/template') ?>
<?= $this->section('content') ?>	    
	<article class="about-section py-5">
		    <div class="container">
			    <h2 class="title mb-3"><?= $about['title_page'] ?></h2>
			    
			    <p><?= $about['about'] ?></p>			    
			    
			    <figure><a href="https://made4dev.com"><img class="img-fluid" src="assets/images/promo-banner.jpg" alt="image"></a></figure>
		    </div>
	    </article><!--//about-section-->
<?= $this->endSection() ?>