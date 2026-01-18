<h1>Edit Competence</h1>

<form action="/admin/competences/update" method="POST">
    <input type="hidden" name="id" value="<?= $competence->id ?>">

    <label>Sprint:</label>
    <select name="sprint_id" required>
        <?php foreach ($sprints as $s): ?>
            <option value="<?= $s->id ?>" <?= ($competence->sprint_id ?? '') == $s->id ? 'selected' : '' ?>>
                <?= htmlspecialchars($s->name ?? '') ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Code:</label>
    <input type="text" name="code" value="<?= htmlspecialchars($competence->code ?? '') ?>" required>
    <br><br>

    <label>Label:</label>
    <input type="text" name="label" value="<?= htmlspecialchars($competence->label ?? '') ?>" required>
    <br><br>

    <button type="submit">Update Competence</button>
</form>

<a href="/admin/competences">⬅ Back</a>
