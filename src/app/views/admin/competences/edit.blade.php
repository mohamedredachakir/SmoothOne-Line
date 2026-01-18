<h1>Edit Competence</h1>
<form action="/admin/competences/update" method="POST">
    <input type="hidden" name="id" value="<?= $competence->id ?>">
    Code: <input type="text" name="code" value="<?= htmlspecialchars($competence->code) ?>"><br>
    Label: <input type="text" name="label" value="<?= htmlspecialchars($competence->label) ?>"><br>
    <button type="submit">Update</button>
</form>
