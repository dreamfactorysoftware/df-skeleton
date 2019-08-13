<?php

namespace DreamFactory\Core\Git\Models;

use DreamFactory\Core\Models\BaseServiceConfigModel;

class ExampleModel extends BaseServiceConfigModel
{
    /** @var string */
    protected $table = 'db_example';

    /** @var array */
    protected $fillable = [
        'service_id',
        'label',
        'description',
        'is_example'
    ];

    /** @var array */
    protected $casts = [
        'service_id' => 'integer',
    ];
}