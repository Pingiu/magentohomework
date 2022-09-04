<?php
namespace Perspective\HomeworkDeclarativeSchema\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class HomeworkDeclarativeSchema implements ArgumentInterface
{
    /**
     * @var \Perspective\BDScript\Model\PostFactory
     */
    private $_contactdetailsFactory;

    /**
     * @var \Perspective\BDScript\Model\ResourceModel\Post\CollectionFactory
     */
    private $collectionFactory;
    private $_timezone;

    public function __construct(\Perspective\HomeworkDeclarativeSchema\Model\ContactdetailsFactory $contactdetailsFactory,
    \Perspective\HomeworkDeclarativeSchema\Model\ResourceModel\Contactdetails\CollectionFactory $collectionFactory,
    \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone)
    {
        $this->_contactdetailsFactory = $contactdetailsFactory;
        $this->collectionFactory = $collectionFactory;
        $this->_timezone = $timezone;
    }
    public function getCollectionForBonus() {
        $post = $this->collectionFactory->create();
        $post->addFieldToSelect('*')
        ->addFieldToFilter('product_name',['like'=>'Banana'])
        ->addFieldToFilter('date_sales',['like'=>date("Y-m-d")]);
        return $post;
    }
    public function getCollectionWithoutBonus() {
        $post = $this->collectionFactory->create();
        $post->addFieldToSelect('*')
        ->addFieldToFilter('product_name',['like'=>'Banana'])
        ->addFieldToFilter('date_sales',['lt'=>date("Y-m-d")]);
        return $post;
    }
}
