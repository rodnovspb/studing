<?php


interface iFile
{
    public function __construct($filePath);

    public function getPath(); // путь к файлу
    public function getDir();  // папка файла
    public function getName(); // имя файла
    public function getExt();  // расширение файла
    public function getSize(); // размер файла

    public function getText();          // получает текст файла
    public function setText($text);     // устанавливает текст файла
    public function appendText($text);  // добавляет текст в конец файла

    public function copy($copyPath);    // копирует файл
    public function delete();           // удаляет файл
    public function rename($newName);   // переименовывает файл
    public function replace($newPath);  // перемещает файл
}

class File implements iFile{
    private $filePath;
    public function __construct($filePath) {
        $this->filePath=$filePath;
    }
    public function getPath()
    {
        return $this->filePath;
    }
    public function getDir()
    {
        return __DIR__;
    }
    public function getName()
    {
        return pathinfo($this->filePath)['filename'];
    }
    public function getExt(){
        return pathinfo($this->filePath)['extension'];
    }
    public function getSize(){
        return filesize($this->filePath)/1024 . ' кб';
    }
    public function getText()
    {
        return file_get_contents($this->filePath);
    }
    public function setText($text)
    {
        file_put_contents($this->filePath, $text);
    }
    public function appendText($text)
    {
        $data = file_get_contents($this->filePath);
        file_put_contents($this->filePath, $data . $text);
    }
    public function copy($copyPath)
    {
        copy($this->filePath, $copyPath);
    }
    public function delete()
    {
        unlink($this->filePath);
    }
    public function rename($newName)
    {
        rename($this->filePath, $newName);
    }
    public function replace($newPath)
    {
        rename($this->filePath, $newPath);
    }
}

$file = new File('C:\Users\user\Desktop\studing\php\oop\1.txt');



