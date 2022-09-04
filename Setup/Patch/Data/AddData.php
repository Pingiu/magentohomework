<?php
namespace Perspective\HomeworkDeclarativeSchema\Setup\Patch\Data;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Perspective\HomeworkDeclarativeSchema\Model\ContactdetailsFactory;
Use Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails;
class AddData implements DataPatchInterface, PatchVersionInterface
{
  private $contactDetailsFactory;
  private $contactDetailsResource;
  private $moduleDataSetup;
  public function __construct(
    ContactdetailsFactory $contactDetailsFactory,
    Contactdetails $contactDetailsResource,
    ModuleDataSetupInterface $moduleDataSetup
  )
  {
    $this->contactDetailsFactory = $contactDetailsFactory;
    $this->contactDetailsResource = $contactDetailsResource;
    $this->moduleDataSetup=$moduleDataSetup;
  }
  public function apply()
  {
    //Install data row into contact_details table
    $this->moduleDataSetup->startSetup();
    $contactDTO=$this->contactDetailsFactory->create();         
        $contactDTO->setproduct_name('Strawberry')->setkol_product('148')
        ->setdiscount('0.08');
    $this->contactDetailsResource->save($contactDTO);
    $this->moduleDataSetup->endSetup();
  }
  public static function getDependencies()
  {
    return [];
  }
  public static function getVersion()
  {
    return '1.0.1';
  }
  public function getAliases()
 
  {
    return [];
  }
}
