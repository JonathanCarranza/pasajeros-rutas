<?php 

class Pasajero{
    public $id;
    public $name;
    public $lastName;
    public $ruta;

    public function __construct($id=null,$name=null,$lastName=null,$ruta=null){
        $this->id = $id;
        $this->name = $name;
        $this->lastName= $lastName;
        $this->ruta= $ruta;
    }

    public function crearUsuario(){
        $endpoint= 'https://sheetdb.io/api/v1/2i3lujdaj8oqf?sheet=pasajeros';

        $data = array(
            'id' => $this->id,
            'name' => $this->name,
            'lastName' => $this->lastName,
            'ruta' => $this->ruta,
        );

        $ch = curl_init($endpoint);
        curl_setopt($ch,CURLOPT_URL,$endpoint);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('content-type: aplication/json'));
        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;

    }

    public function getAllPasajeros(){
        $response = file_get_contents('https://sheetdb.io/api/v1/2i3lujdaj8oqf?sheet=pasajeros');
        return $response;
    }




}



?>