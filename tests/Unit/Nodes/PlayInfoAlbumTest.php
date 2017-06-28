<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayInfoAlbum;

class PlayInfoAlbumTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayInfoAlbum();
        parent::__construct();
    }
}