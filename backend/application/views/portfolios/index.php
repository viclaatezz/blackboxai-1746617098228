<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolios</title>
</head>
<body>
    <h1>Portfolios</h1>
    <a href="<?php echo site_url('portfolios/create'); ?>">Create New Portfolio</a>
    <ul>
        <?php foreach ($portfolios as $portfolio): ?>
            <li>
                <?php echo htmlspecialchars($portfolio['name'], ENT_QUOTES, 'UTF-8'); ?>
                <a href="<?php echo site_url('portfolios/edit/'.$portfolio['id']); ?>">Edit</a>
                <a href="<?php echo site_url('portfolios/delete/'.$portfolio['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
