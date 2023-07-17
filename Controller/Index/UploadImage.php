<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */

namespace Vectra\StickyTabBar\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Vectra\StickyTabBar\Model\Upload\ImageUploader;

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