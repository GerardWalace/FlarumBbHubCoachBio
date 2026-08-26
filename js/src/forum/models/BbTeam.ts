import Model from 'flarum/common/Model';
import BbRace from './BbRace';

export default class BbTeam extends Model {
  team_nom = Model.attribute<string>('team_nom');
  race = Model.hasOne<BbRace>('race');
}
