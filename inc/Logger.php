<?php
class Logger{
    private $fileHandle = null;
    private function __construct(){

    }

    public static function InitLogger($fn){
        $log = new Logger($fn);
        $fp = fopen($fn, 'a');
        if(!$fp)
            return null;

        $log->fileHandle = $fp;
        return $log;
    }

    public function WriteOut($data){
        return fwrite($this->fileHandle, $data, strlen($data));
    }

    public function CloseFile(){
        fclose($this->fileHandle);
    }


}