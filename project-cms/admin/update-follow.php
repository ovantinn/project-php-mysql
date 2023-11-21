<?php 
    include('sidebar.php');
    $id  = $_GET['id'];
    $rs  = Connection()->query("SELECT * FROM `tbl_followus` WHERE `id`='$id' ");
    $row = mysqli_fetch_assoc($rs);
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Follow</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="follow_name" value="<?php echo $row['status'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control" name="url_name" value="<?php echo $row['url'] ?>">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Profile :  <span style="color: red;">Recommend Size 40 x 40</span></label>
                                        <input type="text" name="old_profile" value="<?php echo $row['thumnail'] ?>">
                                        <input type="file" class="form-control" name="profile_update" >
                                        <img src="../admin/assets/Follow/<?php echo $row['thumnail'] ?>" class="pic">
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" name="btn-update-follow" class="btn btn-primary">Submit</button>
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
</html>