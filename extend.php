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

use Flarum\Api\Controller\ListUsersController;
use Flarum\Api\Controller\ShowDiscussionController;
use Flarum\Api\Controller\ShowUserController;
use Flarum\Api\Serializer\UserSerializer;
use Flarum\Extend;
use Flarum\User\User;
use GerardWalace\FlarumBbHubCoachBio\Api\Serializer\TeamSerializer;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__ . '/js/dist/forum.js')
        ->css(__DIR__ . '/less/forum.less'),

    // On rajoute les api pour requeter les Teams
    (new Extend\Routes('api'))
        ->get('/teams', 'teams.index', Api\Controller\ListTeamsController::class)
        ->get('/teams/{id}', 'teams.show', Api\Controller\ShowTeamController::class),

    // On rajoute les api pour requeter les Races
    (new Extend\Routes('api'))
        ->get('/bb_races', 'bb_races.index', Api\Controller\ListBbRacesController::class)
        ->get('/bb_races/{id}', 'bb_races.show', Api\Controller\ShowBbRaceController::class),

    // On met à jour le model des User pour rajouter les Teams
    (new Extend\Model(User::class))
        ->hasMany('teams', Team::class, 'coach_id'),

    // On met a jour le serializer des User pour rajouter les Teams
    (new Extend\ApiSerializer(UserSerializer::class))
        ->hasMany('teams', TeamSerializer::class),

    // On met à jour l'API show
    (new Extend\ApiController(ShowUserController::class))
        ->addInclude('teams')
        ->addInclude('teams.race')
        ->prepareDataForSerialization(function ($controller, $data) {
            $data->load('teams');
        }),

    // On met à jour l'API show des discussions
    (new Extend\ApiController(ShowDiscussionController::class))
        ->addInclude('posts.user.teams')
        ->addInclude('posts.user.teams.race'),
];
