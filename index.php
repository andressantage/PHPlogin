<?php
/* if(isset($_POST['registrar'])){
    $credenciales["http"]["method"] = "POST";
    $credenciales["http"]["header"] = "Content-type: application/json";
    $data = [
        "nombre"=> $_POST['nombre'],
        "cedula"=> $_POST['cedula'],
        "apellidos"=> $_POST['apellidos'],
        "direccion"=> $_POST['direccion'],
        "edad" => $_POST['edad'],
        "email" => $_POST['email'],
        "horario" => $_POST['horario'],
        "team" => $_POST['team'],
        "trainer" => $_POST['trainer'],
    ];
    $data = json_encode($data);
    $credenciales["http"]["content"] = $data;
    $config = stream_context_create($credenciales);

    $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
    /* print_r($_DATA); */
/* }   */


if(isset($_POST['buscar'])){  
    //echo "buscar";
    $cc=intval($_POST['cedula']);
    $credenciales1["http"]["method"] = "GET";
    $credenciales1["http"]["header"] = "Content-type: application/json";
    $config = stream_context_create($credenciales1);
    $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
    $jota1=json_decode($_DATA, true); 
    //echo "<br>";
    foreach($jota1 as $clave => $valor){ 
        if($valor['cedula']==$cc){
            $aca=$valor;
        }
    }
    /* echo "<pre>";
    var_dump($aca);
    echo "</pre>"; */
}else{
    unset($aca);
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .centrar{
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .gridPersonal{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }
    .gridGrupo{
        display: grid;
        margin: 10px;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }
    input name=""{
        text-align:center;
    }
    label{
        text-align:center;
    }
    .cedula{
        grid-column: 2/4;
    }
    td{
        margin:0;
        padding: 5px;
        border: 1px solid black;
    }
    table{
        border-spacing:0;
    }
    .scroll{
    height: 50%;
    width: 100%;
    overflow: auto; 
    /* overflow-x: scroll;  */
    }
    .content {
    width: 90%; /* Ancho del contenido, solo para demostración */
    height: 450px; /* Alto del contenido, solo para demostración */
    margin: 10px;
    }
</style>
</head>
<body>
    
<div class="centrar">
    <div>
    <!-- action="2.php"  -->
        <form method="POST">
            <div class="gridPersonal">
                <input name="nombre" type="text" 
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['nombre']; ?>"
                    <?php } ?>
                    placeholder="Nombre">
                <label>Campuslands</label>
                <input name="apellidos" type="text" 
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['apellidos']; ?>"
                    <?php } ?>
                    placeholder="Apellidos">
                <input name="edad" type="number"
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['edad']; ?>"
                    <?php } ?>
                    placeholder="Edad">
                <input name="direccion" type="text"
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['direccion']; ?>"
                    <?php } ?>
                    placeholder="Direccion">
                <input name="email" type="text"
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['email']; ?>"
                    <?php } ?>
                    placeholder="Email">
            </div>
            <div class="gridGrupo">
                <input name="horario" type="text" 
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['horario']; ?>"
                    <?php } ?>
                    placeholder="Horario de entrada">
                <button type="submit" name="registrar">✅</button>
                <button type="submit" name="eliminar">❌</button>
                <input name="team" type="text"
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['team']; ?>"
                    <?php } ?>
                    placeholder="Team">
                <button type="submit" name="editar">✏️</button>
                <button type="submit" name="buscar">🔍</button>
                <input name="trainer" type="text"
                    <?php if(isset($aca)){?>
                        value="<?php  echo $aca['trainer']; ?>"
                    <?php } ?>
                    placeholder="Trainer">
                <input name="cedula" class="cedula" type="number"
                    <?php if(isset($aca)){?>
                            value="<?php  echo $aca['cedula']; ?>"
                        <?php } ?>
                    placeholder="Cedula">
            </div>
        </form>
    </div>
</div>

<div class="centrar">
<div class="centrar scroll">
    <div class="centrar content">
    <table>
        <tr>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Direccion</td>
            <td>Edad</td>
            <td>Email</td>
            <td>Horario de entrada</td>
            <td>Team</td>
            <td>Trainer</td>
        </tr>

        <?php
            $credenciales["http"]["method"] = "GET";
            $credenciales["http"]["header"] = "Content-type: application/json";
            $config = stream_context_create($credenciales);
            $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
            $jota=json_decode($_DATA, true); 
            foreach($jota as $clave => $valor){ 
                echo "
                <tr>
                    <td>".$jota[$clave]['nombre']."</td>
                    <td>".$jota[$clave]['apellidos']."</td>
                    <td>".$jota[$clave]['direccion']."</td>
                    <td>".$jota[$clave]['edad']."</td>
                    <td>".$jota[$clave]['email']."</td>
                    <td>".$jota[$clave]['horario']."</td>
                    <td>".$jota[$clave]['team']."</td>
                    <td>".$jota[$clave]['trainer']."</td>
                </tr>
                ";
            }
        ?>
    </table>
    </div>
</div>
</div>



    
</body>
</html>