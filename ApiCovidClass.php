<?php
class ApiCovidClass {

    function __construct(){
        $this->apiurl = "https://www.rtve.es/aplicaciones/infografias/rtve_2020/noticias/mapa-datosCCAA/territorios.json";
        $this->jsondata = "";
    }
 
    function getApiData(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->apiurl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $this->jsondata = json_decode($output, true);
        return $this->jsondata;
    }

}

?>