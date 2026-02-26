<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<h1>Create Sprint</h1>

<form action="/admin/sprints/store" method="POST">
    <div>
        <label>Sprint Name</label><br>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Duration (days)</label><br>
        <input type="number" name="time" required>
    </div>

    <button type="submit">Save</button>
</form>

<a href="/admin/sprints">⬅ Back</a>
<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>