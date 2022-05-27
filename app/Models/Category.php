<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'categories',
    ];

    /**
     * The companies that belong to the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public static function getCompanies($categoryId)
    {
        $companies = Category::findOrFail($categoryId)->companies()->pluck('name');

        return $companies;
    }
}
