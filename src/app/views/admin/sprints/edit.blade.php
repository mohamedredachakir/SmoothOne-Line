<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<h1>Edit Sprint</h1>

<form action="/admin/sprints/update" method="POST">
    <input type="hidden" name="id" value="<?= $sprint['id'] ?>">

    <div>
        <label>Sprint Name</label><br>
        <input type="text" name="name" value="<?= $sprint['name'] ?>" required>
    </div>

    <div>
        <label>Duration (days)</label><br>
        <input type="number" name="time" value="<?= $sprint['duration'] ?>" required>
    </div>

    <button type="submit">Update</button>
</form>

<a href="/admin/sprints">⬅ Back</a>
<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>