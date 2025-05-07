<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coins</title>
</head>
<body>
    <h1>Coins</h1>
    <a href="<?php echo site_url('coins/create'); ?>">Create New Coin</a>
    <ul>
        <?php foreach ($coins as $coin): ?>
            <li>
                <?php echo htmlspecialchars($coin['symbol'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($coin['name'], ENT_QUOTES, 'UTF-8'); ?>
                <a href="<?php echo site_url('coins/edit/'.$coin['id']); ?>">Edit</a>
                <a href="<?php echo site_url('coins/delete/'.$coin['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
