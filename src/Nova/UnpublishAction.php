<?php

namespace Creode\NovaPublishable\Nova;

use Illuminate\Database\Eloquent\Model;

class UnpublishAction extends PublishableActionAbstract
{
    /**
     * {@inheritdoc}
     */
    public $name = 'Unpublish';

    /**
     * {@inheritdoc}
     */
    protected function process(Model $model): void {
        $model->unpublish();
    }

    /**
     * {@inheritdoc}
     */
    protected function getActionName(): string {
        return 'Unpublished';
    }
}
