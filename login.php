<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST["btnlogin"]))
{
    $email = $_POST["txtemail"];
    $pwd = $_POST["txtpwd"];

    $res1 = mysqli_query($con,"select * from admin_detail where email_id='$email' and pwd='$pwd'");
    if(mysqli_num_rows($res1)>0)
    {
        echo"<script>";
        echo"alert('Admin Login Successfully');";
        echo"window.location.href='admin_manage_category.php';";
        echo"</script>";
    }else{
       $res2 = mysqli_query($con,"select * from supplier_regis where email_id='$email' and pwd='$pwd'");
        if(mysqli_num_rows($res2)>0)
        {
            $r2=mysqli_fetch_array($res2);
            $_SESSION["suppid"] =$r2[0];
            echo"<script>";
            echo"alert('supplier Login Successfully');";
            echo"window.location.href='supplier_manage_plants.php';";
            echo"</script>";
        }else{
             $res3 = mysqli_query($con,"select * from cust_regis where email_id='$email' and pwd='$pwd'");
            if(mysqli_num_rows($res3)>0)
            {
                $r3=mysqli_fetch_array($res3);
                $_SESSION["custid"] = $r3[0];
                if(isset($_SESSION["ord"]))
                {
                    unset($_SESSION["ord"]);
                    echo"<script>";
                    echo"alert('Customer Login Successfully');";
                    echo"window.location.href='order_from.php';";
                    echo"</script>";
                }else{
                     echo"<script>";
                    echo"alert('Customer Login Successfully');";
                    echo"window.location.href='plants.php';";
                    echo"</script>";
                
                }
            }else{
                echo"<script>";
                echo"alert('Check Your Email Id or Password');";
                echo"window.location.href='login.php';";
                echo"</script>";
            }
        }
    }
        
}
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>LOGIN</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <img src="assets/img/log1.gif" style="width: 100%;"/>
            </div>
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Email ID</label>
                        <input type="text" class="form-control"  name="txtemail" placeholder="Enter email">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="txtpwd" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="btnlogin">LOGIN</button>
                </form>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
