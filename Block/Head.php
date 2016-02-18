<?php

namespace Balrbv\VisualWebsiteOptimizer\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class Head
 * @package Balrbv\VisualWebsiteOptimizer\Block
 */
class Head extends Template
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Head constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        // Empty if disabled
        if (!$this->isEnabled()) {
            return '';
        }

        // Define template
        switch ($this->getType()) {
            case 'complex':
                $this->setTemplate('complex.phtml');
                break;
            default:
            case 'simple':
                $this->setTemplate('simple.phtml');
        }

        // Return default behavior
        return parent::_toHtml();
    }

    /**
     * @return bool
     */
    protected function isEnabled()
    {
        return (bool)$this->scopeConfig->getValue('visualwebsiteoptimizer/general/enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    protected function getType()
    {
        return $this->scopeConfig->getValue('visualwebsiteoptimizer/general/type',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
        return (int)$this->scopeConfig->getValue('visualwebsiteoptimizer/general/accountId',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}