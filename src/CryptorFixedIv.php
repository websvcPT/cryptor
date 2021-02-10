<?php

class CryptorFixedIv
{
    protected $method = 'AES-256-CBC'; // default cipher method if none supplied
    private $key;
    private $iv = '0000000000000000';

    public function __construct($key = false, $iv = false, $method = false)
    {
        if (!$key) {
            $this->key = php_uname(); // default encryption key if none supplied
        } else {
            $this->key = $key;
        }
        if ($iv) {
            $this->iv = $iv;
        }
        if ($method) {
            $this->method = $method;
        }
        $this->key = hex2bin(substr(hash('sha256', $this->key), 0, 64));
    }

    public function encrypt($data)
    {
        $encrypted = openssl_encrypt($data, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);
        $encrypted = base64_encode($encrypted);

        return $encrypted;
    }

    public function decrypt($data)
    {
        $data = base64_decode($data);
        $data = openssl_decrypt($data, $this->method, $this->key, OPENSSL_RAW_DATA, $this->iv);

        return $data;
    }
}
