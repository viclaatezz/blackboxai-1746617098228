<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Coin</title>
</head>
<body>
    <h1>Edit Coin</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('coins/update/'.$coin['id']); ?>
        <label for="symbol">Symbol:</label>
        <input type="text" name="symbol" id="symbol" value="<?php echo set_value('symbol', $coin['symbol']); ?>">
        <br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo set_value('name', $coin['name']); ?>">
        <br>
        <label for="api_id">API ID (optional):</label>
        <input type="text" name="api_id" id="api_id" value="<?php echo set_value('api_id', $coin['api_id']); ?>">
        <br>
        <input type="submit" value="Update">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('coins'); ?>">Back to Coins</a>
</body>
</html>
