<h1>Competences</h1>
<a href="/admin/competences/create">➕ Add Competence</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Label</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($competence)): ?>
            <?php foreach ($competence as $c): ?>
                <tr>
                    <td><?= $c->id ?></td>
                    <td><?= htmlspecialchars($c->code ?? '') ?></td>
                    <td><?= htmlspecialchars($c->label ?? '') ?></td>
                    <td>
                        <a href="/admin/competences/edit?id=<?= $c->id ?>">Edit</a>
                        <form method="POST" action="/admin/competences/delete" style="display:inline">
                            <input type="hidden" name="id" value="<?= $c->id ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No competences found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
