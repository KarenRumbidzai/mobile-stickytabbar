<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */

namespace Vectra\StickyTabBar\Block;

use \Magento\Framework\Registry;
use \Magento\Store\Model\StoreManagerInterface;
use Magento\Backend\Block\Template\Context as TemplateContext;
use Vectra\StickyTabBar\Block\Icons\Index as IconIndex;
use \Magento\Framework\View\Element\Template;
use Vectra\StickyTabBar\Block\Index as StickyTabBarIndex;

class StickyTabBar extends Template
{
    /**
     * Constructor
     * 
     * @param Magento\Backend\Block\Template\Context
     * @param \Magento\Framework\Registry
     * @param \Magento\Store\Model\StoreManagerInterface
     * @param Vectra\StickyTabBar\Block\Icons\Index
     * @param array
     */
    public function __construct(
        TemplateContext $context,
        Registry $registry,
        StoreManagerInterface $_storeManager,
        IconIndex $iconIndex,
        StickyTabBarIndex $_indexStickyTabBar,
        $data = []
    )
    {
        $this->iconIndex = $iconIndex;
        $this->_registry = $registry;
        $this->_storeManager = $_storeManager;
        $this->_indexStickyTabBar = $_indexStickyTabBar;
        parent::__construct($context, $data);
    }

    /**
     * Returns if StickyTabBar is enabled
     * 
     * @return bool
     */
    public function isStickyTabEnabled() {
        return $this->_indexStickyTabBar->isStickyTabModuleEnabled();
    }

    /**
     * Returns data required for StickyTabBar Item One
     * 
     * @return array
     */
    public function getNavOneData() {
        $navOne = [
            'title' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_one/stickytabbar_one_label'),
            'enabled' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_one/nav_one_enable'),
            'icon' => $this->iconIndex->getNavOneIcon(),
            'iconactive' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_one/nav_one_icon_active'),
            'link' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_one/stickytabbar_one_link'),
        ];

        return $navOne;
    }

    public function getNavTwoData() {
        $navTwo = [
            'title' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_two/stickytabbar_two_label'),
            'enabled' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_two/nav_two_enable'),
            'icon' => $this->iconIndex->getNavTwoIcon(),
            'iconactive' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_two/nav_two_icon_active'),
            'link' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_two/stickytabbar_two_link'),
        ];

        return $navTwo;
    }

    public function getNavThreeData() {
        $navThree = [
            'title' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_three/stickytabbar_three_label'),
            'enabled' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_three/nav_three_enable'),
            'icon' => $this->iconIndex->getNavThreeIcon(),
            'iconactive' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_three/nav_three_icon_active'),
            'link' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_three/stickytabbar_three_link'),
        ];

        return $navThree;
    }

    public function getNavFourData() {
        $navFour = [
            'title' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_four/stickytabbar_four_label'),
            'enabled' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_four/nav_four_enable'),
            'icon' => $this->iconIndex->getNavFourIcon(),
            'iconactive' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_four/nav_four_icon_active'),
        ];

        return $navFour;
    }

    public function getNavFiveData() {
        $navFive = [
            'title' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_five/stickytabbar_five_label'),
            'enabled' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_five/nav_five_enable'),
            'icon' => $this->iconIndex->getNavFiveIcon(),
            'iconactive' => $this->_indexStickyTabBar->getConfigValue('stickytabbar/config_nav_five/nav_five_icon_active'),
        ];

        return $navFive;
    }

}