<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Follow</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="follow_name">
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" class="form-control" name="url_name">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Profile :  <span style="color: red;">Recommend Size 40 x 40</span></label>
                                        <input type="file" class="form-control" name="profile">
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" name="btn-add-follow" class="btn btn-primary">Submit</button>
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