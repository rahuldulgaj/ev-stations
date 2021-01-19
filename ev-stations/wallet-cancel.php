<?php include 'include/header.php';
if(!isset($_SESSION['user_id'])){
  
  echo '<script>window.location.href="index.php"</script>'; 
}


?>

<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="page_title">
          <h2>Cancel Payment</h2>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <ul class="breadcrumb">
          <li><a href="index.php">home</a></li>
          <li>//</li>
          <li><a href="#">Cancel Payment</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="thankyou">

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="ast_overview_info">
          <h2 style="color:red !important">Oops Sorry!</h2>
          <h3>Transaction Failed. Please Try Again.</h3>
            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder70 ast_bottompadder70">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
        <div class="ast_heading">
          <h1>Download our <span>Mobile App</span></h1>
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
        <div class="ast_download_box">
          <ul>
            <li><a href="#"><img src="images/content/download1.png" alt="Download" title="Download"></a></li>
            <li><a href="#"><img src="images/content/download2.png" alt="Download" title="Download"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Download wrapper End-->



<?php
unset($_SESSION['wallet']);
include('include/footer.php');
?>
