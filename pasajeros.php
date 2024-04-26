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
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $ruta = $_POST['ruta'];


    include '../busesP/services/pasajeros.service.php';

    $pasa = new Pasajero($id, $name, $lastName, $ruta);
    $pasa->crearUsuario();
}
?>
<body>
    <h1>Ingrese datos del pasajero</h1>

    <form action="" method="POST">
        <label for="id">Ingresa el ID</label>
        <input type="text" name="id">

        <label for="name">ingresa el NOMBRE</label>
        <input type="text" name ="name">

        <label for="lastName">Ingresa el Apellido</label>
        <input type="text" name="lastName">

        <label for="ruta">Ingresa la RUTA que desea</label>
        <select name="ruta">
            <option value=""></option>
        </select>

        <br><br>

        <button type="submit"> Enviar Formulario</button>
    </form>

    <h1>Informacion de todas las rutas</h1>

    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>lastName</th>
            <th>ruta</th>

        </tr>

        <?php 

            include '../busesP/services/pasajeros.service.php';

            $pasa = new Pasajero(); 
            $response = $pasa->getAllPasajeros();

            $data = json_decode($response, true);
            foreach ($data as $row){
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['lastName'].'</td>';
            echo '<td>'.$row['ruta'].'</td>';
            echo '</tr>';
                }
        ?>
    </table>


</body>
</html>