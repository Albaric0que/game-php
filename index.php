<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Apuesta y gana</title>
</head>
<body>

<div class="container">
    <h2>¡Apuesta y gana!</h2>
    <?php
    // Función para obtener una imagen aleatoria
    function obtenerImagenAleatoria() {
        $imagenes = ["muerte.png", "hachazo.png", "gato_chino.jpg"];
        $imagenSeleccionada = $imagenes[array_rand($imagenes)];
        return $imagenSeleccionada;
    }

    // Inicializar el dinero del usuario
    $dineroUsuario = isset($_POST['dinero']) ? $_POST['dinero'] : 0;

    if ($dineroUsuario <= 0) {
        // Si el usuario no tiene dinero, mostrar el formulario para introducir la cantidad inicial
        echo '
            <form method="post" action="">
                <label for="dinero">Introduce la cantidad de dinero:</label>
                <input type="number" id="dinero" name="dinero" required>
                <button class="form-principal" type="submit">Empezar a jugar</button>
            </form>
        ';
    } else {
        // Si el usuario tiene dinero, mostrar la imagen aleatoria y actualizar el dinero según el resultado
        $imagen = obtenerImagenAleatoria();
        echo '<img src="images/' . $imagen . '" alt="Imagen aleatoria"><br>';

        switch ($imagen) {
            case "muerte.png":
                echo "<p>☠️ ¡Has perdido todo tu dinero! ☠️<br> Eres pobre otra vez <br> ¿Qué vas a decirle a tu familia?</p>";
                echo "<p>FIN DEL JUEGO</p>";
                $dineroUsuario = 0;
                break;
            case "hachazo.png":
                echo "<p>💸¡Has perdido la mitad de tu dinero, estúpido!💸</p>";
                echo "<p>¡Juega otra vez e intenta arreglarlo!</p>";
                $dineroUsuario /= 2;
                break;
            case "gato_chino.jpg":
                echo "<p>💶¡Has duplicado tu dinero!💶</p>";
                $dineroUsuario *= 2;
                break;
        }

        echo "<p>💶 Tienes $dineroUsuario €</p>";

        // Mostrar botones para seguir jugando o dejar de jugar
        echo '
            <form method="post" action="">
                <input type="hidden" name="dinero" value="' . $dineroUsuario . '">
                <button type="submit">Seguir jugando</button>
            </form>
            <form method="post" action="">
                <button type="submit">Dejar de jugar</button>
            </form>
        ';
    }
    ?>
</div>

</body>
</html>
