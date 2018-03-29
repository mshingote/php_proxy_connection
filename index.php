<?php

    //This function returns data from gievn url using proxy server
    //$url: Given url for which we have to browse data
    //$proxy: Given proxy details {ip:port} from which we have to browse data
    function get_data_after_proxy($url, $proxy) {
        $context_array = array('http'=>array('proxy'=>$proxy, 'request_fullu ri'=>true));
        $context = stream_context_create($context_array);
        $data = file_get_contents($url, false, $context);
        return $data;
    }

    //This function returns data from given url
    function get_data_before_proxy($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        $dataFromExternalServer = curl_exec($ch);
        echo $dataFromExternalServer;
    }

    //Driver code starts here
    $url = "https://api.ipify.org/?format=text"; //This url is for example purpose to verify public ip

    echo "get_data_before_proxy  : ";
    echo get_data_before_proxy($url); //ip before without proxy connection

    $proxy = "35.196.26.166:3128";

    echo "    get_data_after_proxy  : ";
    echo get_data_after_proxy($url,$proxy); //ip after proxy connection which should be same as 35.196.26.166

?>
