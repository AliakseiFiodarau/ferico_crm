<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * String constants for Company model table.
     */
    public const TABLE_NAME = 'companies';
    public const COLUMN_NAME = 'name';
    public const COLUMN_EMAIL = 'email';
    public const COLUMN_PHONE = 'phone';
    public const COLUMN_URL = 'url';
    public const COLUMN_LOGO = 'logo';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_EMAIL,
        self::COLUMN_PHONE,
        self::COLUMN_URL,
        self::COLUMN_LOGO,
    ];

    public function employees(): HasMany {
        return $this->hasMany(
            Employee::class,
            Employee::COLUMN_COMPANY_ID,
            'id'
        );
    }
}
