<?php
session_start();
include("supplier_header.php");
include("connect.php");
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>VIEW NEW ORDER</h1>
            </div>
        </div>

        <div class="row mt-5">
           
            
             <div class="col-md-12">
                <?php
                $regis_id=$_SESSION["custid"];
                $tot=0;
                
                $res3=mysqli_query($con,"select * from order_detail where cart_id in (select cart_id from cart_detail where plant_id in(select plant_id from plant_detail where supplier_id='1'))and order_id not in(select order_id from bill_detail)");
                if(mysqli_num_rows($res3)>0){
                    echo"<table class='table table-bordered'>
                        <tr>
                            <th>ORDER ID</th>
                            <th>ORDER DATE</th>
                            <th>CART ID</th>  
                            <th>DELEVIRY ADDRESS</th> 
                            <th>DELEVIRY MOBILE NO</th>                                                                       
                            <th>AMOUNT</th>
                            <th>VIEW ORDER DETAIL</th>
                        </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                          
                            echo "<td>$r3[0]</td>";
                            echo "<td>$r3[1]</td>";
                            echo "<td>$r3[2]</td>";
                            
                            echo "<td>$r3[4]</td>"; 
                            echo "<td>$r3[5]</td>";
                            echo "<td>&#8377; $r3[6] /-</td>";
                            echo "<td><a href='supplier_view_order_detail.php?cid=$r3[2]'>VIEW ORDER DETAIL</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                }else{
                    echo "<h2>No Order Found</h2>";
                }
                ?>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
