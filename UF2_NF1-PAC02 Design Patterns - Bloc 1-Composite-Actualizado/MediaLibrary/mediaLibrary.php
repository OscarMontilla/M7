<?php

abstract class AbstractMediaItem {
    protected $name;
    protected $thumbnail;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }

    public function getDescription() {
        echo "- Nombre: " . $this->getName() . "<br>";
        echo "- Miniatura: " . $this->getThumbnail() . "<br>";

        if ($this->hasChildren()) {
            echo "Incluye:<br>";
            foreach ($this->items as $item) {
                echo " - ";
                $item->getDescription();
            }
        }
    }

}

class MediaFolder extends AbstractMediaItem {
    protected $items = array();

    public function __construct($name, $thumbnail) {
        $this->setName($name);
        $this->setThumbnail($thumbnail);
    }

    public function add(AbstractMediaItem $item) {
        $this->items[] = $item;
    }

    

    public function hasChildren() {
        return (bool)(count($this->items) > 0);
    }
}

abstract class AbstractMediaFile extends AbstractMediaItem {
    protected $fileName;
    protected $size;

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    public function getFileName() {
        return $this->fileName;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function getDescription() {
        echo "- Archivo: " . $this->getFileName() . "<br>";
        echo "- Nombre: " . $this->getName() . "<br>";
        echo "- Miniatura: " . $this->getThumbnail() . "<br>";
        echo "- Tamaño: " . $this->getSize() . "<br>";
    }
}

class Photo extends AbstractMediaFile {
   
    public function __construct($fileName, $size, $name, $thumbnail) {
        $this->setFileName($fileName);
        $this->setSize($size);
        $this->setName($name);
        $this->setThumbnail($thumbnail);
    }
}

class Video extends AbstractMediaFile {
    
    public function __construct($fileName, $size, $name, $thumbnail) {
        $this->setFileName($fileName);
        $this->setSize($size);
        $this->setName($name);
        $this->setThumbnail($thumbnail);
    }
}

$folder = new MediaFolder("Carpeta1", "Carpeta2");

$photo1 = new Photo("foto1.jpg", "2MB", "Foto 1", "thumb1.jpg");
$photo2 = new Photo("foto2.jpg", "3MB", "Foto 2", "thumb2.jpg");
$video1 = new Video("video1.mp4", "50MB", "Video 1", "thumb3.jpg");

$folder->add($photo1);
$folder->add($photo2);
$folder->add($video1);

$folder2 = new MediaFolder("Carpeta1", "Carpeta2");

$photo3 = new Photo("foto1.jpg", "2MB", "Foto 1", "thumb1.jpg");
$photo4 = new Photo("foto2.jpg", "3MB", "Foto 2", "thumb2.jpg");
$video2 = new Video("video1.mp4", "50MB", "Video 1", "thumb3.jpg");

$folder2->add($photo3);
$folder2->add($photo4);
$folder2->add($video2);

$folder->add($folder2);

$folder->getDescription();


?>
