import Model from 'flarum/common/Model';
import BbRace from './BbRace';

export default class Team extends Model {
  team_nom = Model.attribute<string>('team_nom');
  race = Model.hasOne<BbRace>('race');
}
