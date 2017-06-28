<?php
namespace FSAPI\Tests\Unit\Nodes;


use FSAPI\Nodes\PlayFeedback;

class PlayFeedbackTest extends NodeTestCase implements NodeTests
{
    protected $node = null;
    public function __construct()
    {
        $this->node = new PlayFeedback();
        parent::__construct();
    }
}