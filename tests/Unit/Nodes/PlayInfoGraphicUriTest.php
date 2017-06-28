<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayInfoGraphicUri;

class PlayInfoGraphicUriTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayInfoGraphicUri();
        parent::__construct();
    }
}