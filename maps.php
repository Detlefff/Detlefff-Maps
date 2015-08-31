<?php
require_once 'scripts/script.php';

class maps extends Script
{
    public function run()
    {
        //map|roadmap|hybridmap|satellitemap
        print_r($this->matches);
        switch (strtolower($this->matches[1])) {
            case 'hybridmap':
                $this->type = 'hybrid';
                break;
            case 'satellitemap':
                $this->type = 'satellite';
                break;
            case 'terrainmap':
                $this->type = 'terrain';
                break;
            default:
                $this->type = 'roadmap';
                break;
        }

		return $this->send($this->message->number, 'http://maps.google.com/maps/api/staticmap?markers=' . rawurlencode($this->matches[2]) . '&size=640x640&maptype=' . $this->type . '&sensor=false&format=png', 'image');
    }
}
