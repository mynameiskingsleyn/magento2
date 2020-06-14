<?php

namespace Mastering\SampleModule\Component\Listing\Columns;


use  Magento\Ui\Component\Listing\Columns\Date as MainDate;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Locale\Bundle\DataBundle;
use Magento\Framework\Locale\ResolverInterface;
use Magento\Framework\Stdlib\BooleanUtils;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

/**
 * Date format column
 *
 * @api
 * @since 100.0.2
 */
class Date extends MainDate
{
    /**
     * @var TimezoneInterface
     */
    protected $timezone;

    /**
     * @var BooleanUtils
     */
    private $booleanUtils;

    /**
     * @var ResolverInterface
     */
    private $localeResolver;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var DataBundle
     */
    private $dataBundle;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param TimezoneInterface $timezone
     * @param BooleanUtils $booleanUtils
     * @param array $components
     * @param array $data
     * @param ResolverInterface|null $localeResolver
     * @param DataBundle|null $dataBundle
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        TimezoneInterface $timezone,
        BooleanUtils $booleanUtils,
        array $components = [],
        array $data = [],
        ResolverInterface $localeResolver = null,
        DataBundle $dataBundle = null
    ) {
//        $this->timezone = $timezone;
//        $this->booleanUtils = $booleanUtils;
//        $this->localeResolver = $localeResolver ?? ObjectManager::getInstance()->get(ResolverInterface::class);
//        $this->locale = $this->localeResolver->getLocale();
//        $this->dataBundle = $dataBundle ?? ObjectManager::getInstance()->get(DataBundle::class);
        //parent::__construct($context, $uiComponentFactory, $components, $data);
        parent::__construct($context,$uiComponentFactory,$timezone,$booleanUtils,$components,$data,$localeResolver,$dataBundle);
        //echo 'working here'; exit;
    }


    /**
     * @inheritdoc
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item[$this->getData('name')])
                    && $item[$this->getData('name')] !== "0000-00-00 00:00:00"
                ) {
                    $date = $this->timezone->date(new \DateTime($item[$this->getData('name')]));
                    $timezone = isset($this->getConfiguration()['timezone'])
                        ? $this->booleanUtils->convert($this->getConfiguration()['timezone'])
                        : true;
                    if (!$timezone) {
                        $date = new \DateTime($item[$this->getData('name')]);
                    }
                    //var_dump ($date);
                    $item[$this->getData('name')] = $date->format('Y-m-d H:i:s');
                    //echo $item[$this->getData('name')];
                }
            }
        }
       // var_dump($dataSource); exit;
        return $dataSource;
    }
}
