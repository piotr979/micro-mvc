<?php
require 'components/header.php';

use App\Models\Authorisation;
use App\Views\LoginFormBuilder;


//$errors = ['empty'];
?>
<div class="container-sm">
    <h3 class="text-center py-4">Login</h3>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <?php if (isset($params['errors'])) {
                foreach ($params['errors'] as $error) {
                    echo $error;
                }
            }
            ?>
            <?php LoginFormBuilder::begin('post',''); ?>

                <div class="mb-3">
                <p class="text-danger">
                <?= Authorisation::$wrongCredentials ? "Wrong credentials" : ''; ?>
        </p>
                    <label for="email" class="form-label">Email address</label>
                    <?php LoginFormBuilder::inputField('text', 'email', ''); ?>
                    <p class="text-danger">
                    <?= Authorisation::$emailError ? "Please enter valid email" : ''; ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <?php LoginFormBuilder::inputField('password', 'password', ''); ?>
                    <p class="text-danger">
                    <?= Authorisation::$passwordError ? "Wrong password" : ''; ?>
                    </p>
                </div>

                <button class="btn btn-primary">Login</button>
                <?php LoginFormBuilder::end(); ?>
        </div>
    </div>
</div>

<?php
require 'components/footer.php';
?>