<?php

require 'components/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Done?</th>
            <th scope="col">Operations</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($data as $task) : ?>
            <tr class="tr-row" data-id="<?= $task->getId(); ?>">
                <th scope="row"><?= $task->getId(); ?></th>
                <td><?= $task->getTaskText() ?></td>
                <td>
                <?php if ($task->getIsDone() ): ?>
                    <input class="done-input" type="checkbox" checked=checked>
                </td>
                <?php else: ?>
                    <input class="done-input" type="checkbox" checked=checked>
                    <?php endif; ?>

                <td>
                    <button class="delete-button btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
</div>
</div>
<div class="row">
    <div class="col">
        <div class="text-center">
         <a class="btn btn-primary" href="/form">Add new</a>
        </div>
    </div>
</div>
</div>

<script src="assets/js/custom.js"></script>
<?php
require 'components/footer.php';
?>