<?php

// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Mass Assignment এর অনুমতির জন্য fillable প্রোপার্টি
    protected $fillable = [
        'name', // প্রোজেক্টের নাম
        'description', // প্রোজেক্টের বিবরণ (যদি প্রয়োজন হয়)
    ];
}
