<?php
require 'components/header.php';
?>
<div class="container-sm">
    <h3 class="text-center py-4">New task</h3>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <form method="POST" action="">

                <div class="mb-3">
                    <label for="task" class="form-label">Task description</label>
                    <input type="text" class="form-control" 
                    id="exampleInputEmail1" aria-describedby="emailHelp"
                     value="<?php if ($params["content"]) {
                      echo $params['content']; } ?>">
                </div>
                <button class="btn btn-primary">Save task</button>
            </form>
        </div>
    </div>
</div>

<?php
require 'components/footer.php';
?>