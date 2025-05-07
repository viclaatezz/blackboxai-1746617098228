<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Watchlists</title>
</head>
<body>
    <h1>Watchlists</h1>
    <a href="<?php echo site_url('watchlists/create'); ?>">Create New Watchlist</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Portfolio</th>
                <th>Coin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($watchlists as $watchlist): ?>
            <tr>
                <td><?php echo $watchlist['id']; ?></td>
                <td><?php echo htmlspecialchars($watchlist['portfolio_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($watchlist['coin_symbol'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="<?php echo site_url('watchlists/edit/'.$watchlist['id']); ?>">Edit</a>
                    <a href="<?php echo site_url('watchlists/delete/'.$watchlist['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
