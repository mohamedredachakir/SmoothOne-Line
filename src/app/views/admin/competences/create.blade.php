<h1>Add Competence</h1>

<form action="/admin/competences/store" method="POST">
    <label>Sprint:</label>
    <select name="sprint_id" required>
        <?php foreach ($sprints as $s): ?>
            <option value="<?= $s->id ?>"><?= htmlspecialchars($s->name ?? '') ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Code:</label>
    <input type="text" name="code" required>
    <br><br>

    <label>Label:</label>
    <input type="text" name="label" required>
    <br><br>

    <button type="submit">Add Competence</button>
</form>

<a href="/admin/competences">⬅ Back</a>
