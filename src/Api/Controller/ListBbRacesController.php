<?php

namespace GerardWalace\FlarumBbHubCoachBio\Api\Controller;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use GerardWalace\FlarumBbHubCoachBio\Api\Serializer\BbRaceSerializer;
use GerardWalace\FlarumBbHubCoachBio\BbRace;

class ListBbRacesController extends AbstractListController
{
    /**
     * {@inheritdoc}
     */
    public $serializer = BbRaceSerializer::class;

    /**
     * {@inheritdoc}
     */
    protected function data(ServerRequestInterface $request, Document $document)
    {
        return BbRace::all();
    }
}
