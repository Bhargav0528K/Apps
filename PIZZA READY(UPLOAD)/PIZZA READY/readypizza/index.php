<?php
session_start();
include 'app-login-header.php';
$page_id="home";
$page_top_id="";

?>

<style>
body{
	background: url(images/pizzaback.jpg);

}
.jumbotron{
	    min-height: 420px;
    opacity: 0.8;
    padding-left: 0px !important;
    padding-right: 0px !important;
}
</style>
  
<div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
 <div class="jumbotron col-sm-10 col-sm-offset-1" style="min-height:420px;text-align: center;">
  <h1 class="text-center">Ready Pizza</h1>
  <p class="text-center" style="
    background: aliceblue;
">Get your pizza delivered to your home in 30 mins!</p><br>
  <img src="images/homedelivery.png"><img src="images/30min.png"><br>
<a href="order-online.php"><img src="images/order.png" style="
    /* text-align: center; */
"></a>
</div>

</div>
<script type="text/javascript">
	setTimeout(function(){$("#invalidLogin").alert("close");},10000);
</script>

<?php 
include 'app-login-footer.php';
?>