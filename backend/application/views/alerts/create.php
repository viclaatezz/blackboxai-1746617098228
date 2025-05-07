<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Alert</title>
</head>
<body>
    <h1>Create Alert</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('alerts/store'); ?>
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

        <label for="target_price">Target Price:</label>
        <input type="number" step="any" name="target_price" id="target_price" value="<?php echo set_value('target_price'); ?>">
        <br>

        <label for="direction">Direction:</label>
        <select name="direction" id="direction">
            <option value="above" <?php echo set_select('direction', 'above'); ?>>Above</option>
            <option value="below" <?php echo set_select('direction', 'below'); ?>>Below</option>
        </select>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>">
        <br>

        <input type="submit" value="Create">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('alerts'); ?>">Back to Alerts</a>
</body>
</html>
