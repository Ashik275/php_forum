<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign up to create an account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container mt-3 border border-success rounded">
                    <h1 class="text-center">Please Sign Up</h1>
                    <div class="d-flex justify-content-center ">
                        <form action="/forum/common/_handleSignup.php" method="post">
                            <div class="mb-3">
                                <label for="user_email" class="form-label">User Name</label>

                                <input type="text" class="form-control " id="signupEmail" name="signupEmail"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="signupCpassword" name="signupCpassword">
                            </div>

                            <p class='text-center'>
                                <button type="submit" class="btn btn-primary">SignUp</button>

                            </p>
                        </form>

                    </div>



                    <p class="text-center">Already have an account??<b>Please Login</b>
                    </p>
                </div>


            </div>
        </div>

    </div>
</div>
</div>