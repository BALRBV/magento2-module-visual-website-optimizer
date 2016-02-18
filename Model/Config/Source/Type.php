<?php
/**
 * Used in creating options for Yes|No config value selection
 *
 */
namespace Balrbv\VisualWebsiteOptimizer\Model\Config\Source;

class Type implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [['value' => 'complex', 'label' => __('Complex')], ['value' => 'simple', 'label' => __('Simple')]];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return ['simple' => __('Simple'), 'complex' => __('Complex')];
    }
}
