<?php
require 'components/header.php';
?>
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

        <?php foreach ($params as $task) : ?>
            <tr>
                <th scope="row">1</th>
                <td><?= $task->getTaskText() ?></td>
                <td>
                <?php if ($task->getIsDone() ): ?>
                    <input type="checkbox" checked=checked>
                </td>
                <?php else: ?>
                    <input type="checkbox" checked=checked>
                    <?php endif; ?>

                <td>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<?php
require 'components/footer.php';
?>