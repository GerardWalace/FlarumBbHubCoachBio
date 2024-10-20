<?php

namespace GerardWalace\FlarumBbHubCoachBio\Api\Controller;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use GerardWalace\FlarumBbHubCoachBio\Api\Serializer\TeamSerializer;
use GerardWalace\FlarumBbHubCoachBio\Team;

class ListTeamsController extends AbstractListController
{
    /**
     * {@inheritdoc}
     */
    public $serializer = TeamSerializer::class;

    // The relationships that are included by default.
    public $include = ['race'];

    /**
     * {@inheritdoc}
     */
    protected function data(ServerRequestInterface $request, Document $document)
    {
        return Team::all();
    }
}
