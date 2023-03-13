<?php
class Data_mahasiswa extends MY_controller
{
    var $API = "";
    function __construct()
    {
        parent:: __construct();
        $this->API = "http://upy_frontend.test/api/Api_camaba";
    }

    public function Index()
    {
        $url = $this->API.'/index_get';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $semua_data = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($semua_data, true);
        $item = $result['biodata'];
        $data = array(
            'title' => 'Data Mahasiswa',
            'data' => $item,
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidemenu',$data);
        $this->load->view('index',$data);
        $this->load->view('template/footer',$data);
    }
}