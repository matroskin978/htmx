<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['name'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($user['email'], ENT_QUOTES) ?></td>
            <td><?= htmlspecialchars($user['phone'], ENT_QUOTES) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
