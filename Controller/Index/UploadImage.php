<?php

/**
 * @author Karen Rumbie Creatives
 * @copyright Copyright © Karen Rumbie Creatives
 * @package KarenRumbie_StickyTabBar
 */

namespace KarenRumbie\StickyTabBar\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use KarenRumbie\StickyTabBar\Model\Upload\ImageUploader;

class UploadImage extends Action
{
    /**
     * @var ImageUploader
     */
    private $imageUploader;

    public function __construct(
        Context $context,
        ImageUploader $imageUploader
    )
    {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    public function execute()
    {
        $result = $this->imageUploader->saveImageToMediaFolder('upload');

        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}