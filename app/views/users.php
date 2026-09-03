<?php
$users = is_array($users ?? null) ? $users : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; color: #202124; }
        main { max-width: 960px; margin: 0 auto; }
        h1 { margin-bottom: 0.35rem; }
        .summary { color: #5f6368; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; }
        th, td { border: 1px solid #d0d7de; padding: 0.75rem; text-align: left; }
        th { background: #f6f8fa; }
        tbody tr:nth-child(even) { background: #fbfcfd; }
        .empty { color: #5f6368; text-align: center; }
    </style>
</head>
<body>
    <main>
        <h1>User Management</h1>
        <p class="summary">Users retrieved from the database: <?= count($users) ?></p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td class="empty" colspan="5">No users found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars((string) ($user['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars((string) ($user['firstname'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars((string) ($user['lastname'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars((string) ($user['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars((string) ($user['username'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
