<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SpotifyLastError;

class SpotifyLastErrorTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SpotifyLastError();
        parent::__construct();
    }
}