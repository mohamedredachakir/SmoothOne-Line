<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<h1>All Sprints</h1>

<a href="/admin/sprints/create">➕ Add Sprint</a>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Duration (days)</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($sprints as $sprint): ?>
        <tr>
            <td><?= $sprint['id'] ?></td>
            <td><?= $sprint['name'] ?></td>
            <td><?= $sprint['duration'] ?></td>
            <td>
                <a href="/admin/sprints/edit?id=<?= $sprint['id'] ?>">✏ Edit</a>

                <form action="/admin/sprints/delete" method="POST" style="display:inline">
                    <input type="hidden" name="id" value="<?= $sprint['id'] ?>">
                    <button type="submit">🗑 Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>