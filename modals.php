<!-- The Modal -->
<div class="modal" id="user_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="config/code.php" method="POST">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">User Name</label>
                                <input type="text" name="uname" id="uname" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">User Password</label>
                                <input type="text" name="upass" id="upass" class="form-control inputs">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control inputs">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" width="70px" height="70px" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="button" name="update_user" id="sample" value="1" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>