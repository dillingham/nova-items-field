<?php

namespace NovaItemsField;

use Laravel\Nova\Fields\Field;

class Items extends Field
{
    public $items = [];
    public $component = 'nova-items-field';
    public $placeholder = "Add a new item";
    public $inputType = 'text';
    public $max = false;
    public $fullWidth = false;
    public $maxHeight = false;
    public $draggable = false;
    public $createButtonValue = "Add";
    public $deleteButtonValue = "x";
    public $listFirst = false;
    public $detailItemComponent = 'detail-nova-items-field-item';

    public function resolve($resource, $attribute = null)
    {
        parent::resolve($resource, $attribute);

        $this->withMeta([
            'max' => $this->max,
            'items' => $this->items,
            'listFirst' => $this->listFirst,
            'inputType' => $this->inputType,
            'draggable' => $this->draggable,
            'fullWidth' => $this->fullWidth,
            'maxHeight' => $this->maxHeight,
            'placeholder' => $this->placeholder,
            'createButtonValue' => $this->createButtonValue,
            'deleteButtonValue' => $this->deleteButtonValue,
            'detailItemComponent' => $this->detailItemComponent,
        ]);
    }

    public function rules($rules)
    {
        if (!is_array($rules)) {
            abort(500, 'Nova Items Field requires array of validation rules');
        }
        
        $this->rules = [ new ArrayRules($rules) ];

        return $this;
    }
    
    public function values($values)
    {
        if (is_array($values) && count($values)) {
            $this->items = $values;
        }
        
        return $this;
    }

    public function max($max)
    {
        $this->max = $max;
        
        return $this;
    }

    public function inputType($inputType)
    {
        $this->inputType = $inputType;
        
        return $this;
    }

    public function fullWidth($fullWidth = true)
    {
        $this->fullWidth = $fullWidth;
        
        return $this;
    }

    public function maxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    public function draggable($draggable = true)
    {
        $this->draggable = $draggable;
        
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

    public function detailItemComponent($detailItemComponent)
    {
        $this->detailItemComponent = $detailItemComponent;

        return $this;
    }
}
