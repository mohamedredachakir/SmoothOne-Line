<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<h1>Edit Sprint</h1>

<form action="/admin/sprints/update" method="POST">
    <input type="hidden" name="id" value="<?= $sprint->id ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= $sprint->name ?>" />

    <label>Duration:</label>
    <input type="number" name="duration" value="<?= $sprint->duration ?>" />

    <label>Sprint Order:</label>
    <input type="number" name="sprint_order" value="<?= $sprint->sprint_order ?>" />

    <button type="submit">Update</button>
</form>

<a href="/admin/sprints">⬅ Back</a>

<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>