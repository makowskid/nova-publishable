<?php

namespace Creode\NovaPublishable\Nova;

use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Database\Eloquent\Model;

abstract class PublishableActionAbstract extends Action
{
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $this->process($model);
        }

        $actionName = $this->getActionName();
        return Action::message("Successfully $actionName (" . $model->count() . ') ' . $model->first()->getTable());
    }

    /**
     * Perform an action on the provided model.
     *
     * @param Model $model
     * @return void
     */
    abstract protected function process(Model $model): void;

    /**
     * Gets the name of the action.
     *
     * @return string
     */
    abstract protected function getActionName(): string;
}
