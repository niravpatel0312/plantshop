<?php
session_start();
include("admin_header.php");
include("connect.php");


?>



<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>VIEW ORDER DETAIL</h1>
            </div>
        </div>

        <div class="row mt-5">
           
            
             <div class="col-md-12">
                <?php
                $cartid = $_REQUEST["cid"];
                $tot=0;
                $res3=mysqli_query($con,"select * from cart_detail where cart_id='$cartid'");
                if(mysqli_num_rows($res3)>0){
                    echo"<table class='table table-border'>
                        <tr>
                            <th>PLANT IMAGE</th>
                            <th>PLANT NAME</th>
                            <th>QUANTITY</th>  
                            
                            <th>PRICE</th> 
                            <th>AMOUNT</th                                                                       
                           
                        </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo"<tr>";
                            $res5=mysqli_query($con,"select * from plant_detail where plant_id='$r3[1]'");
                            $r5=mysqli_fetch_array($res5);  
                            echo"<td><img src='$r5[5]' style='width: 150px; height: 150px;'></td>";
                            echo"<td>$r5[1]</td>";
                            echo"<td>$r3[2]</td>";
                           
                            echo"<td>&#8377; $r3[3] /-</td>";
                            $amt = $r3[2] * $r3[3];
                            $tot = $tot + $amt;
                            echo " <td>&#8377; $amt /-</td>";
                            
                            
                            echo"</tr>";
                        }
                        echo"</table>";
                        echo"<h2> Total Amount = &#8377; $tot /-</h2>";
                       

                }else{
                    echo"<h2>No Plant  Found In Cart</h2>";
                }
                ?>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
