<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $profileImagePath = ($this->profile_image) ?  $this->profile_image : 'http://localhost/geogram/public/storage/profile/qlxebyinOZM1PhJShuykNKssTkfhKYMA8wO88BXg.png';
        return '../storage/' . $profileImagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    
}
