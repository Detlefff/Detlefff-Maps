<?php
require_once 'scripts/script.php';

class maps extends Script
{
    public function run()
    {
		return $this->send($this->message->number, 'http://maps.google.com/maps/api/staticmap?markers=' . rawurlencode($this->matches[1]) . '&size=640x640&maptype=roadmap&sensor=false&format=png', 'image');
    }
}
