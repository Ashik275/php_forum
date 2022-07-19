<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to your account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-info">

                <div class="container">
                    <h1 class="text-center">Please Login to your account</h1>
                    <div class="d-flex justify-content-center container">
                        <form action="/forum/common/_handleLogin.php" method="post">
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">User Name</label>
                                <input type="text" class="form-control " id="loginEmail" name="loginemail"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="loginPass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="loginPass" name="loginpass">
                            </div>


                            <button type="submit" class="btn btn-primary">Login</button>


                    </div>



                    <p class="text-center">Do you have an acccount??<b>Please Sign up</b></p>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>