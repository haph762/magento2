<?php
// access with: http://localhost/magento2/schema/index/index (folder Controller/index/index.php)

namespace Bss\Schema\Controller\Index;

use Bss\Schema\Model\DataExampleFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_dataExample;
    protected $resultRedirect;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Bss\Schema\Model\DataExampleFactory  $dataExample,
        \Magento\Framework\Controller\ResultFactory $result
    ) {
        parent::__construct($context);
        $this->_dataExample = $dataExample;
        $this->resultRedirect = $result;
    }
    public function execute()
    {
        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        $model = $this->_dataExample->create();
        $model->addData([
            "title" => 'Title 01',
            "content" => 'Content 01',
            "status" => true,
            "sort_order" => 1
        ]);
        $saveData = $model->save();
        if ($saveData) {
            $this->messageManager->addSuccess(__('Insert Record Successfully !'));
        }
        return $resultRedirect;
    }
}
