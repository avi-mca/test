<?php
namespace Digi\Customerattributenew\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{ 

    private $customerSetupFactory;      

    public function __construct(\Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory)
    {
      $this->customerSetupFactory = $customerSetupFactory;
    }

    public function install(ModuleDataSetupInterface
    $setup, ModuleContextInterface $context)
    {
        /** @var CustomerSetup $customerSetup */

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $setup->startSetup();

        $attributeCode = "customstatus";

      //  $customerSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);          

        $customerSetup->addAttribute('customer',
        'customstatus', [
        'label' => 'Customer Status',
        'type' => 'text',
        'frontend_input' => 'text',
        'required' => false,
        'visible' => true,
         'system'=> 0,
        'position' => 105,
        ]);

        $loyaltyAttribute = $customerSetup->getEavConfig()->getAttribute('customer', 'customstatus');
        $loyaltyAttribute->setData('used_in_forms',['adminhtml_customer']);
        $loyaltyAttribute->save();

        $setup->endSetup();
    }
}