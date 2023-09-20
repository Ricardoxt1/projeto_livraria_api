<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['library_id', 'name', 'pis', 'office', 'departament'];

    /**
     * Retrieve the library where this employee is located.
     * @return BelongsTo
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
