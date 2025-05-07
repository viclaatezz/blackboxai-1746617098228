<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaction</title>
</head>
<body>
    <h1>Edit Transaction</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('transactions/update/'.$transaction['id']); ?>
        <label for="portfolio_id">Portfolio:</label>
        <select name="portfolio_id" id="portfolio_id">
            <?php foreach ($portfolios as $portfolio): ?>
                <option value="<?php echo $portfolio['id']; ?>" <?php echo set_select('portfolio_id', $portfolio['id'], ($transaction['portfolio_id'] == $portfolio['id'])); ?>>
                    <?php echo htmlspecialchars($portfolio['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="coin_id">Coin:</label>
        <select name="coin_id" id="coin_id">
            <?php foreach ($coins as $coin): ?>
                <option value="<?php echo $coin['id']; ?>" <?php echo set_select('coin_id', $coin['id'], ($transaction['coin_id'] == $coin['id'])); ?>>
                    <?php echo htmlspecialchars($coin['symbol'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($coin['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="buy" <?php echo set_select('type', 'buy', ($transaction['type'] == 'buy')); ?>>Buy</option>
            <option value="sell" <?php echo set_select('type', 'sell', ($transaction['type'] == 'sell')); ?>>Sell</option>
            <option value="swap" <?php echo set_select('type', 'swap', ($transaction['type'] == 'swap')); ?>>Swap</option>
        </select>
        <br>

        <label for="quantity">Quantity:</label>
        <input type="number" step="any" name="quantity" id="quantity" value="<?php echo set_value('quantity', $transaction['quantity']); ?>">
        <br>

        <label for="price">Price:</label>
        <input type="number" step="any" name="price" id="price" value="<?php echo set_value('price', $transaction['price']); ?>">
        <br>

        <label for="transaction_date">Transaction Date:</label>
        <input type="datetime-local" name="transaction_date" id="transaction_date" value="<?php echo set_value('transaction_date', date('Y-m-d\TH:i', strtotime($transaction['transaction_date']))); ?>">
        <br>

        <input type="submit" value="Update">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('transactions'); ?>">Back to Transactions</a>
</body>
</html>
