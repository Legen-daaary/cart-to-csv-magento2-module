<?php

namespace Legendaaary\CartToCSV\Block;

use Magento\Framework\View\Element\Template;

class Button extends Template
{
    private string $buttonCaption = "Download Cart";

    /**
     * @return string
     */
    public function getButtonCaption(): string
    {
        return $this->buttonCaption;
    }
}
