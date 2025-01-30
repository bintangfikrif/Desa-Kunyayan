<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statistics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_population',
        'total_families',
        'total_males',
        'total_females',
        'islam',
        'christian',
        'catholic',
        'hindu',
        'buddha',
        'konghucu',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'total_population' => 'integer',
        'total_families' => 'integer',
        'total_males' => 'integer',
        'total_females' => 'integer',
        'islam' => 'integer',
        'christian' => 'integer',
        'catholic' => 'integer',
        'hindu' => 'integer',
        'buddha' => 'integer',
        'konghucu' => 'integer',
    ];
}
