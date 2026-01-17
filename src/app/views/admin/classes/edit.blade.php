<?php
require_once __DIR__ . '/../../Layouts/header.blade.php';
require_once __DIR__ . '/../../Layouts/navbar.blade.php';
?>
<?php if($class): ?>
<h2>Edit Class</h2>

<form action="/admin/classes/update" method="post">
    <input type="hidden" name="id" value="<?= $class->id ?>">

    <label for="name">Class Name:</label>
    <input type="text" id="name" name="name" value="<?= $class->name ?>" required>

    <button type="submit">Save</button>
</form>

<?php else: ?>
<p>No class found with this ID!</p>
<?php endif; ?>


<?php
require_once __DIR__ . '/../../Layouts/footer.blade.php';
?>
