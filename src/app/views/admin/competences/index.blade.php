<h1>Competences</h1>
<a href="/admin/competences/create">➕ Add Competence</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Label</th>
            <th>Sprint</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($competence as $c): ?>
            <tr>
                <td><?= $c->id ?></td>
                <td><?= htmlspecialchars($c->code) ?></td>
                <td><?= htmlspecialchars($c->label) ?></td>
                <td><?= htmlspecialchars($c->sprint_name ?? '—') ?></td>
                <td>
                    <a href="/admin/competences/edit?id=<?= $c->id ?>">Edit</a>
                    <form method="POST" action="/admin/competences/delete" style="display:inline">
                        <input type="hidden" name="id" value="<?= $c->id ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
