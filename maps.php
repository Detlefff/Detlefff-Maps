<?php
/**
 *
 */
class maps
{
    //This is holding our matches
    private $matches;


    function __construct($matches)
    {
        $this->matches = $matches;
    }

    public function returnType()
    {
        return 'image';
    }
    public function run()
    {

        return 'http://maps.google.com/maps/api/staticmap?markers=' . rawurlencode($this->matches[1]) . '&size=640x640&maptype=roadmap&sensor=false&format=png';
    }

    function __destruct()
    {

    }
}
