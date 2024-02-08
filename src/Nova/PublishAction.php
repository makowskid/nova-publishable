<?php

namespace Creode\NovaPublishable\Nova;

use Illuminate\Database\Eloquent\Model;

class PublishAction extends PublishableActionAbstract
{
    /**
     * {@inheritdoc}
     */
    public $name = 'Publish';

    /**
     * {@inheritdoc}
     */
    protected function process(Model $model): void
    {
        $model->publish();
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName(): string
    {
        return 'Published';
    }
}
