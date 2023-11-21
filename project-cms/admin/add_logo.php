<?php 
    include('sidebar.php');
    // include('function.php');
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
                                        <select class="form-select" name="status">
                                            <option value="All">All</option>
                                            <option value="Header">Header</option>
                                            <option value="footer">Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>File</label>
                                        <input type="file" name="thumnail" class="form-control">
                                    </div>
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="logo">Submit</button>        
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