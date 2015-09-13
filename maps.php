<?php
class maps extends Script
{
    protected $helpMessage = "'map LOCATION': Returns a roadmap\n"
                            ."'satellitemap LOCATION': Returns a satellitemap\n"
                            ."'hybridmap LOCATION': Returns a hybridmap"
                            ."'terrainmap LOCATION': Returns a terrainmap";
    protected $description = 'Returns a map of the given location';

    public function run()
    {
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

		return $this->send('http://maps.google.com/maps/api/staticmap?markers=' . rawurlencode($this->matches[2]) . '&size=640x640&maptype=' . $this->type . '&sensor=false&format=png', 'image');
    }
}
