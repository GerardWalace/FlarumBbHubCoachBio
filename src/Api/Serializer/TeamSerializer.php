<?php

namespace GerardWalace\FlarumBbHubCoachBio\Api\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use GerardWalace\FlarumBbHubCoachBio\BbRace;
use GerardWalace\FlarumBbHubCoachBio\Team;
use InvalidArgumentException;

class TeamSerializer extends AbstractSerializer
{
    /**
     * {@inheritdoc}
     */
    protected $type = 'teams';

    /**
     * {@inheritdoc}
     */
    public function getId($model)
    {
        return $model->team_id;
    }

    /**
     * {@inheritdoc}
     *
     * @param T $model
     * @throws InvalidArgumentException
     */
    protected function getDefaultAttributes($model)
    {
        if (!($model instanceof Team)) {
            throw new InvalidArgumentException(
                get_class($this) . ' can only serialize instances of ' . Team::class
            );
        }

        return [
            'coach_id' => $model->coach_id,
            'team_nom' => $model->team_nom,
            'race_id' => $model->race_id,
        ];
    }

    protected function race($team)
    {
        return $this->hasOne($team, BbRaceSerializer::class);
    }
}
