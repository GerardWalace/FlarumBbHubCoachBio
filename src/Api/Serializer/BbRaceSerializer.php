<?php

namespace GerardWalace\FlarumBbHubCoachBio\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use GerardWalace\FlarumBbHubCoachBio\BbRace;
use InvalidArgumentException;

class BbRaceSerializer extends AbstractSerializer
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'bb_races';

    /**
     * {@inheritdoc}
     */
    public function getId($model)
    {
        return $model->race_id;
    }

    /**
     * {@inheritdoc}
     *
     * @param T $model
     * @throws InvalidArgumentException
     */
    protected function getDefaultAttributes($model)
    {
        if (!($model instanceof BbRace)) {
            throw new InvalidArgumentException(
                get_class($this) . ' can only serialize instances of ' . BbRace::class
            );
        }

        return [
            'race_nom' => $model->race_nom,
        ];
    }
}
