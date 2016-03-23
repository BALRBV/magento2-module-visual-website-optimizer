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
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $construct = $this->objectManager->getConstructArguments('Magento\Framework\View\Element\Template\Context');
        $construct['scopeConfig'] = $this->getMockBuilder('Magento\Framework\App\Config\ScopeConfigInterface')->disableOriginalConstructor()->getMock();
        $this->contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context', $construct);
    }

    public function testConstruct()
    {
        $obj = new Head(
            $this->contextMock,
            []
        );

        $this->assertInstanceOf('\Balrbv\VisualWebsiteOptimizer\Block\Head', $obj);
    }

    public function testGetData()
    {
        $obj = new Head(
            $this->contextMock,
            ['test' => true]
        );

        $this->assertTrue($obj->getData('test'));
    }

    public function testAccountId()
    {
        $obj = new Head(
            $this->contextMock,
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

        $construct = $this->objectManager->getConstructArguments('Magento\Framework\View\Element\Template\Context');
        $construct['scopeConfig'] = $mock;
        $contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context', $construct);

        $obj = new Head(
            $contextMock,
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

        $construct = $this->objectManager->getConstructArguments('Magento\Framework\View\Element\Template\Context');
        $construct['scopeConfig'] = $mock;
        $contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context', $construct);

        $obj = new Head(
            $contextMock,
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

        $construct = $this->objectManager->getConstructArguments('Magento\Framework\View\Element\Template\Context');
        $construct['scopeConfig'] = $mock;
        $contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context', $construct);

        $obj = new Head(
            $contextMock,
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

        $construct = $this->objectManager->getConstructArguments('Magento\Framework\View\Element\Template\Context');
        $construct['scopeConfig'] = $mock;
        $contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context', $construct);

        $obj = new Head(
            $contextMock,
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

        $construct = $this->objectManager->getConstructArguments('Magento\Framework\View\Element\Template\Context');
        $construct['scopeConfig'] = $mock;
        $contextMock = $this->objectManager->getObject('Magento\Framework\View\Element\Template\Context', $construct);

        $obj = new Head(
            $contextMock,
            []
        );

        $result = $obj->toHtml();
        $this->assertInternalType('string', $result);
        $this->assertEquals($result, '');
    }
}