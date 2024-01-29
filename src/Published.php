<?php

namespace Creode\NovaPublishable;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Http\Requests\NovaRequest;

class Published extends Boolean
{
    /**
     * The field's component.
     */
    public $component = 'nova-publishable';

    /**
     * Date format to use when saving model.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param  string  $requestAttribute
     * @param  \Illuminate\Database\Eloquent\Model|\Laravel\Nova\Support\Fluent  $model
     * @param  string  $attribute
     * @return void
     */
    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        // If we already have a value, don't overwrite it.
        if ($request[$requestAttribute] == 1 && $model->isPublished()) {
            return;
        }

        // Check if we have changed the value.
        if (isset($request[$requestAttribute])) {
            $model->{$attribute} = $request[$requestAttribute] == 1
                    ? now()->format($this->dateFormat) : null;
        }
    }
}
