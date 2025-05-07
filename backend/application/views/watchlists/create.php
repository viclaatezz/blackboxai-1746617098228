<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Watchlist</title>
</head>
<body>
    <h1>Create Watchlist</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('watchlists/store'); ?>
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

        <input type="submit" value="Create">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('watchlists'); ?>">Back to Watchlists</a>
</body>
</html>
