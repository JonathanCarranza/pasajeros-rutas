<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $ruta = $_POST['nombreruta'];
        $origen = $_POST['puntopartida'];
        $destino = $_POST['destino'];
        $costo = $_POST['costo'];

        include '../busesP/services/rutas.services.php';

        $ruta1 = new Routes($id, $ruta, $origen, $destino, $costo);
        $ruta1->crearRuta();
    }
?>

<body>
    <h1>Rutas</h1>

    <form action="" method="POST">
        <label for="id">Ingresa el ID</label>
        <input type="text" name="id">

        <label for="nombreruta">Ingresa El nombre de la Ruta</label>
        <input type="text" name="nombreruta">

        <label for="puntopartida">Ingresa el punto de partida</label>
        <input type="text" name="puntopartida">

        <label for="destino">Ingresa el destino</label>
        <input type="text" name="destino">

        <label for="costo">Ingresa el costo</label>
        <input type="text" name="costo">

        <button type="submit">Enviar Formulario</button>
    </form>
    
    <h1>Informacion de todas las rutas</h1>

    <table>
        <tr>
            <th>id</th>
            <th>ruta</th>
            <th>origen</th>
            <th>destino</th>
            <th>costo</th>
        </tr>

        <?php 

            include '../busesP/services/rutas.services.php';

            $rutas = new Routes(); 
            $response = $rutas->getAllRoutes();

            $data = json_decode($response, true);
            foreach ($data as $row){
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['ruta'].'</td>';
            echo '<td>'.$row['origen'].'</td>';
            echo '<td>'.$row['destino'].'</td>';
            echo '<td>'.$row['costo'].'</td>';
            echo '</tr>';
                }
        ?>
    </table>

</body>
</html>