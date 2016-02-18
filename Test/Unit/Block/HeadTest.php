<?php

namespace Balrbv\VisualWebsiteOptimizer\Test\Unit\Block;

use Balrbv\VisualWebsiteOptimizer\Block\Head;

class HeadTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Magento\Framework\TestFramework\Unit\Helper\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \Magento\Framework\View\Element\Template\Context
     */
    protected $contextMock;

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeMock;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context');
        $this->scopeMock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
    }

    public function testConstruct()
    {
        $obj = new Head(
            $this->contextMock,
            $this->scopeMock,
            []
        );

        $this->assertInstanceOf('\Balrbv\VisualWebsiteOptimizer\Block\Head', $obj);
    }

    public function testGetData()
    {
        $obj = new Head(
            $this->contextMock,
            $this->scopeMock,
            ['test' => true]
        );

        $this->assertTrue($obj->getData('test'));
    }

    public function testAccountId()
    {
        $obj = new Head(
            $this->contextMock,
            $this->scopeMock,
            []
        );

        $accountId = $obj->getAccountId();
        $this->assertEquals($accountId, 0);
    }

    public function testEnabled()
    {
        $mock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $mock->expects($this->at(0))->method('getValue')->will($this->returnValue(TRUE));
        $mock->expects($this->at(1))->method('getValue')->will($this->returnValue(FALSE));

        $obj = new Head(
            $this->contextMock,
            $mock,
            []
        );

        $result = $obj->isEnabled();
        $this->assertInternalType('boolean', $result);
        $this->assertTrue($result);

        $result = $obj->isEnabled();
        $this->assertInternalType('boolean', $result);
        $this->assertFalse($result);
    }

    public function testType()
    {
        $mock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $mock->expects($this->at(0))->method('getValue')->will($this->returnValue('simple'));
        $mock->expects($this->at(1))->method('getValue')->will($this->returnValue('complex'));

        $obj = new Head(
            $this->contextMock,
            $mock,
            []
        );

        $result = $obj->getType();
        $this->assertInternalType('string', $result);
        $this->assertEquals($result, 'simple');

        $result = $obj->getType();
        $this->assertInternalType('string', $result);
        $this->assertEquals($result, 'complex');
    }

    public function testDefineTemplateComplex()
    {
        $mock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $mock->expects($this->at(0))->method('getValue')->will($this->returnValue('complex'));

        $obj = new Head(
            $this->contextMock,
            $mock,
            []
        );

        $result = $obj->defineTemplate();
        $this->assertInternalType('string', $result);
        $this->assertEquals($result, 'complex.phtml');
    }


    public function testDefineTemplateSimple()
    {
        $mock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $mock->expects($this->at(0))->method('getValue')->will($this->returnValue('simple'));

        $obj = new Head(
            $this->contextMock,
            $mock,
            []
        );

        $result = $obj->defineTemplate();
        $this->assertInternalType('string', $result);
        $this->assertEquals($result, 'simple.phtml');
    }

    public function testDefineTemplateDisabled()
    {
        $mock = $this->getMock('Magento\Framework\App\Config\ScopeConfigInterface');
        $mock->expects($this->at(0))->method('getValue')->will($this->returnValue(FALSE));

        $obj = new Head(
            $this->contextMock,
            $mock,
            []
        );

        $result = $obj->toHtml();
        $this->assertInternalType('string', $result);
        $this->assertEquals($result, '');
    }
}