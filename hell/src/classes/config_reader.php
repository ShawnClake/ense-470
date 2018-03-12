<?php

//require_once '../spyc-0.6.1/Spyc.php';

class config_reader
{

    public static function getEnv()
    {
        //echo file_get_contents( "/var/www/app.env" );
        //($s = yaml_parse_file("/var/www/app.env")) || die("YAML file not found");
        //var_dump($s);
        //$thing = file_get_contents("/var/www/app.env");
        //$data = Spyc::YAMLLoad('../spyc-0.6.1/spyc.yaml');
        return yaml_parse_file("/var/www/app.env");
    }


}