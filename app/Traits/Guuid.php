<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GuuId
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (! $model->getKey()) {
                $guidStr = (string) Str::uuid();
                $model->{$model->getKeyName()} = $guidStr;
            }
        });
        
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}