<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
    /**
     * Boot function to assign UUIDs to new models.
     */
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    /**
     * Set the key type and incrementing properties.
     */
    public function initializeUsesUuid()
    {
        $this->keyType = 'string';
        $this->incrementing = false;
    }
}
