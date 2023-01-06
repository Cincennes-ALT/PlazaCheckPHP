<?php
//ez a fájl az osztályokat tartalmazza

class Hatter{
    private $id;
    private $filename;
    private $author;
    private $authorLink;
    private $source;
    private $sourceLink;
    private $isUpdated;
    private $num;
    private $src;
    private $videoSrc;

    function __construct($id, $filename, $author,$authorLink, $source, $sourceLink, $isUpdated, $num, $src, $videoSrc){
        $this->id = $id;
        $this->filename = $filename;
        $this->author = $author;
        $this->authorLink = $authorLink;
        $this->source = $source;
        $this->sourceLink = $sourceLink;
        $this->isUpdated = $isUpdated;
        $this->num = $num;
        $this->src = $src;
        $this->videoSrc = $videoSrc;
    }

    public function __toString(){
        $kimenet = "<p>ID = ".$this->id." gif link = ". $this->src." </p>";
        return $kimenet;
    }

    public function hatterGif(){
        return $this->src;
    }
}

?>