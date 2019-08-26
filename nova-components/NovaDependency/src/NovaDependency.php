<?php

namespace Annyk\NovaDependency;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class NovaDependency extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-dependency';

    public $showOnIndex = false;

    public function __construct($fields, $attribute = null, $resolveCallback = null)
    {
        parent::__construct('', $attribute, $resolveCallback);

        $this->withMeta(['fields' => $fields]);
        $this->withMeta(['dependencies' => []]);
    }

    public function dependsOn($field, $value)
    {
        return $this->withMeta([
            'dependencies' => array_merge($this->meta['dependencies'], [['field' => $field, 'value' => $value]])
        ]);
    }

    public function dependsOnNotEmpty($field)
    {
        return $this->withMeta([
            'dependencies' => array_merge($this->meta['dependencies'], [['field' => $field, 'notEmpty' => true]])
        ]);
    }

    public function dependsOnFalse($field, $value)
    {
        return $this->withMeta([
            'dependencies' => array_merge($this->meta['dependencies'], [['field' => $field, 'falseValue' => $value]])
        ]);
    }

    public function dependsInArray($field, $array)
    {
        return $this->withMeta([
            'dependencies' => array_merge($this->meta['dependencies'], [['field' => $field, 'arrayValues' => $array]])
        ]);
    }

    public function resolveForDisplay($resource, $attribute = null)
    {
        parent::resolveForDisplay($resource, $attribute);

        foreach ($this->meta['dependencies'] as $index => $dependency) {
            if (array_key_exists('notEmpty', $dependency) && !empty($resource->{$dependency['field']})) {
                $this->meta['dependencies'][$index]['satisfied'] = true;
            }

            if (array_key_exists('value', $dependency) && $dependency['value'] == $resource->{$dependency['field']}) {
                $this->meta['dependencies'][$index]['satisfied'] = true;
            }

            if (array_key_exists('falseValue', $dependency) && $dependency['falseValue'] !== $resource->{$dependency['field']}) {
                $this->meta['dependencies'][$index]['satisfied'] = true;
            }

            /*if (array_key_exists('falseArray', $dependency) && $dependency['falseArray'] !== $resource->{$dependency['field']}) {
                $this->meta['dependencies'][$index]['satisfied'] = true;
            }*/
        }
    }

    protected function resolveAttribute($resource, $attribute)
    {
        foreach ($this->meta['fields'] as $field) {
            $field->resolve($resource);
        }

        return [];
    }

    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        foreach ($this->meta['fields'] as $field) {
            $field->fill($request, $model);
        }
    }

}
