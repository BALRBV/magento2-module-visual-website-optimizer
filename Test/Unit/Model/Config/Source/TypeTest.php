<?php

namespace Balrbv\VisualWebsiteOptimizer\Test\Unit\Model\Config\Source;

use Balrbv\VisualWebsiteOptimizer\Model\Config\Source\Type;

class TypeTest extends \PHPUnit_Framework_TestCase
{

    public function testToOptionArray()
    {
        $obj = new Type();
        $this->assertInternalType('array', $obj->toOptionArray());
        $this->assertCount(2, $obj->toOptionArray());
        foreach($obj->toOptionArray() as $row) {
            $this->assertArrayHasKey('value', $row);
            $this->assertArrayHasKey('label', $row);
        }
    }

    public function testToArray()
    {
        $obj = new Type();
        $result = $obj->toArray();
        $this->assertInternalType('array', $result);
        $this->assertCount(2, $result);
    }

    public function testContentGetOptions()
    {
        $obj = new Type();
        $options = $obj->toOptionArray();

        $key = key($options);
        $value = current($options);

        $this->assertInstanceOf('\Magento\Framework\Phrase', $value['label']);

        $first = array_shift($options);

        $this->assertEquals($key, 0);
        $this->assertEquals($first, $value);
    }
}