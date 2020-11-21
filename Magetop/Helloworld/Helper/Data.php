<?php

namespace Magetop\Helloworld\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_BLOG = 'blog/';
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    // hàm tự tạo để sử dụng
    public function checkDate($date = '')
    {
        $ok = false;
        if ($date != '') {
            $day = date('w', strtotime($date));
            if ($day == 0) {
                $ok = true;
            }
        }
        return $ok;
    }

    // get data config value
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue($field, ScopeInterface::SCOPE_STORE, $storeId);
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_BLOG . 'setting/' . $code, $storeId); // {section}/{group}/{field}
    }
}
