<?php

class FileManipulator {
    public function create($filePath, $data=null){
        file_put_contents($filePath, $data);
        return $this;
    }
    public function delete($filePath){
        if(file_exists($filePath)) unlink($filePath);
    }
    public function copy($filePath, $copyPath){
        if(file_exists($filePath)) $this->copy($filePath, $copyPath);
    }
    public function rename($filePath, $newName){
        if(file_exists($filePath)) rename($filePath, $newName);
    }
    public function replace($filePath, $newPath){
        if(file_exists($filePath)) rename($filePath, $newPath);
    }
    public function getSize($filePath){
        return file_exists($filePath) ? filesize($filePath) : 'Не существует';
    }
}

$file = new FileManipulator;
$file->create('4.txt');
$file->rename('4.txt', '5.txt');



