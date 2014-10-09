<?php

$installer = $this;
$installer->startSetup();

$fields = array('university','department','function');

foreach($fields as $field) {
    $installer->addAttribute('customer', $field,  array(
        'type'     => 'varchar',
        'backend'  => '',
        'label'    => Mage::helper('customfields')->__(ucwords($field)),
        'input'    => 'text',
        'source'   => '',
        'visible'  => true,
        'required' => false,
        'default' => '',
        'frontend' => '',
        'unique'     => false,
        'note'       => ''
        )
    );

    $attribute   = Mage::getSingleton('eav/config')->getAttribute('customer', $field);

    $used_in_forms=array();

    $used_in_forms[]='adminhtml_customer';
    $used_in_forms[]='checkout_register';
    $used_in_forms[]='customer_account_create';
    $used_in_forms[]='customer_account_edit';
    $used_in_forms[]='adminhtml_checkout';
    $attribute->setData('used_in_forms', $used_in_forms)
    ->setData('is_used_for_customer_segment', true)
    ->setData('is_system', 0)
    ->setData('is_user_defined', 1)
    ->setData('is_visible', 1)
    ->setData('sort_order', 100)
    ;
    $attribute->save();
}


$installer->endSetup();
