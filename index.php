<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/index_ctrl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>writerkraft - hone your craft</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

<?php include 'includes/meta-extra.php'; ?>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

<?php include 'includes/header.php'; ?>


    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">

        <!-- Hero Slides Area -->
        <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(img/blog-img/bsww.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <h3></h3>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Hero Post Slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                            <!-- Single Slide -->
                            <div class="single-slide d-flex align-items-center">
                                <div class="post-number">
                                    <p>1</p>
                                </div>
                                <div class="post-title">
                                    <a href="news.html">Welcome to writerkraft</a>
                                </div>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-slide d-flex align-items-center">
                                <div class="post-number">
                                    <p>2</p>
                                </div>
                                <div class="post-title">
                                    <a href="news.html">News and Updates appears here</a>
                                </div>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-slide d-flex align-items-center">
                                <div class="post-number">
                                    <p>3</p>
                                </div>
                                <div class="post-title">
                                    <a href="news.html">News and updates appears here</a>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area mb-100">
                        <!-- Catagory Area -->
                        <div class="world-catagory-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="title">Feeds</li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <!-- Single Blog Post -->


                                   <?php foreach ($krafts as $kraft): ?>
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->

                                        <?php if (strlen($kraft['cover_img']) > 0): ?>
                                        <div class="post-thumbnail">
                                            <img src="img/cover-art/<?=$kraft['cover_img']?>" alt="">
                                        </div> 
                                        <?php endif ?>

                                        <?php if (strlen($kraft['cover_img']) == 0): ?>
                                        <div class="post-thumbnail">
                                            <img src="img/blog-img/b18.jpg" alt="">
                                        </div> 
                                        <?php endif ?>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="posts.html" class="headline">
                                                <h3><?=$kraft['title']?></h3>
                                            </a>
                                            <p><a href="viewProfile.html" class="post-author"><?=User_Factory::getById('full_name', $kraft['user_id'])?></a></p>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a class="post-date">
                                                    <?php 
                                                        // output for formatted kraft date of post
                                                        $date = new DateTime($kraft['date_of_post']); 
                                                        echo date_format($date, "M d, Y ");
                                                    ?>

                                                         at

                                                    <?php 
                                                        // output for formatted time of post
                                                        $time = new DateTime($kraft['time_of_post']);
                                                        echo date_format($time, "g:i:a");
                                                    ?>
                                                </a></p>
                                                <br/>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>X</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>Y</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                       
                                   <?php endforeach ?> 


                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area">
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Browse</h5>
                            <div class="widget-content">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <ul>
                                        	<li><a href="category.html">Italian</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Classical</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Thoughts</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Random</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Love</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Satire</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Quotes</a></li>
                                        </ul>
                                        <ul>
                                        	<li><a href=#>Emotions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Top Krafts</h5>
                            <div class="widget-content">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/b11.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Divine Comedy - Inferno</h5>
                                        </a>
                                        <div class="post-meta">
                                                <p><a href="#" class="post-author">Dante Alighieri</a></p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star16.png" alt=""> <span>3.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments16.png" alt=""> <span>10</span></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/b13.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Africa my Africa</h5>
                                        </a>
                                        <div class="post-meta">
                                                <p><a href="#" class="post-author">David Diop</a></p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star16.png" alt=""> <span>3.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments16.png" alt=""> <span>10</span></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/b14.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Ain't I A Woman?</h5>
                                        </a>
                                        <div class="post-meta">
                                                <p><a href="#" class="post-author">Truth Soujourner</a></p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star16.png" alt=""> <span>3.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments16.png" alt=""> <span>10</span></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/b10.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">More Life</h5>
                                        </a>
                                        <div class="post-meta">
                                                <p><a href="#" class="post-author">Aubrey Graham</a></p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star16.png" alt=""> <span>3.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments16.png" alt=""> <span>10</span></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/b12.jpg" alt="">
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0">Ixnay</h5>
                                        </a>
                                        <div class="post-meta">
                                                <p><a href="#" class="post-author">ChiBosette</a></p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star16.png" alt=""> <span>3.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments16.png" alt=""> <span>10</span></a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <!-- <h5 class="title">Join the community</h5> -->
 <!--                            <div class="widget-content">
                                <div class="social-area d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div> -->
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Recently Joined</h5>
                            <div class="widget-content">

                               <?php foreach ($recently_joined_users as $user): ?>
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                    <?php if (strlen($user['profile_pic']) > 0): ?>
                                    <div class="post-thumbnail">
                                        <img src="img/dp/<?=$user['profile_pic']?>" alt="<?=$user['username']?>">
                                    </div>                                    
                                    <?php endif ?>

                                    <?php if (strlen($user['profile_pic']) == 0): ?>
                                    <div class="post-thumbnail">
                                        <img src="img/blog-img/default_pic.jpg" alt="<?=$user['username']?>">
                                    </div>                                    
                                    <?php endif ?>                                    

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="headline">
                                            <h5 class="mb-0"><?=$user['full_name']?></h5>
                                        </a>
                                    </div>
                                </div>                                
                                   
                               <?php endforeach ?> 

      
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More btn -->
<!--             <div class="row">
                <div class="col-12">
                    <div class="load-more-btn mt-50 text-center">
                        <a href="#" class="btn world-btn">Load More</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>


<?php include 'includes/footer.php'; ?>

</body>

</html>