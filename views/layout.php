<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbería App</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="/barberia.ico">
</head>
<body>

    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">
        <?php echo $contenido; ?>      
        </div>
    </div>

    <?php  
            echo $script ?? '';
    ?>
        <a href="https://www.freepik.com/free-photo/young-man-barbershop-trimming-hair_12804095.htm#query=barbershop&position=6&from_view=keyword">Image by senivpetro</a> on Freepik        
</body>
</html>