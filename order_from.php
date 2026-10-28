<?php
session_start();
include("header.php");
include("connect.php");
?>
<script>
        function validation()
        {
       
         if(form1.txtadd.value=="")
        {
            alert("Please Enter Your Delivery Address");
            form1.txtadd.focus();
            return false;
        }
        
         var v = /^[0-9]{10,10}$/
        if(form1.txtmno.value=="")
        {
            alert("Please Enter Your Mobile No");
            form1.txtmno.focus();
            return false;
        }else if(form1.txtmno.value.length!=10)
        {
             alert("Please Enter Your Mobile No 10 digit long");
            form1.txtmno.focus();
            return false;
        }
        else{
              if(!v.test(form1.txtmno.value))
              {
                alert("Please Enter Only digit in Your Mobile No");
                form1.txtmno.focus();
                return false;
              }
        }
        
        }
</script>
<?php
if(isset($_POST['btnorder']))
    {
       $cartid = $_SESSION["cartid"];
       $regisid = $_SESSION["custid"]; 
       $odate = date("Y-m-d");
        $add = $_POST["txtadd"];
       
        $mno = $_POST["txtmno"];
       

        $res1 = mysqli_query($con,"select sum(qty*price) from cart_detail where cart_id='$cartid'");
        $r1=mysqli_fetch_array($res1);
        $amt = $r1[0];


            $res2 = mysqli_query($con,"select max(order_id) from order_detail");
            $oid=0;
            while($r2=mysqli_fetch_array($res2))
            {
                $oid=$r2[0];
            }
            $oid++;

            $query = "insert into order_detail values('$oid','$odate','$cartid','$regisid','$add','$mno','$amt')";
            if(mysqli_query($con,$query))
            {
                unset($_SESSION["cartid"]);
                 echo"<script>";
                 echo"alert('Order placed Successfully');";
                 echo"window.location.href='cust_view_orders.php';";
                 echo"</script>";
            }else{
                echo"Error In Order: ".mysqli_error($con);
            }
        
    }
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>ORDER FORM</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <img src="assets/img/regis2.gif" style="width: 100%;"/>
            </div>
            <div class="col-md-6">
                <form method="post" name="form1">
                   
                         <div class="form-group">
                            <label for="exampleFormControlTextarea1">Enter Delievery Address</label>
                            <textarea class="form-control"name="txtadd" placeholder="enter Delievery Address" rows="3"></textarea>
                        </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Enter Mobile No</label>
                        <input type="text" class="form-control"  name="txtmno" placeholder="Enter Mobile no">
                        
                    </div>
                   
                    
                    <button type="submit" class="btn btn-success" name="btnorder"onclick="return validation();">PLACE YOUR ORDER</button>
                </form>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
