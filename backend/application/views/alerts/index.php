<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alerts</title>
</head>
<body>
    <h1>Alerts</h1>
    <a href="<?php echo site_url('alerts/create'); ?>">Create New Alert</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Portfolio</th>
                <th>Coin</th>
                <th>Target Price</th>
                <th>Direction</th>
                <th>Email</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alerts as $alert): ?>
            <tr>
                <td><?php echo $alert['id']; ?></td>
                <td><?php echo htmlspecialchars($alert['portfolio_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($alert['coin_symbol'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo $alert['target_price']; ?></td>
                <td><?php echo htmlspecialchars($alert['direction'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($alert['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo $alert['is_active'] ? 'Yes' : 'No'; ?></td>
                <td>
                    <a href="<?php echo site_url('alerts/edit/'.$alert['id']); ?>">Edit</a>
                    <a href="<?php echo site_url('alerts/delete/'.$alert['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
