<?php

if(isset($_POST['eliminar'])){  
    echo "eliminar";
    $cc=intval($_POST['cedula']);
    $credenciales["http"]["method"] = "GET";
    $credenciales["http"]["header"] = "Content-type: application/json";
    $config = stream_context_create($credenciales);
    $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
    $jota1=json_decode($_DATA, true); 
    //var_dump($jota1);
    foreach($jota1 as $clave => $valor){ 
        if($valor['cedula']===$cc){
            $id=$valor['id'];
        }
    }
    echo $id;
    if(isset($id)){
        $credenciales["http"]["method"] = "DELETE";
        $credenciales["http"]["header"] = "Content-type: application/json";
        $credenciales["http"]["ignore_errors"] = true;
        $config = stream_context_create($credenciales);
        $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores/{$id}", false, $config);
    }else{
        echo "No se puede";
    }
    
    header('Location: index.php');
}


if(isset($_POST['editar'])){  
    echo "editar";
    $cc=$_POST['cedula'];
    $credenciales["http"]["method"] = "GET";
    $credenciales["http"]["header"] = "Content-type: application/json";
    $config = stream_context_create($credenciales);
    $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
    $jota1=json_decode($_DATA, true); 
    //var_dump($cc);
    //var_dump($jota1);
    foreach($jota1 as $clave => $valor){ 
        if($valor['cedula']==$cc){
            $id=$valor['id'];
        }
    }
    echo $id;
    if(isset($id)){
        $credenciales["http"]["method"] = "PUT";
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
        $data1=[];
        foreach($data as $clave => $valor){ 
            if (!empty($valor)){
                $data1[$clave]=$valor;
            }
        }
        //var_dump($data1);
        $data1 = json_encode($data1);
        $credenciales["http"]["content"] = $data1;
        $config = stream_context_create($credenciales);
        $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores/{$id}", false, $config);
    }else{
        echo "No se puede";
    }
    
    //header('Location: index.php');
}



if(isset($_POST['registrar'])){  
    echo "registrar";
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

    header('Location: index.php');
}

if(isset($_POST['buscar'])){  
    echo "buscar";
    $cc=intval($_POST['cedula']);
    $credenciales1["http"]["method"] = "GET";
    $credenciales1["http"]["header"] = "Content-type: application/json";
    $config = stream_context_create($credenciales1);
    $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
    $jota1=json_decode($_DATA, true); 
    echo "<br>";
    $aca=[];
    foreach($jota1 as $clave => $valor){ 
        if($valor['cedula']==$cc){
            $aca=$valor;
        }
    }
    echo "<pre>";
    var_dump($aca);
    echo "</pre>";
}
?>