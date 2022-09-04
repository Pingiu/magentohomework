<?php
namespace Perspective\HomeworkDeclarativeSchema\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Contactdetails extends AbstractDb{
public function _construct()
{
$this->_init("HomeworkDeclarativeSchema", 'entity_id');
}
}
?>
 