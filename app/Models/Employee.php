<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'position', 'address', 'gender', 'status', 'photo_url'
    ];

    public function galleries()
    {
        return $this->hasMany(GalleryEmployee::class, 'employee_id', 'id');
    }
}
