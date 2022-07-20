<?php

namespace Bss\Schema\Model\ResourceModel;

class DataExample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("data_example", "id");
    }
}
//  Set up the ResourceModel, 
//  Create the DataExample.php file in the Bss/Schema/Model/ResourceModel/DataExample.php.