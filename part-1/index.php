<?php
    require_once __DIR__ . '/db/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Spot</title>
</head>
<body>
    <header>
        <div class="container">
            <img src="img/logo.png" alt="logo" />
        </div>
    </header>
    <main>
        <div class="cds-container container">
        <?php
            foreach($database['response'] as $album){?>
                <div class='cd'>
                    <img :src='<?= $album['poster'];?> alt='copertina album'>
                    <h3><?= $album['title']; ?></h3>
                    <span class='author'><?= $album['author']; ?></span>
                    <span class='year'><?=$album['year']; ?></span>
                 </div>
                 
            <?php 
            }
            ?>
        
        </div>
    </main>
    
</body>
</html>