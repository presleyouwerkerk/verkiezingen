<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parties()
    {
        return $this->belongsToMany(Party::class, 'party_candidates')
            ->withPivot('position', 'election_type_id')
            ->withTimestamps();
    }

    public function elections()
{
    return $this->belongsToMany(Election::class, 'election_candidate')->withTimestamps();
}

}
