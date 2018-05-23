<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace GalacticLabs\DisableCompareProducts\Plugin\Magento\Catalog\Block\Product;

use GalacticLabs\DisableCompareProducts\Observer\LayoutLoadBefore as AnObserver;

class AbstractProduct
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Return 'null' if product comparision is disabled.
     *
     * @param \Magento\Catalog\Block\Product\AbstractProduct $subject
     * @param string $result
     * @return string|null
     */
    public function afterGetAddToCompareUrl(
        \Magento\Catalog\Block\Product\AbstractProduct $subject,
        $result
    ) {
        $disableCompare = $this->scopeConfig->getValue(AnObserver::DISABLE_COMPARE_CONFIG_PATH);

        if($disableCompare){
            $result=null;
        }
        return $result;
    }
}