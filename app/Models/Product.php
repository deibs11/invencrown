<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'expire_date',
        'min_stock',
        'stock',
        'brand',
    ];

    public function getExpireDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function setExpireDateAttribute($value)
    {
        $this->attributes['expire_date'] = \Carbon\Carbon::createFromFormat('Y-m-d', $value);
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }
}
