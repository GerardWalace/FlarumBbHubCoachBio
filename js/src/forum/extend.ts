import Extend from 'flarum/common/extenders';
import User from 'flarum/common/models/User';
import Team from './models/Team';
import BbRace from './models/BbRace';

export default [
    new Extend.Store()
        .add('bb_races', BbRace)
        .add('teams', Team),
        
    new Extend.Model(User)
        .hasMany<Team>('teams'),
];
