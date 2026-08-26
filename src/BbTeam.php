<?php

namespace GerardWalace\FlarumBbHubCoachBio;

use Flarum\Database\AbstractModel;

class BbTeam extends AbstractModel
{
    protected $table = 'bb_teams';
    protected $primaryKey = 'team_id';
    public $timestamps = false;

    public function race()
    {
        return $this->belongsTo(BbRace::class, 'race_id');
    }
}
