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
        :root { --black: #0b0b0d; --red: #d71920; --white: #ffffff; --soft-white: #f5f5f5; --line: #3a3a3d; }
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; min-height: 100vh; background: var(--black); color: var(--white); border-top: 8px solid var(--red); }
        main { max-width: 960px; margin: 0 auto; padding: 3rem 1.25rem; }
        h1 { margin: 0; border-left: 6px solid var(--red); padding-left: 0.8rem; font-size: clamp(2rem, 5vw, 3rem); letter-spacing: 0; }
        .summary { color: var(--white); margin: 0.75rem 0 0; }
        .summary::first-letter { color: var(--red); }
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; background: var(--white); color: #111111; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35); }
        th, td { border: 1px solid var(--line); padding: 0.85rem 0.75rem; text-align: left; }
        th { background: var(--red); color: var(--white); font-weight: 700; }
        td:first-child { color: var(--red); font-weight: 700; }
        tbody tr:nth-child(even) { background: var(--soft-white); }
        tbody tr:hover { background: #ffd9da; }
        .empty { color: #555555; text-align: center; }
        @media (max-width: 640px) {
            main { padding: 2rem 0.75rem; }
            table { font-size: 0.85rem; }
            th, td { padding: 0.65rem 0.45rem; }
        }
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
