<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayServiceIdsDabEnsembleId;

class PlayServiceIdsDabEnsembleIdTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayServiceIdsDabEnsembleId();
        parent::__construct();
    }
}