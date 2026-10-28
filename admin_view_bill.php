<?php
session_start();
include("admin_header.php");
include("connect.php");

$oid = $_REQUEST["oid"];
$res1 = mysqli_query($con,"select * from order_detail where order_id='$oid'");
$r1 = mysqli_fetch_array($res1);
$oid = $r1[0];
$odate = $r1[1];
$cartid = $r1[2];
?>
<div class="container">
     
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr align="center">
                    <th colspan="2" >
                        <h2>PLANT SHOP</h2>
                    </th>
                </tr>
                <tr>
                    <td><h4>Bill Id: <?php echo $oid; ?></h4>
                    <h4>Bill Date: <?php echo $odate; ?></h4></td>
                </tr>
            </table>
            <?php
                
                $tot=0;
                $res3=mysqli_query($con,"select * from cart_detail where cart_id='$cartid'");
                if(mysqli_num_rows($res3)>0){
                    echo"<table class='table table-bordered'>
                        <tr>
                            <th>PLANT IMAGE</th>
                            <th>PLANT NAME</th>
                            <th>QUANTITY</th>  
                            
                            <th>PRICE</th> 
                            <th>AMOUNT</th>                                                                       
                            <th>EDIT </th>
                            <th>DELETE </th>
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
                            
                            echo"<td><a href='update_cart_qty.php?pid=$r3[1]&oqty=$r3[2]'>EDIT</a></td>";
                            echo"<td><a href='view_cart.php?dpid=$r3[1]'>DELETE</a></td>";
                            echo"</tr>";
                        }
                        echo"</table>";
                        echo"<h2> Total Amount = &#8377; $tot /-</h2>";
                        

                }else{
                    echo"<h2>No Plant  Found In Cart</h2>";
                }
                ?>
            <button onClick="window.print();" class="btn btn-success">PRINT BILL</button>
        </div>
    </div>
</div>