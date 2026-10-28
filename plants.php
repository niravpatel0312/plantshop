<?php
include("header.php");
include("connect.php");
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-success">
                <h2>Plants</h2>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <h2>CATEGORY</h2>
                <ul>
                <?php
                $res1=mysqli_query($con,"select * from plant_category");
                while($r1=mysqli_fetch_array($res1))
                {
                    ?>
                    <li class="pt-3"><h3><a href="plants.php?cid=<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?></h3></li>
                    <?php
                }
                ?>
                </ul>
            </div>
            <div class="col-md-8">

          <div class="row">
            <?php
            if(isset($_REQUEST['cid']))
            {
                $cid=$_REQUEST['cid'];
                  $query="select * from plant_detail where cat_id='$cid'";
            }else{
                  $query="select * from plant_detail";
            }
            //$query="select * from plant_detail";
            $res2=mysqli_query($con,$query);
            if(mysqli_num_rows($res2)>0){
                while($r2=mysqli_fetch_array($res2))
                {
                    ?>
                    <div class="col-md-6 mt-3">
                    <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="<?php echo $r2[5]; ?>" style="width:350px; height:280px;" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $r2[1]; ?> </h5>
                                <p class="card-text">Price: &#877; <?php echo $r2[4];?>/-</p>
                                <a href="plant_detail.php?pid=<?php echo $r2[0]; ?>" class="btn btn-success">ADD TO CART</a>
                            </div>
                            </div>
                    </div>
                    <?php
                }
            }else{
                echo "<h2> No Plant Detail Found";
            }
            ?>

            </div>

            </div>

        </div>
</div>

<?php
include("footer.php");
?>
