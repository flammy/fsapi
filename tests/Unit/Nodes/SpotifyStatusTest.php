<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SpotifyStatus;

class SpotifyStatusTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SpotifyStatus();
        parent::__construct();
    }
}