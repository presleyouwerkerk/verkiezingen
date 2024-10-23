<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'party_candidates')
            ->withPivot('position', 'election_type_id')
            ->withTimestamps();
    }

    public function elections()
    {
        return $this->belongsToMany(Election::class, 'election_party')->withTimestamps();
    }
}
