<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EcondaAnalyticsModule\Application\Controller\Admin\Tab;

use OxidEsales\Eshop\Application\Controller\Admin\ShopConfiguration;
use OxidEsales\EcondaAnalyticsModule\Application\Controller\Admin\ConfigurationTrait;
use OxidEsales\EcondaAnalyticsModule\Application\Controller\Admin\HttpErrorsDisplayer;
use OxidEsales\EcondaAnalyticsModule\Application\Controller\Admin\FileUploadTrait;
use OxidEsales\EcondaAnalyticsModule\Application\Factory;
use OxidEsales\EcondaAnalyticsModule\Component\File\FileSystem;
use OxidEsales\EcondaAnalyticsModule\Component\File\JsFileLocator;
use FileUpload\FileUpload;

/**
 * Used as tracking tab controller.
 */
class TrackingTabController extends ShopConfiguration
{
    use ConfigurationTrait;
    use FileUploadTrait;

    const TRANSLATION_WHEN_FILE_IS_PRESENT = 'OEECONDAANALYTICS_MESSAGE_FILE_IS_PRESENT';

    const TRANSLATION_WHEN_FILE_IS_NOT_PRESENT = 'OEECONDAANALYTICS_MESSAGE_FILE_IS_NOT_PRESENT';

    protected $_sThisTemplate = 'oeecondaanalytics_tracking_tab.tpl';

    /**
     * @var FileSystem
     */
    protected $fileSystem;

    /**
     * @var JsFileLocator
     */
    protected $fileLocator;

    /**
     * @var FileUpload
     */
    protected $fileUploader;

    /**
     * @var HttpErrorsDisplayer
     */
    protected $errorDisplayer;

    /**
     * @param null|Factory $factory
     */
    public function __construct($factory = null)
    {
        if (is_null($factory)) {
            $factory = oxNew(Factory::class);
        }
        $this->fileSystem = $factory->makeFileSystem();
        $this->fileLocator = $factory->makeEmosJsFileLocator();
        $this->fileUploader = $factory->makeEmosJsFileUploader();
        $this->errorDisplayer = $factory->makeHttpErrorDisplayer();
        $this->_aViewData['sClassMain'] = __CLASS__;
        parent::__construct();
    }
}
