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

class Elozmenyek{
    private $lejatszva;
    private $id;
    private $eloado;
    private $cim;
    private $szotar;
    private $elsoSzamElozmeny;
    function __construct($szotar){
        $szotar = json_decode($szotar);
        //első szám
        $this->elsoSzamElozmeny = $szotar[0];
        foreach ($szotar as $key => $value) {
            $this->lejatszva = $key;
            $this->id = $key;
            $this->eloado = $key;
            $this->cim = $key;

        }
    }
    private static function elsoSzamID($elsoSzamElozmeny){
        
    }

}

// jelenleg játszó szám osztálya
class SzamMost{
    private $id;
    private $artist;
    private $title;
    private $album;
    private $position;
    private $lenght;
    private $artwork_src;
    private $artwork_sm_src;
    private $reactions;
    private $listeners;

    function __construct($id, $artist, $title, $album, $position, $length, $artwork_src, $artwork_sm_src, $reactions, $listeners) {
        $this->id = $id;
        $this->album = $album;
        $this->artist = $artist;
        $this->artwork_sm_src = $artwork_sm_src;
        $this->artwork_src = $artwork_src;
        $this->lenght = $length;
        $this->listeners = $listeners;
        $this->position = $position;
        $this->reactions = $reactions;
        $this->title = $title;
    }
    public function __toString() {
        return "Title: ".$this->title." - Artist: ".$this->artist." - Album".$this->album;
    }
}

?>