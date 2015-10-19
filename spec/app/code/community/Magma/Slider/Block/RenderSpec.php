<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Magma_Slider_Block_RenderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Magma_Slider_Block_Render');
    }
}
