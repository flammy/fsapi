<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SpotifyBitRate;

class SpotifyBitRateTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SpotifyBitRate();
        parent::__construct();
    }
}