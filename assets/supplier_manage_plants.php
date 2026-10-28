<?php
session_start();
include("supplier_header.php");
include("connect.php");
?>
<script>
        function validation()
        {
        var v = /^[a-zA-Z ]{2,50}$/
        if(form1.txtname.value=="")
        {
            alert("Please Enter Plant Name");
            form1.txtcat.focus();
            return false;
        }else{
              if(!v.test(form1.txtname.value))
              {
                alert("Please Enter Only Characters in Plant Name");
                form1.txtcat.focus();
                return false;
              }
        }
         if(form1.txtdesc.value=="")
        {
            alert("Please Enter Plant Description");
            form1.txtdesc.focus();
            return false;
        }
        if(form1.selcat.value == "0")
        {
             alert("Please Select Category");
            form1.selcats.focus();
            return false;
            
        }
         var v = /^[0-9]{1,5}$/
        if(form1.textprice.value=="")
         {
             alert("Please Enter Price");
            form1.txtprice.focus();
            return false;
            
        }elseif(parseInt(form1.textprice.value)<=0){
              alert("Please Enter Price grether than 0");
            form1.txtprice.focus();
            return false;
        }else if(!v.test(form1.textprice.value)){
              alert("Please Enter Only Digit in Price");
            form1.txtprice.focus();
            return false;
        }
         if (document.get.ElementById("txtimg").value==""){
             alert("please select plant Image");
             returnfalse;

         }
            
        }
</script>
<?php
if(isset($_POST['btnsave']))
    {
         $name = $_POST["txtname"];
         $catid = $_POST["selcat"];
         $desc = $_POST["txtdesc"];
        $price = $_POST["txtprice"];
           
           $tpath=$_FILES["txtimg"]["tmp_name"];
           $ipath="plant_img/".time().".png";
           $sid=$_SESSION["suppid"];
        

            $res2 = mysqli_query($con,"select max(plant_id) from plant_category");
            $pid=0;
            while($r2=mysqli_fetch_array($res2))
            {
                $pid=$r2[0];
            }
            $pid++;

            $query = "insert into plant_category values('$pid','$name','$catid','$desc''$price''$ipath''$sid')";
            if(mysqli_query($con,$query))
            {
                move_uploaded_file($tpath,$ipath);
                 echo"<script>";
                 echo"alert('Plant Detali Save Successfully');";
                 echo"window.location.href='supplier_manage_plants.php';";
                 echo"</script>";
            }else{
                echo"Error In Insertion: ".mysqli_error($con);
            }
        
    }
    if(isset($_REQUEST['dcid']))
    {
        $cid1=$_REQUEST['dcid'];
        $query = "delete from plant_category where cat_id='$cid1'";
            if(mysqli_query($con,$query))
            {
                 echo"<script>";
                 echo"alert('Category Deleted Successfully');";
                 echo"window.location.href='admin_manage_category.php';";
                 echo"</script>";
            }else{
                echo"Error In Deletion: ".mysqli_error($con);
            }

    }

    if(isset($_REQUEST['ecid']))
    {
        $cid1=$_REQUEST['ecid'];
        $res5=mysqli_query($con,"select * from plant_category where cat_id='$cid1'");
        $r5=mysqli_fetch_array($res5);
        $cat1 = $r5[1];
    }

    
    if(isset($_POST['btnupdate']))
    {
        $cat = $_POST["txtcat"];
        $cid = $_REQUEST['ecid'];

           
            $query = "update plant_category set category='$cat' where cat_id='$cid'";
            if(mysqli_query($con,$query))
            {
                 echo"<script>";
                 echo"alert('Category Updated Successfully');";
                 echo"window.location.href='admin_manage_category.php';";
                 echo"</script>";
            }else{
                echo"Error In Updation  : ".mysqli_error($con);
            }
        
    }
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h1>MANAGE PLANTS</h1>
            </div>
        </div>

        <div class="row mt-5">
           
            <div class="col-md-6"
                <form method="post" name="form1" enctype="multipart/from-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Plant Name</label>
                        <input type="text" class="form-control"  name="txtname" placeholder="Enter Plant Name" value="<?php echo $name1; ?>">
                        
                    </div>
                         

                     <div class="form-group">
                        <label for="exampleInputEmail1">Enter Description</label>
                        <textarea class="form-control"  name="txtdesc" placeholder="Enter Description"><?php echo $desc1;?></textarea>
                        
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Select Category</label>
                        <select class="form-control"  name="selcats" >
                            <option value="0">Select Category</option>
                            <?php
                                $res6=mysqli_query($con,"select * from plant_category");
                                while($r6=mysqli_fetch_array($res6))
                                {
                                    ?>
                                        <option value="<?php echo $6[0]; ?>"><?php echo $r6[1]; ?></option>

                                    <?php
                                    
                                }
                                mysqli_error($con);
                            ?>
                        </select>    
                        
                        
                        </div>
                         <div class="form-group">
                        <label for="exampleInputEmail1">Enter Price</label>
                        <input type="text" class="form-control"  name="txtprice" placeholder="Enter Price" value="<?php echo $price1; ?>">
                        
                    </div>

                     <div class="form-group">
                        <label for="exampleInputEmail1">Select Plant Image</label>
                        <input type="file" class="form-control"  name="txtimg" id="txtimg">
                        
                    </div>

                     <?php
                     if(isset($_REQUEST['ecid']))
                    {
                         ?>
                          <button type="submit" class="btn btn-success" name="btnupdate"onclick="return validation();">UPDATE</button>
                        <?php
                    }else{
                         ?>
                            <button type="submit" class="btn btn-success" name="btnsave"onclick="return validation();">SAVE</button>
                        <?php
                    }
                     ?>
                   
                </form>
            </div>
             <div class="col-md-12">
                <?php
                $suppid = $_SESSION["suppid"];
                $res3=mysqli_query($con,"select * from plant_detail where supplier_id='$suppid'");
                if(mysqli_num_rows($res3)>0){
                    echo"<table class='table table-border'>
                        <tr>
                            <th>PLANT ID</th>
                            <th>PLANT NAME</th> 
                            <th>CATEGORY</th>  
                            <th>DESCRIPTION</th> 
                            <th>PRICE</th> 
                            <th>PLANT IMAGE</th>                                                                          
                            <th>EDIT </th>
                            <th>DELETE </th>
                        </tr>";
                        while($r3=mysqli_fetch_array($res3))
                        {
                            echo"<tr>";
                            echo"<td>$r3[0]</td>";
                            echo"<td>$r3[1]</td>";
                            echo"<td>$r3[2]</td>";
                            echo"<td>$r3[3]</td>";
                            echo"<td>$r3[4]</td>";
                             echo"<td>$r3[5]</td>";
                            echo"<td><a href='supplier_manage_plants.php?efid=$r3[0]'>EDIT</a></td>";
                            echo"<td><a href='supplier_manage_plants.php?dfid=$r3[0]'>DELETE</a></td>";
                            echo"</tr>";
                        }
                        echo"</table>";

                }else{
                    echo"<h2>No Category Found</h2>";
                }
                ?>
            </div>

        </div>
</div>

<?php
include("footer.php");
?>
