<?php

/*
 * This file is part of gerardwalace/flarum-bb-hub-coach-bio.
 *
 * Copyright (c) 2024 Gerard Walace.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace GerardWalace\FlarumBbHubCoachBio;

use Flarum\Api\Resource;
use Flarum\Api\Schema;
use Flarum\Extend;
use Flarum\User\User;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js')
        ->css(__DIR__ . '/less/forum.less'),

    // Ressources API pour les Teams et les Races.
    // Les endpoints Index/Show génèrent automatiquement les routes
    // /api/teams, /api/teams/{id}, /api/bb_races et /api/bb_races/{id}.
    new Extend\ApiResource(Api\Resource\TeamResource::class),
    new Extend\ApiResource(Api\Resource\BbRaceResource::class),

    // On met à jour le model des User pour rajouter les Teams.
    (new Extend\Model(User::class))
        ->hasMany('teams', Team::class, 'coach_id'),

    // On rajoute la relation teams au UserResource et on l'inclut par défaut
    // sur l'endpoint show (profil utilisateur).
    (new Extend\ApiResource(Resource\UserResource::class))
        ->fields(fn () => [
            Schema\Relationship\ToMany::make('teams')
                ->type('teams')
                ->includable(),
        ])
        ->endpoint('show', function ($endpoint) {
            return $endpoint->addDefaultInclude(['teams', 'teams.race']);
        }),

    // Includes par défaut sur l'affichage des discussions (UserCard dans les posts).
    (new Extend\ApiResource(Resource\DiscussionResource::class))
        ->endpoint('show', function ($endpoint) {
            return $endpoint->addDefaultInclude(['posts.user.teams', 'posts.user.teams.race']);
        }),
];
