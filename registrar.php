<?php
    $credenciales["http"]["method"] = "POST";
    $credenciales["http"]["header"] = "Content-type: application/json";
    $data = [
        "cc"=>"123",
        "nombre"=> "Miguel",
        "apellido"=> "Castro",
        "direccion"=> "dsd",
        "edad" => 12,
    ];
    $data = json_encode($data);
    $credenciales["http"]["content"] = $data;
    $config = stream_context_create($credenciales);

    $_DATA = file_get_contents("https://6460edfe185dd9877e33740e.mockapi.io/jugadores", false, $config);
    print_r($_DATA);
?>  