<?php

namespace YarkHQ\LaravelUuidModel;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid() {
        static::creating(function($model) {
            if(!$model->uuid) {
                $model->{$model->uuidColumn ?? 'uuid'} = Str::uuid();
            }
        });
    }

    public function getRouteKeyName()
    {
        return $this->routeKeyName ?? 'uuid';
    }
}
