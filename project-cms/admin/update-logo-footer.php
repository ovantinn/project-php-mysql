<?php 
    include('sidebar.php');
    $id  = $_GET['id'];
    $rs  = Connection()->query("SELECT * FROM `tbl_logo_footer` ORDER BY `id`='$id'");
    $row = mysqli_fetch_assoc($rs);
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Sport News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select" name="status_footer">
                                            <option value="All" <?php if($row['status'] == "All") echo"selected";?>>All</option>
                                            <option value="First" <?php if($row['status'] == "First") echo"selected";?>>First</option>
                                            <option value="Second" <?php if($row['status'] == "Second") echo"selected";?>>Second</option>
                                            <option value="Third" <?php if($row['status'] == "Third") echo"selected";?>>Third</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>File</label>
                                        <input type="file" name="logo" id="thumnail" class="form-control">
                                        <input type="hidden" name="old_logo" id="" value="<?php echo $row['logo']; ?>">
                                        <img src="./assets/Footer/<?php echo $row['logo']; ?>" width="80px" height="80px" alt="">
                                    </div>
                                   
                                    <div class="form-group">
                                        <button type="submit" name="update-logo-footer" class="btn btn-primary" name="logo">Submit</button>
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
        $("thumnail").change(function(){
            $(img).hide();
        })
    });
</script>
</html>