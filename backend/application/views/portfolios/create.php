<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Portfolio</title>
</head>
<body>
    <h1>Create Portfolio</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('portfolios/store'); ?>
        <label for="name">Portfolio Name:</label>
        <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>">
        <br>
        <input type="submit" value="Create">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('portfolios'); ?>">Back to Portfolios</a>
</body>
</html>
