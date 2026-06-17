<?php

/*
 * This file is part of gerardwalace/flarum-bb-hub-coach-bio.
 *
 * Copyright (c) 2024 Gerard Walace.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace GerardWalace\FlarumBbHubCoachBio\Api\Resource;

use Flarum\Api\Endpoint;
use Flarum\Api\Resource\AbstractDatabaseResource;
use Flarum\Api\Schema;
use GerardWalace\FlarumBbHubCoachBio\Team;

class TeamResource extends AbstractDatabaseResource
{
    public function type(): string
    {
        return 'teams';
    }

    public function model(): string
    {
        return Team::class;
    }

    public function endpoints(): array
    {
        return [
            Endpoint\Index::make(),
            Endpoint\Show::make(),
        ];
    }

    public function fields(): array
    {
        return [
            Schema\Integer::make('coach_id'),
            Schema\Str::make('team_nom'),
            Schema\Integer::make('race_id'),
            Schema\Relationship\ToOne::make('race')
                ->type('bb_races')
                ->includable(),
        ];
    }
}
