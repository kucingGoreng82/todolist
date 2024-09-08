<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo List</title>
    <style>
        /* Simple styling for better layout */
        body {
            font-family: Arial, sans-serif;
        }
        .todo-form {
            margin-bottom: 20px;
        }
        .todo-form input {
            padding: 8px;
            font-size: 16px;
        }
        .todo-form button {
            padding: 8px 12px;
            font-size: 16px;
            margin-left: 10px;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li span {
            flex: 1;
        }
        .todo-buttons {
            display: flex;
            gap: 10px;
        }
        .todo-buttons a {
            text-decoration: none;
            padding: 6px 12px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
        }
        .todo-buttons a:hover {
            background-color: #0056b3;
        }
        .todo-buttons a.delete {
            background-color: #dc3545;
        }
        .todo-buttons a.delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Your ToDo List</h1>

    <form class="todo-form" method="post" action="/todo/add">
        <input type="text" name="kegiatan" placeholder="Add a new task..." required>
        <button type="submit">Tambah</button>
    </form>

    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <span><?= esc($todo['kegiatan']); ?> - <?= esc($todo['status']); ?></span>
                <div class="todo-buttons">
                    <?php if ($todo['status'] == 'pending'): ?>
                        <a href="/todo/complete/<?= esc($todo['idkegiatan']); ?>">Selesai</a>
                    <?php endif; ?>
                    <a href="/todo/delete/<?= esc($todo['idkegiatan']); ?>" class="delete">Hapus</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
