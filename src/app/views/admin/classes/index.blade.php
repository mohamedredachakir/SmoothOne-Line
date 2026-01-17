<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<h1>Classes List</h1>

<a href="/admin/classes/create">➕ Add Class</a>

<hr>

<?php if (empty($classes)): ?>
    <p>No classes found.</p>
<?php else: ?>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($classes as $class): ?>
            <tr>
                <td><?= $class['id'] ?></td>
                <td><?= htmlspecialchars($class['name']) ?></td>
                <td>
                    <a href="/admin/classes/edit?id=<?= $class['id'] ?>">Edit</a>

                    <form method="POST" action="/admin/classes/delete" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $class['id'] ?>">
                        <button type="submit" onclick="return confirm('Delete this class?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
<?php endif; ?>
<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>