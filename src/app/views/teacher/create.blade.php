<form method="POST" action="/teacher/briefs/store">

    <label>
        Title
        <input type="text" name="title" placeholder="Brief title" required>
    </label>

    <br><br>

    <label>
        Description
        <textarea name="description" placeholder="Brief description"></textarea>
    </label>

    <br><br>

    <label>
        Estimated Duration (hours)
        <input 
            type="number" 
            name="estimated_duration" 
            placeholder="e.g. 10"
            min="1"
            required
        >
    </label>

    <br><br>

    <label>
        Type
        <select name="type" required>
            <option value="INDIVIDUAL">Individual</option>
            <option value="GROUP">Group</option>
        </select>
    </label>

    <br><br>

    <label>
        Sprint
        <select name="sprint_id" required>
            <?php foreach ($sprints as $s): ?>
                <option value="<?= $s->id ?>">
                    <?= htmlspecialchars($s->name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <br><br>

    <label>
        Class
        <select name="class_id" required>
            <?php foreach ($classes as $c): ?>
                <option value="<?= $c->id ?>">
                    <?= htmlspecialchars($c->name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <br><br>

    <button type="submit">Create Brief</button>

</form>
