<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function verificationLogs()
    {
        return $this->hasMany(VerificationLog::class);
    }
}
