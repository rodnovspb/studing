<?php


class File
{
    public $fp;
    public $file;
    
    public function __construct($file) {
       $this->file = $file;
       if(!is_writable($this->file)){
           echo "Файл {$this->file} не доступен для записи";
           exit;
       }
       $this->fp = fopen($this->file, 'a');
    
    }
    
    public function __destruct() {
        fclose($this->fp);
        
    }
    
    public function write($text) {
        if(fwrite($this->fp, $text) === false){
            echo "Не могу записать в файл {$this->file}";
            exit;
        }
    }
    
}