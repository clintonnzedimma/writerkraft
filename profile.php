<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/profile_ctrl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Writerkraft</title>

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

<style type="text/css">
    p.tick-icon {
        font-size: 50px;
        color: #00ea00;
    } 

    .success-modal{
        margin-top: 11%;
    }

    label.file-upload{position:relative;overflow:hidden; background: #dddddd;}
    label.file-upload input[type=file]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;font-size:100px;text-align:right;filter:alpha(opacity=0);opacity:0;outline:0;background:#fff;cursor:inherit;display:block}    

/*mobile*/
@media (max-width:600px)
{ 
.success-modal{
    margin-left: auto;
    margin-top: 23%;
}
}

</style>    
    
<?php include 'includes/header.php'; ?>

    <!-- ********** Hero Area Start ********** -->
    <!-- <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(img/blog-img/bsww.png);"></div> -->
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area mb-100">
                        <div class="profile-pic post-style-4 d-flex align-items-center" id="profile-header">
                          <?php if (!$u->hasDp()): ?>
                             <div class="post-thumbnail">
                                <img src="img/blog-img/default_pic.jpg" id="profile-pic" alt="">
                            </div>                             
                          <?php endif ?>  

                         <?php if ($u->hasDp()): ?>
                             <div class="post-thumbnail">
                                <img src="img/dp/<?=$u->get('profile_pic')?>" id="profile-pic" alt="">
                            </div>                             
                         <?php endif ?> 

                            <div class="post-content">
                                <a class="headline">
                                    <h5>{{input['full_name']}}</h5>
                                </a>
                                <p>{{input['bio']}}</p>
                            </div>
                        </div>
                        <br/>
                       <!--  <button class="btn world-btn">Change Photo</button> -->                       
                        <form method="post" enctype="multipart/form-data">
                            <label class="file-upload btn world-btn">
                            Change Photo 
                            <input type="file" accept="image/*" name="profilePicInput" id="profilePicInput"/>
                            </label>

                            <br>

                            <label id="savePhoto" style="display: none;">
                                <button type="submit" class="btn world-btn" name="save-photo">Save Photo</button>
                            </label>
                        </form>
                        <br/>
                        <br/>
                        
                        <div class="world-catagory-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#world-tab-1" role="tab" aria-controls="world-tab-1" aria-selected="true">Activity</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#world-tab-2" role="tab" aria-controls="world-tab-2" aria-selected="false">Krafts</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#world-tab-3" role="tab" aria-controls="world-tab-3" aria-selected="false">Edit Profile</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <!-- Activity tab contents starts here -->
                                <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="img/blog-img/b18.jpg" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5>Africa my Africa</h5>
                                            </a>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="#" <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                <br/>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>4.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>10</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="img/blog-img/b19.jpg" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5>Europe my Europe</h5>
                                            </a>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                <br/>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>4.27</span></a>
                                                    &nbsp &nbsp
                                                    <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>10</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Activity tab contents ends here-->


                                <!-- Kraft tab -->
                                <div class="tab-pane fade" id="world-tab-2" role="tabpanel" aria-labelledby="tab2">
                                    <!-- Single Blog Post -->
                                    <!-- <div class="single-blog-post post-style-4 d-flex align-items-center"> -->
                                        <!-- here -->
                                        <ul class="nav nav-tabs" id="KraftsSection" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="all" data-toggle="tab" href="#allKrafts" role="tab" aria-controls="allKrafts" aria-selected="true">All</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="published" data-toggle="tab" href="#publishedKrafts" role="tab" aria-controls="publishedKrafts" aria-selected="false">Published</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="draft" data-toggle="tab" href="#draftKraft" role="tab" aria-controls="draftKraft" aria-selected="false">Draft</a>
                                            </li>
                                        </ul>

                                    <!-- </div> -->

                                    <div class="tab-content" id="kraftTabContent">

                                        <!-- all -->
                                        <div class="tab-pane fade show active" id="allKrafts" role="tabpanel" aria-labelledby="all">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-4 d-flex align-items-center">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="img/blog-img/b18.jpg" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="#" class="headline">
                                                        <h5>Africa my Africa</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <p><a href="#" <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                    </div>
                                                    <br/>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>4.27</span></a>
                                                        &nbsp &nbsp
                                                        <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>10</span></a>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-4 d-flex align-items-center">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="img/blog-img/b18.jpg" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="#" class="headline">
                                                        <h5>New London</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <p><a href="#" <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                    </div>
                                                    <br/>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>0</span></a>
                                                        &nbsp &nbsp
                                                        <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>0</span></a>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <!-- Published -->
                                        <div class="tab-pane fade" id="publishedKrafts" role="tabpanel" aria-labelledby="published">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-4 d-flex align-items-center">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="img/blog-img/b18.jpg" alt="">
                                                </div>
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <a href="#" class="headline">
                                                            <h5>Africa my Africa</h5>
                                                        </a>
                                                            <!-- Post Meta -->
                                                        <div class="post-meta">
                                                            <p><a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                        </div>
                                                        <br/>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>4.27</span></a>
                                                            &nbsp &nbsp
                                                            <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>10</span></a>
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>


                                        <div class="tab-pane fade" id="draftKraft" role="tabpanel" aria-labelledby="draft">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-4 d-flex align-items-center">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="img/blog-img/b18.jpg" alt="">
                                                </div>
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <a href="#" class="headline">
                                                            <h5>New London</h5>
                                                        </a>
                                                            <!-- Post Meta -->
                                                        <div class="post-meta">
                                                            <p><a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                        </div>
                                                        <br/>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="post-like"><img src="img/core-img/star.png" alt=""> <span>0</span></a>
                                                            &nbsp &nbsp
                                                            <a href="#" class="post-comment"><img src="img/core-img/comments24.png" alt=""> <span>0</span></a>
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>        <!-- end -->

                                <!-- third tab -->

                                <div class="tab-pane fade" id="world-tab-3" role="tabpanel" aria-labelledby="tab3">
                                <!-- edit profile -->
                                <form method="post" id="edit-profile" @submit.prevent>
                                    
                                <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="full_name" id="full_name" v-model="input['full_name']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label> Full Name </label>
                                    </div>
                                </div>                                    
                                <div class="col-12">
                                    <div class="group">
                                        <textarea type="text" name="bio" id="bio" v-model="input['bio']">{{input['bio']}}</textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Bio</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="occupation" id="occupation" v-model="input['occupation']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Occupation</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="qualifications" id="qualifications" v-model="input['qualifications']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Qualifications</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="location" id="location" v-model="input['location']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Location</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="fav_word" id="fav_word" v-model="input['fav_word']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Favorite Word</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="fav_book" id="fav_book" v-model="input['fav_book']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Favorite Book</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="fav_colour" id="fav_colour" v-model="input['fav_colour']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Favorite Colour</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="fav_vice" id="fav_vice" v-model="input['fav_vice']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Favorite Vice</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="fav_person" id="fav_person" v-model="input['fav_person']">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Favorite Person</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn world-btn" @click="saveProfileChanges">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                                    
                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="load-more-btn mt-50 text-center">
                                    <a href="#" class="btn world-btn">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area">
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area" id="about-widget">
                            <h5 class="title">About</h5>
                            <div class="widget-content">
                                <p>Occupation: {{input['occupation']}}</p>
                                <p>Qualifications: {{input['qualifications']}}</p>
                                <p>Location: {{input['location']}}</p>
                                <p>Favorite Word: {{input['fav_word']}}</p>
                                <p>Favorite book: {{input['fav_book']}}</p>
                                <p>Favorite colour: {{input['fav_colour']}}</p>
                                <p>Favorite Vice: {{input['fav_vice']}}</p>
                                <p>Favorite Person: {{input['fav_person']}}</p>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        
                        <!-- Widget Area -->
<!--                         <div class="sidebar-widget-area">
                            <h5 class="title">Join the community</h5>
                            <div class="widget-content">
                                <div class="social-area d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div> -->
                        <!-- Widget Area -->

                    </div>
                </div>
            </div>

            <!-- Load More btn -->
            
        </div>
    </div>

<!-- Modal -->
<div class="modal fade success-modal" id="successModal-EditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" styl>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: 0px !important">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
            <p class="fa fa-check tick-icon"></p>
            <p class="block-one">Changes to profile saved</p>  
      </div>
      <div class="modal-footer" style="border: 0px !important">
      </div>
    </div>
  </div>
</div>



<?php if (isset($_POST['save-photo'])): ?>
    <?php if (empty($errors)): ?>
<div class="modal fade success-modal" id="successModal-ProfilePicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: 0px !important">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
            <p class="fa fa-check tick-icon"></p>
            <p class="block-one">Upload Successful</p>  
      </div>
      <div class="modal-footer" style="border: 0px !important">
      </div>
    </div>
  </div>
</div>        
    <?php endif ?>

    <?php if (!empty($errors)): ?>

<div class="modal fade success-modal" id="errorModal-ProfilePicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border: 0px !important">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
             <p class="fa fa-exclamation-circle tick-icon" style="color: #ff3535"></p> 

            <p class="block-one" align="center">
               <?php foreach ($errors as $error): ?>
                   <span><?=$error?> </span> <br>
               <?php endforeach ?>
            </p>  
      </div>
      <div class="modal-footer" style="border: 0px !important">
      </div>
    </div>
  </div>
</div> 

    <?php endif ?>    
<?php endif ?>





<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
   
   var vueEditProfile =  new Vue({
        el:"form#edit-profile",
        data: {
            input : {
                full_name : "<?=$u->get('full_name')?>",
                bio : "<?=$u->get('bio')?>",
                occupation : "<?=$u->get('occupation')?>",
                location : "<?=$u->get('location')?>",
                fav_word : "<?=$u->get('fav_word')?>",
                fav_book : "<?=$u->get('fav_book')?>",
                fav_vice : "<?=$u->get('fav_vice')?>",
                fav_colour : "<?=$u->get('fav_colour')?>",
                fav_person : "<?=$u->get('fav_person')?>",
                qualifications : "<?=$u->get('qualifications')?>"                
            }
         },

          methods : {
            saveProfileChanges : function (e) {
                ajaxData = {
                    action : 'edit-profile',
                    data : this.input
                }
                $.get(
                    "Engine/Async/profile_ajax.php",
                     ajaxData,   
                    function(response, status){
                        if (status && response == 1) {
                            $("#successModal-EditProfile").modal("show");
                        } 

                });
            }
          }   
    });

   var profileHeader = new Vue ({
        el:'#profile-header',
        data : vueEditProfile.$data
   });  

   var aboutWidget = new Vue ({
        el:'#about-widget',
        data : vueEditProfile.$data
   });

    $('.file-upload').file_upload();
    $("#profile-pic").previewImageFrom("#profilePicInput");
    $("#profilePicInput").on('change', function(){
        $("#savePhoto").show();
    });


 <?php if (isset($_POST['save-photo'])): ?>
    // Profile picture upload alerts
    <?php if (empty($errors)): ?>
        $("#successModal-ProfilePicture").modal("show");
    <?php endif ?>

    <?php if (!empty($errors)): ?>
        $("#errorModal-ProfilePicture").modal("show");
    <?php endif ?>       
<?php endif ?>


</script>
</body>
</html>