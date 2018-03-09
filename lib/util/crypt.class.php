<?php

class crypt {

    var $cadena;
    protected $key='';
    
    function __construct($token="UniversidadDe la SALUD hugoCHAVE2") {
        $this->key=$token;
    }

    public function encriptar($cadena) {
          // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->key), $cadena, MCRYPT_MODE_CBC, md5(md5($this->key))));
        return $encrypted; //Devuelve el string encriptado
    }

    public function desencriptar($cadena) {
         // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($this->key))), "\0");
        return $decrypted;  //Devuelve el string desencriptado
    }

}
