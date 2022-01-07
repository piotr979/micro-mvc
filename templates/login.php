<?php
require 'components/header.php';
?>
<div class="container-sm">
    <h3 class="text-center py-4">Login</h3>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <form method="POST" action="">

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"
                    id="password" aria-describedby="password">
                </div>

                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php
require 'components/footer.php';
?>