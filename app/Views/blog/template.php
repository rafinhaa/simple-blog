<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?= esc($config['blog_name']) ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('/assets/css/theme-'.$config['theme'].'.css') ?>">

</head> 

<body>
    
    <header class="header text-center">	    
	    <h1 class="blog-name pt-lg-4 mb-0"><a href="<?= base_url('/') ?>"><?= esc($config['blog_name']) ?></a></h1>
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column" >
				<div class="profile-section pt-3 pt-lg-0">
                    <?php if(file_exists('assets/images/blog-personal-image.png')): ?>
				        <img class="profile-image mb-3 rounded-circle mx-auto" src="<?= base_url('assets/images/blog-personal-image.png')?>" alt="image" >			
                    <?php else: ?>
                        <img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile.png" alt="image" >
                    <?php endif; ?>
					<div class="bio mb-3"><?= esc($config['bio']) ?><br></div><!--//bio-->
					<ul class="social-list list-inline py-3 mx-auto">
                        <?php if (!empty($config['social_twitter'])): ?>
                            <li class="list-inline-item"><a href="<?= $config['social_twitter'] ?>"><i class="fab fa-twitter fa-fw"></i></a></li>
                        <?php endif; ?>
                        <?php if (!empty($config['social_linkedin'])): ?>
                            <li class="list-inline-item"><a href="<?= $config['social_linkedin'] ?>"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                        <?php endif; ?>
                        <?php if (!empty($config['social_github'])): ?>
                            <li class="list-inline-item"><a href="<?= $config['social_github'] ?>"><i class="fab fa-github-alt fa-fw"></i></a></li>
                        <?php endif; ?>
                        <?php if (!empty($config['social_stoverflow'])): ?>
                            <li class="list-inline-item"><a href="<?= $config['social_stoverflow'] ?>"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                        <?php endif; ?>
			            <?php if (!empty($config['social_codepen'])): ?>
                            <li class="list-inline-item"><a href="<?= $config['social_codepen'] ?>"><i class="fab fa-codepen fa-fw"></i></a></li>
                        <?php endif; ?>
			        </ul><!--//social-list-->
			        <hr> 
				</div><!--//profile-section-->
				
				<ul class="navbar-nav flex-column text-left">
					<li class="nav-item <?= isset($active_home) && $active_home == true ? 'active' : ''?>">
					    <a class="nav-link" href="<?= base_url('/') ?>"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item <?= isset($active_about) && $active_about == true ? 'active' : ''?>">
					    <a class="nav-link" href="<?= base_url('/about')?>"><i class="fas fa-user fa-fw mr-2"></i>About Me </a>
					</li>
				</ul>
				
				<div class="my-2 my-md-3">
				    <a class="btn btn-primary" href="https://themes.3rdwavemedia.com/" target="_blank">Get in Touch</a>
				</div>
			</div>
		</nav>
    </header>
    
    <div class="main-wrapper">
		<?= $this->renderSection('content') ?>				
	    <footer class="footer text-center py-2 theme-bg-dark">
		   
	        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
		   
	    </footer>
    
    </div><!--//main-wrapper-->    
       
    <!-- Javascript -->          
    <script src="assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script> 
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
</body>
</html> 