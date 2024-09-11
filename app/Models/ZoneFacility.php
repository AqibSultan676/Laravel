<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'zone',
        'facility_name',
        'item_name',
        'condition',
        'image',
        'comments',
        'user_id',  // Include this field in fillable
    ];

    // Add this relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
