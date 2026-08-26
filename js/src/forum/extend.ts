import Extend from 'flarum/common/extenders';
import User from 'flarum/common/models/User';
import BbTeam from './models/BbTeam';
import BbRace from './models/BbRace';

export default [
    new Extend.Store()
        .add('bb_teams', BbTeam)
        .add('bb_races', BbRace),
        
    new Extend.Model(User)
        .hasMany<BbTeam>('teams'),
];
