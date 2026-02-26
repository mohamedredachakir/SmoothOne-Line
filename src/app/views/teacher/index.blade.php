<h1>My Briefs</h1>
<a href="/teacher/briefs/create">➕ New Brief</a>

<ul>
<?php foreach ($briefs as $b): ?>
    <li>
        <?= htmlspecialchars($b->title) ?> (<?= $b->type ?>)
    </li>
<?php endforeach; ?>
</ul>
