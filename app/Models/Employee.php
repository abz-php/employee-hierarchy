<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'chief_id', 'first_name', 'last_name', 'middle_name', 'position', 'employment_date', 'income_monthly'
    ];

    public function chief()
    {
        return $this->belongsTo('App\Models\Employee','chief_id');
    }

    public function chiefRecursive()
    {
        return $this->chief()->with('chiefRecursive');
    }

    public function subordinates()
    {
        return $this->hasMany('App\Models\Employee', 'chief_id');
    }

    public function subordinatesRecursive()
    {
        return $this->subordinates()->with('subordinatesRecursive');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }
}
