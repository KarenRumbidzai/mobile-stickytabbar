<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */

namespace Vectra\StickyTabBar\Block\Cart;

use \Magento\Store\Model\ScopeInterface;

class MiniCartStickyTabBar extends \Magento\Checkout\Block\Cart\Sidebar
{
    /**
     * Returns value of config field at given path
     * 
     * @param string
     * 
     * @return mixed
    */
    public function getConfigValue($path)
    {
        return $this->_scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $this->_storeManager->getStore()->getId());
    }

    /**
     * Returns if Mini cart Slider is enabled
     * 
     * @return bool
    */
    public function isStickyTabModuleEnabled()
    {
        $isStickyTabEnabled = $this->getConfigValue('stickytabbar/config_general/stickytabbar_enable');

        if ($isStickyTabEnabled == 1) {
            return true;
        }
        
        return false;
    }
}

