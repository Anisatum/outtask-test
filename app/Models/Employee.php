<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    /**
     * Get all the employers of the employee
     */
    public function employers(): BelongsToMany
    {
        return $this->belongsToMany(Employer::class, 'contracts');
    }

    /**
     * Get all the employees of the employer
     */
    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
