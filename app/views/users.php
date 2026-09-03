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
        :root {
            --bg: #0a0c0f;
            --bg-soft: #1a1d21;
            --panel: rgba(39, 42, 48, 0.96);
            --gold: #f6c845;
            --gold-soft: #f9d96b;
            --white: #f5f5f5;
            --gray: #d7d8d9;
            --line: rgba(255, 255, 255, 0.12);
            --shadow: rgba(0, 0, 0, 0.42);
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100%;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--white);
        }

        body {
            background:
                radial-gradient(circle at 0% 0%, rgba(246, 200, 69, 0.18), transparent 28%),
                linear-gradient(90deg, rgba(0,0,0,0.3), rgba(0,0,0,0.75)),
                var(--bg);
        }

        main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3.2rem 1.5rem 4rem;
        }

        h1 {
            margin: 0 0 0.75rem;
            font-size: clamp(3rem, 6vw, 7rem);
            line-height: 0.95;
            letter-spacing: -0.06em;
            font-weight: 900;
            color: var(--white);
        }

        .summary {
            margin: 0;
            font-size: clamp(1.1rem, 2vw, 2rem);
            line-height: 1.5;
            color: var(--gray);
        }

        .summary strong {
            color: var(--gold);
            font-weight: 800;
        }

        .table-shell {
            margin-top: 2.3rem;
            border: 1px solid var(--line);
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 18px 36px var(--shadow);
            background: var(--panel);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead th {
            background: var(--gold);
            color: #111111;
            padding: 1.15rem 1rem;
            text-align: left;
            font-size: 0.92rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(0,0,0,0.2);
        }

        tbody td {
            padding: 1.05rem 1rem;
            border-bottom: 1px solid var(--line);
            color: var(--white);
            font-size: 1.05rem;
            word-break: break-word;
            background: rgba(255,255,255,0.01);
        }

        tbody tr:nth-child(even) td {
            background: rgba(255,255,255,0.015);
        }

        tbody tr:hover td {
            background: rgba(246, 200, 69, 0.12);
        }

        tbody td:first-child {
            color: var(--gold-soft);
            font-weight: 800;
        }

        .empty {
            text-align: center;
            color: var(--gray);
            font-style: italic;
            padding: 1.6rem 1rem;
        }

        @media (max-width: 720px) {
            main {
                padding: 2.2rem 0.85rem 3rem;
            }

            h1 {
                margin-bottom: 0.6rem;
            }

            .summary { font-size: 1.05rem; }

            thead th, tbody td {
                padding: 0.8rem 0.65rem;
                font-size: 0.82rem;
            }
        }
    </style>
</head>
<body>
    <main>
        <h1>User Management</h1>
        <p class="summary">Users retrieved dynamically from the <strong>Aiven MySQL users table.</strong></p>

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
