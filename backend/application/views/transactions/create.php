<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Transaction</title>
</head>
<body>
    <h1>Create Transaction</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('transactions/store'); ?>
        <label for="portfolio_id">Portfolio:</label>
        <select name="portfolio_id" id="portfolio_id">
            <?php foreach ($portfolios as $portfolio): ?>
                <option value="<?php echo $portfolio['id']; ?>" <?php echo set_select('portfolio_id', $portfolio['id']); ?>>
                    <?php echo htmlspecialchars($portfolio['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="coin_id">Coin:</label>
        <select name="coin_id" id="coin_id">
            <?php foreach ($coins as $coin): ?>
                <option value="<?php echo $coin['id']; ?>" <?php echo set_select('coin_id', $coin['id']); ?>>
                    <?php echo htmlspecialchars($coin['symbol'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($coin['name'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="type">Type:</label>
        <select name="type" id="type">
            <option value="buy" <?php echo set_select('type', 'buy'); ?>>Buy</option>
            <option value="sell" <?php echo set_select('type', 'sell'); ?>>Sell</option>
            <option value="swap" <?php echo set_select('type', 'swap'); ?>>Swap</option>
        </select>
        <br>

        <label for="quantity">Quantity:</label>
        <input type="number" step="any" name="quantity" id="quantity" value="<?php echo set_value('quantity'); ?>">
        <br>

        <label for="price">Price:</label>
        <input type="number" step="any" name="price" id="price" value="<?php echo set_value('price'); ?>">
        <br>

        <label for="transaction_date">Transaction Date:</label>
        <input type="datetime-local" name="transaction_date" id="transaction_date" value="<?php echo set_value('transaction_date'); ?>">
        <br>

        <input type="submit" value="Create">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('transactions'); ?>">Back to Transactions</a>
</body>
</html>
