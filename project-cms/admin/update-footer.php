<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap-grid.min.css" integrity="sha512-ZuRTqfQ3jNAKvJskDAU/hxbX1w25g41bANOVd1Co6GahIe2XjM6uVZ9dh0Nt3KFCOA061amfF2VeL60aJXdwwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../admin/assets/style/pic.css">
<?php 
    include('sidebar.php');
    $id  = $_GET['id'];
    $rs  = Connection()->query("SELECT * FROM `tbl_aboutus` WHERE `id`='$id' ");
    $row = mysqli_fetch_assoc($rs);
?>
                <div class="col-10">
                    
                    <div class="content-right">
                        <div class="top">
                            <h3>All Footer News</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                 
                                    <table class="table align-middle" border="1px">
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea style="width: 100%; height:revert;
                                            " class="form-control" name="description">
                                            <?php echo $row['description']?>
                                            </textarea>
                                        </div>
                                       
                                    </table>
                                 
                                    <div class="form-group">
                                        <button type="submit" name="btn-update-footer" class="btn btn-primary">Submit</button>
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