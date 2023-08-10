
<?php include('partials-front/menu.php'); ?>

<!-- book sEARCH Section Starts Here -->
<section class="book-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>book-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Book.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- book sEARCH Section Ends Here -->



<!-- book MEnu Section Starts Here -->
<section class="book-menu">
    <div class="container">
        <h2 class="text-center">Library Catlog </h2>

        <?php 
            //Display Foods that are Active
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the foods are availalable or not
            if($count>0)
            {
                //Books Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <div class="book-menu-box">
                        <div class="book-menu-img">
                            <?php 
                                //CHeck whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/book/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        <div class="book-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="book-price">$<?php echo $price; ?></p>
                            <p class="book-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?book_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Book not Available
                echo "<div class='error'>Book not found.</div>";
            }
        ?>

        

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- book Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>