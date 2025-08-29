<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

abstract class Setting extends Model
{
    protected $table = 'settings';

    protected function casts(): array
    {
        return [
            'value' => 'json',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            if (is_null($model->model)) {
                $model->model = static::class;
            }
        });
    }
}
