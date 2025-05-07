<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Portfolio</title>
</head>
<body>
    <h1>Edit Portfolio</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('portfolios/update/'.$portfolio['id']); ?>
        <label for="name">Portfolio Name:</label>
        <input type="text" name="name" id="name" value="<?php echo set_value('name', $portfolio['name']); ?>">
        <br>
        <input type="submit" value="Update">
    <?php echo form_close(); ?>
    <a href="<?php echo site_url('portfolios'); ?>">Back to Portfolios</a>
</body>
</html>
