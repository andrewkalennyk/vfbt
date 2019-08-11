<?php

namespace Annyk\CheckboxDependent;

use Laravel\Nova\Fields\Boolean;

class CheckboxDependent extends Boolean
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'checkbox-dependent';

    public function depends($attribute)
    {
        $this->withMeta(['parent_attribute' => $attribute]);
        return $this;
    }

    public function get($endpoint)
    {

        $this->withMeta(['endpoint' => $endpoint]);

        return $this;
    }
}
