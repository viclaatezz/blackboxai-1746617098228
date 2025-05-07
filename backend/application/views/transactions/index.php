<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
</head>
<body>
    <h1>Transactions</h1>
    <a href="<?php echo site_url('transactions/create'); ?>">Create New Transaction</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Portfolio</th>
                <th>Coin</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Transaction Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?php echo $transaction['id']; ?></td>
                <td><?php echo htmlspecialchars($transaction['portfolio_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($transaction['coin_symbol'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($transaction['type'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo $transaction['quantity']; ?></td>
                <td><?php echo $transaction['price']; ?></td>
                <td><?php echo $transaction['transaction_date']; ?></td>
                <td>
                    <a href="<?php echo site_url('transactions/edit/'.$transaction['id']); ?>">Edit</a>
                    <a href="<?php echo site_url('transactions/delete/'.$transaction['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
