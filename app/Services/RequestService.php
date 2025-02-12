<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Http;

class RequestService
{
    private $url = '';

    public function send($url)
    {
      $this->setUrl($url);

      $response = Http::get($this->url);
    
      if ($response->successful()) {
        return $response->body();
      } else {
        return false;
      }
    }

    public function getUrl()
    {
      return $this->url;
    }

    public function setUrl($url)
    {
      $this->url = $url;
    }

    public function processBody($body)
    {
      $dom = new DOMDocument();
      @$dom->loadHTML($body);
      $xpath = new DOMXPath($dom);
      $cityNodes = $xpath->query("//div[@class='concert-tile-text' and contains(text(), 'رشت')]");
      // $sonatiNode = $xpath->query("//h2[contains(text(), 'کنسرت‌های سنتی، کلاسیک و تلفیقی تهران')]");
      
      // $concerts = [];
      if ($cityNodes->length > 0) {
        foreach ($cityNodes as $node) {
            $parent = $node->parentNode;
            $title = htmlspecialchars_decode($parent->getAttribute('title')); 
            $concerts[] = trim(strip_tags($title));
        }
      } 

      return $concerts;

    }

}