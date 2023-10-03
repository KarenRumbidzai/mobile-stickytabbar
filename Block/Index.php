<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */

namespace Vectra\StickyTabBar\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Store\Model\ScopeInterface;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Framework\Registry;
use \Magento\Backend\Block\Template\Context as TemplateContext;

class Index extends Template
{

    /**
     * Constructor
     * 
     * @param \Magento\Backend\Block\Template\Context
     * @param \Magento\Framework\Registry
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param array
    */
    public function __construct(
        TemplateContext $context,
        Registry $registry,
        StoreManagerInterface $_storeManager,
        $data = []
    )
    {
        $this->_registry = $registry;
        $this->_storeManager = $_storeManager;
        parent::__construct($context, $data);
    }
    
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

