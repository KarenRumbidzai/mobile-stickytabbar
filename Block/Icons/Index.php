<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */

namespace Vectra\StickyTabBar\Block\Icons;

use \Magento\Framework\Registry;
use \Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Block\Template\Context as TemplateContext;
use \Magento\Framework\View\Element\Template;
use Vectra\StickyTabBar\Block\Index as StickyTabBarIndex;

class Index extends Template
{
    /**
     * Constructor
     * 
     * @param Magento\Backend\Block\Template\Context
     * @param \Magento\Framework\Registry
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param array
     */
    public function __construct(
        TemplateContext $context,
        Registry $registry,
        StoreManagerInterface $_storeManager,
        StickyTabBarIndex $_indexStickyTabBar,
        $data = []
    )
    {
        $this->_registry = $registry;
        $this->_storeManager = $_storeManager;
        $this->_indexStickyTabBar = $_indexStickyTabBar;
        parent::__construct($context, $data);
    }

    /**
     * Get url of required image
     * 
     * @param string
     * 
     * @return string
     */
    public function getIconUrl($image)
    {
        $useSecure = $this->_indexStickyTabBar->getConfigValue('web/secure/use_in_frontend');

        if($this->_indexStickyTabBar->getConfigValue($image)) {
            if($useSecure) {
                return $this->_indexStickyTabBar->getConfigValue('web/secure/base_url') . "media/vectra_stickytabbar/icons/" . $this->_indexStickyTabBar->getConfigValue($image);
            }

            return $this->_indexStickyTabBar->getConfigValue('web/unsecure/base_url') . "media/vectra_stickytabbar/icons/" . $this->_indexStickyTabBar->getConfigValue($image);

        }
    }


    /**
     * Get and return link for uploded Facebook icon or return link to default Facebook icon
     * if none was provided
     * 
     * @return string
     */
    public function getNavOneIcon() {
        $icon = $this->getIconUrl('stickytabbar/config_nav_one/nav_one_icon');

        if($icon) {
            return ($icon);
        }
    }

    public function getNavTwoIcon() {
        $icon = $this->getIconUrl('stickytabbar/config_nav_two/nav_two_icon');

        if($icon) {
            return ($icon);
        }
    }

    public function getNavThreeIcon() {
        $icon = $this->getIconUrl('stickytabbar/config_nav_three/nav_three_icon');

        if($icon) {
            return ($icon);
        }
    }

    public function getNavFourIcon() {
        $icon = $this->getIconUrl('stickytabbar/config_nav_four/nav_four_icon');

        if($icon) {
            return ($icon);
        }
    }

    public function getNavFiveIcon() {
        $icon = $this->getIconUrl('stickytabbar/config_nav_five/nav_five_icon');

        if($icon) {
            return ($icon);
        }
    }






}