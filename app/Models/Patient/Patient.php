<?php

namespace App\Models\Patient;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasRoles;

    protected $table = 'patients';

    protected $fillable = [
        'user_id', 'dob', 'gender', 'address', 'city', 'state', 'zip_code', 'home_phone', 'cell_phone', 'marital_status', 'register_from',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function healthHistory()
    {
        return $this->hasMany('App\Models\Patient\HealthHistory');
    }
}
