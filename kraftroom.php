<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php'; 
    include ROOT.'/engine/controllers/kraftroom_ctrl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Title  -->
    <title>writerkraft - Kraft Room</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

<style type="text/css">
    label.file-upload{position:relative;overflow:hidden; background: #dddddd;}
    label.file-upload input[type=file]{position:absolute;top:0;right:0;min-width:100%;min-height:100%;font-size:100px;text-align:right;filter:alpha(opacity=0);opacity:0;outline:0;background:#fff;cursor:inherit;display:block}      
</style>


    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <?php include 'includes/header.php'; ?>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(img/blog-img/bsww.png);"></div>
    <!-- ********** Hero Area End ********** -->

    <section class="contact-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="contact-form">
                        <h5 style="text-indent: 10px">Welcome to the Kraft Room</h5></pre>

                       <?php if (isset($_POST['add-kraft'])): ?>
                        <div class="server-alert" align="center" style="font-family: verdana">

                          <?php if ($_POST['add-kraft'] == 'to-publish'): ?>
                            <!--alerts for PUBLISH  -->
                            <?php if (!empty($errors)): ?>
                               <p class="errors" style="color: #fa1436; font-size: 17px;">
                                   <?php foreach ($errors as $error): ?>
                                       <span> <?=$error?> </span> <br>
                                   <?php endforeach ?>
                               </p>                                
                            <?php endif ?> 

                            <p class="success" style="color: #04b31b; font-size: 17px;">
                                <?php if (empty($errors)): ?>
                                  <i class="fa fa-check"></i>  Kraft published successfully
                               <?php endif ?>
                           </p>                                                          
                          <?php endif ?>  


                          <?php if ($_POST['add-kraft'] == 'to-draft'): ?>
                            <!--alerts for DRAFT -->
                            <?php if (!empty($errors)): ?>
                               <p class="errors" style="color: #fa1436; font-size: 17px;">
                                   <?php foreach ($errors as $error): ?>
                                       <span> <?=$error?> </span> <br>
                                   <?php endforeach ?>
                               </p>                                
                            <?php endif ?> 

                            <p class="success" style="color: #04b31b; font-size: 17px;">
                                <?php if (empty($errors)): ?>
                                   <i class="fa fa-check"></i>  Kraft saved to draft successfully
                               <?php endif ?>
                           </p>                                                          
                          <?php endif ?>  
                                        
                        </div>  
                       <?php endif // if isset add-kraft?> 

                       <br> <br>

                        <!-- Contact Form -->
                        <form action="#" method="post" enctype="multipart/form-data" id="kraft">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text"  name="title" v-model="input['title']" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Title</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="writeup" id="content" required>{{input['writeup']}}</textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Content</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="group" style=" font-size: 12px;">
                                       <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Category</label>
                                        <br> <br>
                                            <input style="height: 10px; margin-top: -20px; display: none;" type="radio" name="category" checked="checked" value>  <br>

                                            <?php foreach (Kraft_Factory::$allowed_categories as $category): ?>
                                                <?=ucwords($category)?>
                                        <input style="height: 10px; margin-top: -20px;" type="radio" name="category" v-model="input['category']" value="<?=$category?>" <?php if (isset($_POST['category']) && $_POST['category']== $category): ?>
                                        checked="checked"
                                             <?php endif ?> >  <br>
                                            <?php endforeach ?> 
                                        
                                    </div>
                                </div>


                                <div class="col-12 col-md-6">
                                    <div class="group">
                                     <img src="img/blog-img/b18.jpg" style="opacity: 0.8" width="200" id="kraftPic">  
                                    </div>
                                </div> 

                                 

                                 <div class="col-12 col-md-6">
                                    <!-- <div class="group"> -->
                                        <label class="file-upload btn world-btn">
                                        Change Kraft Photo
                                        <input type="file" accept="image/*" name="cover_img" id="kraftPicInput"/>
                                        </label>
                                    <!-- </div> -->
                                </div>

                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="editor_note" id="message">{{input['editor_note']}}</textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Editor's note</label>
                                    </div>
                                </div>

                                <div class="side-by-side">
                                <div class="col-12">
                                    <button type="submit" name="add-kraft" class="btn world-btn" value="to-publish">Publish Now</button>
                                    <button type="submit" name="add-kraft" value="to-draft" class="btn world-btn">Save as Draft</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>   


    <!-- ***** Footer Area Start ***** -->
    <?php include 'includes/footer.php'; ?>
    <!-- ***** Footer Area End ***** -->




<script type="text/javascript">

    var kraft = new Vue({
        el:'#kraft',
        data : {
            input: {
                title: "<?php postConst('title')?>",
                writeup: "<?php postConst('writeup')?>",
                category: "<?php postConst('category') ?>",
                editor_note: "<?php postConst('editor_note')?>"
            }
        }
    });


    $("#kraftPic").previewImageFrom("#kraftPicInput");
    $("#kraftPicInput").on('change', function(){
        $("#savePhoto").show();
    });    
</script>


</body>

</html>