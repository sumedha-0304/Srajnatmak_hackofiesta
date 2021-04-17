<!DOCTYPE html>

<html lang="en">
<?php include "head.php";
session_start();
include '../connect.php';

?>
<style>
  input[type=text1]
{
  border-style: none; 
  height:0.1px;
  width: 0.1px;
  background-color: transparent;
  text-align: center;
}
</style>
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5feed054df060f156a92f4f1/1equdrjb7';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php include "top_nav.php";?>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
    
  <main id="main">
    

    <section id="team" class="team">
      <div class="container" style="margin-top: 10px;">

     <center> 
<a href="viewallrequest.php"><button class="btn btn-primary">All</button></a>
<a href="pendingrequest.php"><button class="btn btn-primary">Pending</button></a>
      <a href="approvedrequest.php"><button class="btn btn-primary">Approved</button></a>
   <a href="cancelrequest.php"><button class="btn btn-primary">Cancelled</button></a>
</center>
<div class="row"><div class="col-lg-12 col-md-6 offset-md-3 col-xl-6 offset-xl-3">     
  <table class = "table table-sm reflow">

                <tbody>
                      <?php
                      $hospid = $_SESSION['hospid'];
                      $query="select * from bloodrequest b inner join userdetails u on b.userid=u.userid  where b.hospid='$hospid'";
                      $result=mysqli_query($conn, $query);
                      if ($result->num_rows!=0) {
                         echo "<h3>Requests :</h3><br>";
                         
                                         echo"<thead>
                <tr>
                  <th>ID</th>
                  <th>Amount</th>
                  <th>Requested blood group</th>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Status</th>
                </thead>";
                      while ($object = $result->fetch_object()) 
                      {
                                    ?><tr>
                                        <td><?php echo $object->id ?></td>
                                        <td><?php echo $object->amount ?></td>
                                        <td><?php echo $object->bgroup ?></td>
                                        <td><?php echo $object->name ?></td>
                                        <td><?php echo $object->location ?></td>
                                        <td><?php echo $object->contact ?></td>
                                        <td><?php echo $object->email ?></td>
                                        <td><?php
                                        if($object->status==0)
                                        {
                                          echo "Pending";
                                        }
                                        else if($object->status==1)
                                        {
                                          echo "Approved";
                                        }
                                        else
                                        {
                                          echo "Cancelled";
                                        }
                                        ?></td>
                                        <?php             
                                                    }
                                  }
                                    else {
                                    echo "<h2>No request have been placed </h2>";
                                    }
                                    ?>
                </tbody>
                
              </table>
</div></div>
  </div></div></div>
    </section>



  </main>
    
      
        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>We expect your loyal feedback to improve our standard.<br>For more details and any subject related queries..</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary btn-block" href="contact.php"><i class="fa fa-phone"></i> Call to Action</a>
                </div>
            </div>
        </div>
    
    <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <img src='' width="100%" height="100%" id='ModalImg'>
    </div>
  </div>
</div>

        <hr>

        <!-- Footer -->
    <?php include"footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
  
  $(".img-portfolio").click(function(){
    var a=$(this).attr("src");
    $("#ModalImg").attr("src",a);
       $('#myModal').modal();
    })
    </script>

<?php include "footer.php";?>
</body>

</html>
