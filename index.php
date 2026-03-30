<?php
session_start();

$mensaje = '';
//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = trim($_POST["modelo"] ?? ''); 
    $talla = trim($_POST["talla"] ?? '');
    $color = trim($_POST["color"] ?? '');
    $precio = trim($_POST["precio"] ?? '');
    $referencia = trim($_POST["referencia"] ?? '');
//
    if ($modelo !== "" && $talla !== "" && $color !== "" && $precio !== "" && $referencia !== "") {
        if (is_numeric($precio) && is_numeric($referencia) && is_numeric($talla)) {
            $_SESSION['mensaje'] = "Modelo <strong>$modelo</strong>, color <strong>$color</strong>, talla <strong>$talla</strong>, referencia <strong>$referencia</strong>, precio <strong>$precio</strong> €.";
        } else {
            $_SESSION['mensaje'] = "El precio, la referencia y la talla deben ser valores numéricos.";
        }
    } else {
        $_SESSION['mensaje'] = "Completa todos los campos del formulario para poder registrar tu ropa deportiva.";
    }
// Redirigir a la misma página para mostrar el mensaje sin que se duplique al recargar
    header("Location: index.php");
    exit();
}
// Recuperar el mensaje de la sesión y luego eliminarlo para evitar que se muestre nuevamente al recargar la página
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ropa deportiva</title>
    <style>
        body {
            text-align: center;
            background: #2e4259;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            margin: 20px;
            
        
        }
        
.cabecera {
    Background-color: #80959d;
            color: #ffffff;
            padding: 20px;
            border-radius: 2px;
            border: 1px solid #ccc;
            max-width: 700px; 
            margin: 0 auto 20px auto; 
        }
        .respuesta {
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
                padding: 15px;
                background-color: #93bb78;
                border: 1px solid #ccc;
                border-radius: 2px;
                max-width: 700px; 
        }
        .respuesta h2 {
            margin-top: 0;
            font-size: 20px;
        }

       .formulario {
    background-color: #f2f2f2; 
    padding: 15px;
    margin: 20px auto;
    max-width: 200px;
    border-radius: 2px;
    border: 1px solid #ccc;
}

.formulario form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.formulario form div {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 90%;
}

.formulario label {
    display: block;
    text-align: left;
}

.formulario input {
    width: 85%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding: 6px;
    margin-top: 4px;
    margin-bottom: 8px;
    border: 1px solid #aaa;
    border-radius: 2px;
}

.formulario button {
    width: 85%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding: 8px;
    background-color: #555;
    color: white;
    border: none;
    border-radius: 2px;
    cursor: pointer;
}

#btn {
    width: 100%;
    padding: 8px;
    background-color: #a11d1d;
    color: white;
    border: none;
    border-radius: 2px;
    cursor: pointer;
}
#btn:hover {
    background-color: #1d7a13;
    transition: background-color 0.3s ease;
}

.pie-pagina {
    color: #ffffff;
    padding: 20px;
    
}

    </style>
</head>
<body>
    <header class="cabecera">
        <h2>Completa el formulario para registrar tu calzado deportivo</h2>                           
    </header>
    
    <main>
       
        <section class ="formulario">
           <h2>Formulario de registro</h2>
           <form action="" method= "POST">
            <div>
                <label for= "referencia">Referencia:</label>
                <input type="number" id="referencia" name="referencia" required>
            </div>

            <div>
                <label for= "modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" required>
            </div>

            <div>
                <label for= "talla">Talla:</label>
                <input type="number" id="talla" name="talla" required>
            </div>

            <div>
                <label for= "color">Color:</label>
                <input type="text" id="color" name="color" required>
            </div>  

            <div>
                <label for= "precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>

             
            <div>
                <button id="btn" type="submit">Registrar</button> 
            </div>
           </form>

        </section>
        <?php if ($mensaje !== ''): ?>
            <section class="respuesta">
                <h2>Registrado en nuestro sistema, gracias.</h2>
                <p><?php echo $mensaje; ?></p>
            </section>
        <?php endif; ?>
    </main>
    <footer class="pie-pagina">
        <small>
        <p>&copy; <small>Todos los derechos reservados.<br>2026</small></p>
    </footer>
</body>
</html>
