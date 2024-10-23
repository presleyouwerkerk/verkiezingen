<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Election extends Model
{
    protected $fillable = [
        'election_type_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function getStatusAttribute()
    {
        $now = Carbon::now();

        if ($this->start_date > $now) {
            return 'upcoming';
        } elseif ($this->end_date < $now) {
            return 'finished';
        } else {
            return 'pending';
        }
    }

    public function electionType()
    {
        return $this->belongsTo(ElectionType::class);
    }

    public function parties()
    {
        return $this->belongsToMany(Party::class, 'election_party')->withTimestamps();
    }
    
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'election_candidates')->withTimestamps();
    }
}
