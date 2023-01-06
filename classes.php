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
        $this->id;
        $this->filename;
        $this->author;
        $this->authorLink;
        $this->source;
        $this->sourceLink;
        $this->isUpdated;
        $this->num;
        $this->src;
        $this->videoSrc;
    }

    public function __toString(){
        $kimenet = "<p>ID = ".$this->id." gif link = ". $this->src." </p>";
        return $kimenet;
    }
}

?>