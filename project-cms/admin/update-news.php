<?php 
    include('sidebar.php');
    $id = $_GET['id'];
    $rs = Connection()->query("SELECT * FROM `tbl_news` WHERE `id` = '$id'");
    $row = mysqli_fetch_assoc($rs);
    
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="tittle" value="<?php echo $row['title']?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-select" name="category">
                                            <option value="Sport" <?php if($row['cage'] == "Sport") echo"selected"?>>Sport</option>
                                            <option value="Social" <?php if($row['cage'] == "Social") echo"selected"?>>Social</option>
                                            <option value="Entertainment" <?php if($row['cage'] == "Entertainment") echo"selected"?>>Entertainment</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-select" name="type">
                                            <option value="National" <?php if($row['news_type'] == "National") echo"selected"?>>National</option>
                                            <option value="International" <?php if($row['news_type'] == "International") echo"selected"?>>International</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Banner :  <span style="color: red;">Recommend Size 350 x 200</span></label>
                                        <input type="file" class="form-control" name="banner">
                                        <input type="hidden" name="old_banner" value="<?php echo $row['banner'] ?>" id="">
                                        <img src="./assets/News_img/<?php echo $row['banner'] ?>" id="img-banner" class="picture">
                                    </div>

                                    <div class="form-group">
                                        <label>Thumnail : <span style="color: red;">Recommend Size 730 x 415</span></label>
                                        <input type="hidden" name="old_thumnail" value="<?php echo $row['thumnail'] ?>" id="">
                                        <input type="file" class="form-control" name="thumnail">
                                        <img src="./assets/News_img/<?php echo $row['thumnail'] ?>" id="img-thumnail" class="picture">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description">
                                        <?php echo $row['description']?>
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="btn-update-news" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
</body>
<script>
    $(document).ready(function(){
        $('thumnail').change(function(){
            $('#img-thumnail').hide();
        });
        $('banner').change(function(){
            $('#img-thumnail').hide();
        });
    });
</script>
</html>