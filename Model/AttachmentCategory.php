<?php


namespace LizardMedia\ProductAttachment\Model;

use Magento\Framework\Data\OptionSourceInterface;

class AttachmentCategory implements OptionSourceInterface
{
    const categories = [1 => 'Drawing', 2 => 'Datasheet', 3 => 'MSDS'];

    public function toOptionArray()
    {
        $options = [];
        foreach (self::categories as $id => $label) {
            $options[] = ['value' => $id, 'label' => (string)__($label)];
        }
        return $options;
    }
}