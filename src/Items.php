<?php

namespace NovaItemsField;

use Laravel\Nova\Fields\Field;

class Items extends Field
{
    public $items = [];
    public $component = 'nova-items-field';
    public $placeholder = "Add a new item";
    public $inputType = 'text';
    public $createButtonValue = "Add";
    public $deleteButtonValue = "x";
    public $listFirst = false;

    public function resolve($resource, $attribute = null)
    {
        parent::resolve($resource, $attribute);

        $this->withMeta([
            'items' => $this->items,
            'listFirst' => $this->listFirst,
            'inputType' => $this->inputType,
            'placeholder' => $this->placeholder,
            'createButtonValue' => $this->createButtonValue,
            'deleteButtonValue' => $this->deleteButtonValue,
        ]);
    }
    
    public function values($values)
    {
        if (is_array($values) && count($values)) {
            $this->items = $values;
        }
        
        return $this;
    }

    public function inputType($inputType)
    {
        $this->inputType = $inputType;
        
        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
        
        return $this;
    }

    public function listFirst($listFirst = true)
    {
        $this->listFirst = $listFirst;
        
        return $this;
    }

    public function deleteButtonValue($deleteButtonValue)
    {
        $this->deleteButtonValue = $deleteButtonValue;
        
        return $this;
    }

    public function createButtonValue($createButtonValue)
    {
        $this->createButtonValue = $createButtonValue;
        
        return $this;
    }
}
