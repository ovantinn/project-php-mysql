<?php 
    include('sidebar.php');
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
                                        <input required type="text" class="form-control" name="tittle">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-select" name="category">
                                            <option value="Sport">Sport</option>
                                            <option value="Social">Social</option>
                                            <option value="Entertainment">Entertainment</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-select" name="type">
                                            <option value="National">National</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Banner :  <span style="color: red;">Recommend Size 350 x 200</span></label>
                                        <input required type="file" class="form-control" name="banner">
                                    </div>
                                    <div class="form-group">
                                        <label>Thumnail : <span style="color: red;">Recommend Size 730 x 415</span></label>
                                        <input required type="file" class="form-control" name="thumnail">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="btn-add-news" class="btn btn-primary">Submit</button>
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