<?php 
include('header.php'); 

?>
<main class="news-detail">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <?php getnewsDetails(); ?>
                </div>
                <div class="col-4">
                    <div class="relate-news">
                        <h3 class="main-title">Related News</h3>
                        <?php 
                        $id  = $_GET['id'];
                        $sql = "SELECT `cage` FROM `tbl_news` WHERE `id` = '$id'";
                        $rs = connec()->query($sql);
                        $row = mysqli_fetch_assoc($rs);
                        $category =  $row['cage'];
                        Related_News($category,$id);
                        ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>