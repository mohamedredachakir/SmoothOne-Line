<form method="POST" action="/admin/classes/update">
    <input type="hidden" name="id" value="<?= $class['id'] ?>">
    <input type="text" name="name" value="<?= $class['name'] ?>">
    <button>Update</button>
</form>
