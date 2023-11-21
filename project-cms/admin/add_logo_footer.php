<?php 
    include('sidebar.php');
    // include('function.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Footer Logo</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label>URL LOGO</label>
                                        <input type="text" name="url_logo" class="form-control">
                                    </div>

                                    <div class="form-group" >
                                        <label>Choose Logo</label>
                                        <input type="file" name="footer_logo" class="form-control">
                                    </div>
                                   
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="logo-footer">Submit</button>        
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