<?php

namespace Legendaaary\CartToCSV\Plugin;

use Closure;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Store\Model\ScopeInterface;

class CartDownloadSupervisorPlugin
{
    protected ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }


    public function aroundCreate($subject, Closure $proceed, $type)
    {
        if ($type === 'Legendaaary\CartToCSV\Controller\Download\Index') {
            $isModuleEnabled = $this->scopeConfig->isSetFlag('legendaaary_cart_to_csv/general/enable',
                ScopeInterface::SCOPE_STORE);

            if (!$isModuleEnabled) {
                throw new NotFoundException(__('Page not found.'));
            }
        }
        return $proceed($type);
    }
}
