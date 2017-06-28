<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\SpotifyUsername;

class SpotifyUsernameTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new SpotifyUsername();
        parent::__construct();
    }
}