<?php
include("user-mainbar.php");
?>
            <div class="row">  
               <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">Balance Details</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12">
                           <div class="total-balance">
                              <p>Total Balance</p>
                              <h2><!--$--> <?php echo number_format($_SESSION['totalbalance']); ?></h2>
                           </div>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <a href="Transfer">
                           <div class="balance-stats active">
                              <h3>Transfer</h3>
                           </div>
                           </a>
                        </div>


                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <a href="Transfer-History">
                           <div class="balance-stats">
                              <h3>Transaction History</h3>
                           </div>
                           </a>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <a href="">
                           <div class="balance-stats">
                              <p></p>
                              <h3>Deposit</h3>
                           </div>
                           </a>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>

               
                </div>
            </div>
        </div>
    </div>



</div>




<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="vendor/chartjs/chartjs.js"></script>



<script src="js/plugins/chartjs-line-init.js"></script>




<script src="js/plugins/chartjs-donut.js"></script>






<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="js/plugins/perfect-scrollbar-init.js"></script>



<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="js/plugins/circle-progress-init.js"></script>







<script src="js/scripts.js"></script>


</body>

</html>