<?php
 namespace Digi\Customerattributenew\Block;

/**
 * Getintouch content block
 */
class Status extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Custom Status'));
        
        return parent::_prepareLayout();
    }
}
