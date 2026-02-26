<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<h1>Classes</h1>
<a href="/admin/classes/create">Add New Class</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($classes as $class): ?>
        <tr>
            <td><?= $class->id ?></td>
            <td><?= $class->name ?></td>
            <td>
                <a href="/admin/classes/edit?id=<?= $class->id ?>">Edit</a>
                <form action="/admin/classes/delete" method="post" style="display:inline">
                    <input type="hidden" name="id" value="<?= $class->id ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>