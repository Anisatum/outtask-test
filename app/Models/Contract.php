<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contract extends Model
{
    use HasFactory;

    /**
     * Get the employer associated with the contract.
     */
    public function employer(): HasOne
    {
        return $this->hasOne(Employer::class);
    }

    /**
     * Get the employee associated with the contract.
     */
    public function employee(): HasOne
    {
        return $this->hasOne(Employee::class);
    }
}
