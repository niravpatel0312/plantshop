<?php
include("header.php");
include("connect.php");
?>
<script>
        function validation()
        {
        var v = /^[a-zA-Z ]{2,50}$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Your Name");
            form1.txtname.focus();
            return false;
        }else{
              if(!v.test(form1.txtname.value))
              {
                alert("Please Enter Only Characters in Your Name");
                form1.txtname.focus();
                return false;
              }
        }
         if(form1.txtadd.value=="")
        {
            alert("Please Enter Your Address");
            form1.txtadd.focus();
            return false;
        }
         if(form1.txtcity.value=="")
        {
            alert("Please Enter Your City");
            form1.txtcity.focus();
            return false;
        }else{
              if(!v.test(form1.txtcity.value))
              {
                alert("Please Enter Only Characters in Your city Name");
                form1.txtcity.focus();
                return false;
              }
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
        var v = /^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
        if(form1.txtemail.value=="")
        {
            alert("Please Enter Your Email Id");
            form1.txtemail.focus();
            return false;
        }else{
              if(!v.test(form1.txtemail.value))
              {
                alert("Please Enter  Valid Email Id");
                form1.txtemail.focus();
                return false;
              }
        }
        if(form1.txtpwd.value=="")
        {
            alert("Please Enter Your Password");
            form1.txtpwd.focus();
            return false;
        }else if(form1.txtpwd.value.length<6)
        {
             alert("Please Enter Your Password More than 6 Characters");
            form1.txtpwd.focus();
            return false;
        }else if(form1.txtpwd.value.length>10)
        {
             alert("Please Enter Your Password Less than 10 Characters");
            form1.txtpwd.focus();
            return false;
        }
        }
</script>
<?php
if(isset($_POST['btnregis']))
    {
        $name = $_POST["txtname"];
        $add = $_POST["txtadd"];
        $city = $_POSTt["txtcity"];
        $mno = $_POST["txtmno"];
        $email = $_POST["txtemail"];
        $pwd = $_POST["txtpwd"];


        $res1 = mysqli_query($con,"select * from supplier_regis where email_id='$email'");
        if(mysqli_num_rows($res1)>0)
        {
            echo"<script>";
            echo"alert('Email Id Already Exits');";
            echo"window.location.href='supplier_regis.php';";
            echo"</script>";
        }else{
            $res2 = mysqli_query($con,"select max(supplier_id) from supplier_regis");
            $sid=0;
            while($r2=mysqli_fetch_array($res2))
            {
                $sid=$r2[0];
            }
            $sid++;

            $query = "insert into supplier_regis values('$sid','$name','$add','$city','$mno','$email','$pwd')";
            if(mysqli_query($con,$query))
            {
                 echo"<script>";
                 echo"alert('Supplier Registration Successfully');";
                 echo"window.location.href='login.php';";
                 echo"</script>";
            }else{
                echo"Error In Regisration: ".mysqli_error($con);
            }
        }
    }
?>
<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>SUPPLIER REGISTRATION FORM</h1>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <img src="assets/img/regis1.gif" style="width: 100%;"/>
            </div>
            <div class="col-md-6">
                <form method="post" name="form1">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Name</label>
                        <input type="text" class="form-control"  name="txtname" placeholder="Enter Name">
                        
                    </div>
                         <div class="form-group">
                            <label for="exampleFormControlTextarea1">Enter Address</label>
                            <textarea class="form-control"name="txtadd" placeholder="enter Address" rows="3"></textarea>
                        </div>

                         <div class="form-group">
                        <label for="exampleInputEmail1">Enter city</label>
                        <input type="text" class="form-control"  name="txtcity" placeholder="Enter city">
                        
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Enter Mobile No</label>
                        <input type="text" class="form-control"  name="txtmno" placeholder="Enter Mobile no">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Email ID</label>
                        <input type="text" class="form-control"  name="txtemail" placeholder="Enter email">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="txtpwd" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="btnregis" onclick="return validation();">REGISTR</button>
                </form>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
