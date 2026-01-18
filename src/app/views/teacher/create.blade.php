<form method="POST" action="/teacher/briefs/store">
    <input name="title" placeholder="Title" required>
    <textarea name="description"></textarea>

    <input type="number" name="estimated_duration" placeholder="Duration">

    <select name="type">
        <option value="INDIVIDUAL">Individual</option>
        <option value="GROUP">Group</option>
    </select>

    <select name="sprint_id">
        <?php foreach ($sprints as $s): ?>
            <option value="<?= $s->id ?>"><?= $s->name ?></option>
        <?php endforeach; ?>
    </select>

    <select name="class_id">
        <?php foreach ($classes as $c): ?>
            <option value="<?= $c->id ?>"><?= $c->name ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Create</button>
</form>
