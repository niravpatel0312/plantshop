<?php
session_start();
include("header.php");
include("connect.php");

$pid=$_REQUEST['pid'];
$res1=mysqli_query($con,"select * from plant_detail where plant_id='$pid'");
$r1=mysqli_fetch_array($res1);

$name=$r1[1];
$catid=$r1[2];
$desc=$r1[3];
$price=$r1[4];
$pimg1=$r1[5];
$sid=$r1[6];
?>
<script>
    function validation()
    {
        var v = /^[0-9]{1,3}$/
        if(form.txtqty.value=="")
        {
            alert("Please Enter Quantity");
            form1.txtqty.focus();
            return false;
        }else if(parseInt(form1.txtqty.value)<=0)
        {
            alert("Please Enter Quantity Grether than 0");
            form1.txtqty.focus();
            return false;
        }else if(!v.test(form1.txtqty.value))
        {
             alert("Please Enter only Digit in Quantity");
            form1.txtqty.focus();
            return false;
        }
    }
</script>
<?php
if(isset($_POST["btnadd"]))
{
    $qty = $_POST["txtqty"];
    if(isset($_SESSION["cartid"]))
    {
                $cid = $_SESSION["cartid"];
                $query2="insert into cart_detail values ('$cid','$pid','$qty','$price')";
                if(mysqli_query($con,$query2))
                {
                 echo"<script>";
                 echo"alert('Plant Added Into cart Successfully');";
                 echo"window.location.href='plants.php';";
                 echo"</script>";
                }
    }else{
            $res2 = mysqli_query($con,"select max(cart_id) from cart_master");
            $sid=0;
            while($r2=mysqli_fetch_array($res2))
            {
                $cid=$r2[0];
            }
            $cid++;
            $tdate = date("Y-m-d");
            $query = "insert into cart_master values('$cid','$tdate')";
            if(mysqli_query($con,$query))
            {
                $query2="insert into cart_detail values('$cid','$pid','$qty','$price')";
                if(mysqli_query($con,$query2))
                {
                    $_SESSION["cartid"] = $cid;
                    echo"<script>";
                    echo"alert('Plant Added Into cart Successfully');";
                    echo"window.location.href='plants.php';";
                    echo"</script>";
                }
            }else{
                echo"Error In Regisration: ".mysqli_error($con);
            }
        
    }
}
?>
<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>PLANT DETAIL</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <img src="<?php echo $pimg1; ?>" style="width: 100%;"/>
            </div>
            <div class="col-md-6">
                <form method="post" name="form1">
                 <div class="form-group">
                   
                    <h4>Plant Name: <?php echo $name; ?></h4>
                </div>
                
                 
             
                 <div class="form-group">
                   
                    <h4>Description: <?php echo $desc; ?></h4>
                </div>
                
                 <div class="form-group">
                   
                    <h4>Price:&#8377 <?php echo $price; ?> </h4>
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Quantity</label>
                        <input type="number" class="form-control"  name="txtqty" placeholder="Enter Quantity">
                        
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="btnadd" onclick="return validation();">ADD TO CART</button>
                </form>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
