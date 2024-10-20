<?php

namespace GerardWalace\FlarumBbHubCoachBio\Api\Controller;

use Flarum\Api\Controller\AbstractShowController;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use GerardWalace\FlarumBbHubCoachBio\Api\Serializer\BbRaceSerializer;
use GerardWalace\FlarumBbHubCoachBio\BbRace;

class ShowBbRaceController extends AbstractShowController
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
        $modelId = Arr::get($request->getQueryParams(), 'id');

        $model = BbRace::findOrFail($modelId);

        return $model;
    }
}
