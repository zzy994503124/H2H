<?php

require_once DBParameters;
/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/8
 * Time: 12:05
 */
class DBConnection
{
    private $dbname;
    private $host;
    private $username;
    private $psd;
    private $parameters;
    private $conn;
    public function __construct()
    {
        $this->parameters = new DBParameters();
        $this->dbname = $this->parameters->dbname;
        $this->host = $this->parameters->server;
        $this->username = $this->parameters->username;
        $this->psd = $this->parameters->psd;
        return $this->connDB();
    }

    //connect ...
    public function connDB(){
        $this->conn = new mysqli($this->host, $this->username,
            $this->psd, $this->dbname);
        if($this->conn->connect_error)
        {
            die("Connection error".$this->conn->connect_error);
        }
    }

    //disconnecting ...
    public function disconnectDB(){
        $this->conn->close();
    }
}