<?php

namespace Aitam\RaccontiBundle\Helpers;

use Aitam\RaccontiBundle\Entity\Racconti;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ElaborazioneUrl {

    public $embedvideo1;
    public $embedvideo2;
    public $imgvideo1;
    public $imgvideo2;
    public $contenuto1;
    public $contenuto2;

    public function elaUrl($url1, $url2) {

        if (substr_count($url1, 'youtube') == 1) {
            $this->embedvideo1 = substr($url1, 31, 11);
            $this->imgvideo1 = 'http://i1.ytimg.com./vi/' . $this->embedvideo1 . '/default.jpg';
            $contenuto1 = get_meta_tags('http://www.youtube.com/watch?v=' . $this->embedvideo1);
        } elseif (substr_count($url1, 'vimeo') == 1) {
            $this->embedvideo1 = substr($url1, 18);
            $this->imgvid1 = parse_url($url1);
            $this->contenuto1 = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . substr($this->imgvid1['path'], 1) . ".php"));
            $this->imgvideo1 = $this->contenuto1[0]['thumbnail_small'];
        }

        if (substr_count($url2, 'youtube') == 1) {
            $this->embedvideo2 = substr($url2, 31, 11);
            $this->imgvideo2 = 'http://i1.ytimg.com./vi/' . $this->embedvideo2 . '/default.jpg';
            $this->contenuto2 = 'http://www.youtube.com/watch?v=' . $this->embedvideo2;
        } elseif (substr_count($url2, 'vimeo') == 1) {
            $this->embedvideo2 = substr($url2, 18);
            $this->imgvid2 = parse_url($url2);
            $this->contenuto2 = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . substr($this->imgvid2['path'], 1) . ".php"));
            $this->imgvideo2 = $this->contenuto2[0]['thumbnail_small'];
        }
    }

    public function is_online() {
        if (checkdnsrr('youtube.com', 'ANY') || checkdnsrr('vimeo.com', 'ANY')) {
            return true;
        } else {
            $nonconnessione = "non posso cadastrare i video manca la connessione con youtube o vimeo 
                controlla  la  connessione internet dopodiche riinvia i dati
                ,devi anche riinserire le immagini";
            return $nonconnessione;
        }
    }

}

?>
