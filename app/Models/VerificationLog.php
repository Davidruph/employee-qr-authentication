<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationLog extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected $fillable = [
        'employee_id',
        'ip_address',
        'user_agent',
        'scanned_at',
    ];
}
