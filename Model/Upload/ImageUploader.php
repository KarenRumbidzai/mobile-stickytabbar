<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */

namespace Vectra\StickyTabBar\Model\Upload;

use Magento\Framework\Exception\LocalizedException;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface as StoreManager;

class ImageUploader
{
    /**
     * @var UploaderFactory
     */
    private $uploaderFactory;

    /**
     * @var FileSystem
     */
    private $fileSystem;

    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * @var string
     */
    const FILE_DIR = 'vectra_stickytabbar/icons';

    public function __construct(
        UploaderFactory $uploaderFactory,
        Filesystem $fileSystem,
        StoreManager $storeManager
    )
    {
        $this->uploaderFactory = $uploaderFactory;
        $this->fileSystem = $fileSystem;
        $this->storeManager = $storeManager;
    }

    public function saveImageToMediaFolder($fileId)
    {
        try {
            $result = ['file' => '', 'size' => ''];

            $mediaDirectory = $this->fileSystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath(self::FILE_DIR);

            $uploader = $this->uploaderFactory->create(['fileId' => $fileId]);

            $uploader->setAllowRenameFiles(true);
            $uploader->setFilesDispersion(false);
            $uploader->setAllowedExtensions($this->getAllowedExtentions());

            $result = array_intersect_key($uploader->save($mediaDirectory), $result);
            $result['url'] = $this->getMediaUrl($result['file']);
        } catch(\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }

        return $result;
    }

    public function getMediaUrl($file)
    {
        $file = ltrim(str_replace('\\', '/', $file));

        return $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . self::FILE_DIR . '/' . $file;
    }

    public function getAllowedExtentions()
    {
        return ['jpg', 'jpeg', 'gif', 'png', 'PNG', 'svg'];
    }
}