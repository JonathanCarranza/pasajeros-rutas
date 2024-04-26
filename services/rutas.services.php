<?php 

class Routes{
    public $id;
    public $ruta;
    public $origen;
    public $destino;
    public $costo;

    public function __construct($id=null,$ruta=null,$origen=null,$destino=null,$costo=null){
        $this->id = $id;
        $this->ruta = $ruta;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->costo = $costo;
    }

    public function crearRuta(){
        $endpoint = 'https://sheetdb.io/api/v1/2i3lujdaj8oqf';

        $data = array (
            'id' => $this->id,
            'ruta' => $this->ruta,
            'origen' => $this->origen,
            'destino' => $this->destino,
            'costo' => $this->costo,
        );
        $ch = curl_init($endpoint);
        curl_setopt($ch,CURLOPT_URL,true);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('content-type: aplication/json'));

        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function getAllRoutes(){
        $response =file_get_contents('https://sheetdb.io/api/v1/2i3lujdaj8oqf');
        return $response;
    }


};

?>