<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayInfoArtist;

class PlayInfoArtistTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayInfoArtist();
        parent::__construct();
    }
}