<?php
session_start();
include("admin_header.php");
include("connect.php");
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>VIEW CUSTOMER DETAIL REPORTS</h1>
            </div>
        </div>

        <div class="row mt-5">
           
            
             <div class="col-md-12">
                <?php
                
                $res3=mysqli_query($con,"select * from cust_regis");
                if(mysqli_num_rows($res3)>0){
                    echo"<table class='table table-bordered'>
                        <tr>
                            <th>CUSTOMER ID</th>
                            <th>CUSTOMER NAME</th>  
                            <th>ADDRESS</th>
                            <th>CITY</th>  
                            <th>MOBILE NO</th>                                                                       
                            <th>EMAIL_ID</th>
                           
                        </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                          
                            echo "<td>$r3[0]</td>";
                            echo "<td>$r3[1]</td>";
                            echo "<td>$r3[2]</td>";
                            echo "<td>$r3[3]</td>";
                            echo "<td>$r3[4]</td>"; 
                            echo "<td>$r3[5]</td>";
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
