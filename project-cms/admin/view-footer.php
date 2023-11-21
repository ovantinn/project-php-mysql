<?php 
    include('sidebar.php');
    
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
                                        <tr>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php getFooter(); ?>
                                    </table>
                                 
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="remove-id" class="value_remove">
                                                        <button type="submit" name="delete-id" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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