import Component from 'flarum/common/Component';

import BbTeam from '../models/BbTeam';
import User from 'flarum/common/models/User';

export default class CoachBio extends Component {
  view() {
    const user = this.attrs?.user as User;
    const teams = user?.teams() as BbTeam[];

    let placeholder = (<div className="CoachBio"></div>);
    if (teams && teams.length > 0) {
      const team = teams[0];
      const race = team.race();
      placeholder = (
        <div className="CoachBio">
          <a className="CoachBio-team" href={`https://www.lutececup.org/index.php?page=15&team_id=${team.id()}`} title="Voir le roster">
            <object class="Avatar" data={`https://www.lutececup.org/img/blason/blason_${team.id()}.jpg`} type="image/jpg">
              <img class="Avatar" src={`https://www.lutececup.org/img/logo/race_${race ? race.id() : ''}.gif`} />
            </object>
            <span>{team.team_nom()}</span>
            <span>({race ? race.race_nom() : ''})</span>
          </a>
        </div>
      );
    }

    return placeholder;
  }
}
