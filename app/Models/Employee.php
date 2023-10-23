<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    /**
     * String constants for Company model table.
     */
    public const TABLE_NAME = 'employees';
    public const COLUMN_FIRST_NAME = 'first_name';
    public const COLUMN_LAST_NAME = 'last_name';
    public const COLUMN_COMPANY_ID = 'company_id';
    public const COLUMN_EMAIL = 'email';
    public const COLUMN_PHONE = 'phone';
    public const COLUMN_NOTE = 'note';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_FIRST_NAME,
        self::COLUMN_LAST_NAME,
        self::COLUMN_COMPANY_ID,
        self::COLUMN_EMAIL,
        self::COLUMN_PHONE,
        self::COLUMN_NOTE,
    ];

    public function company(): BelongsTo {
        return $this->belongsTo(Company::class);
    }
}
