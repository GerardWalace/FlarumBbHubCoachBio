import Component from 'flarum/common/Component';

import Team from '../models/Team';
import User from 'flarum/common/models/User';

export default class CoachBio extends Component {
  view() {
    const user = this.attrs.user as User;
    const teams = user.teams() as Team[];

    let placeholder = <div className="CoachBio"></div>;
    if (teams && teams.length > 0) {
      const team = teams[0];
      const race = team.race();
      placeholder = (
        <div className="CoachBio">
          <a className="CoachBio-team" href={`https://www.lutececup.org/index.php?page=15&team_id=${team.id()}`} title="Voir le roster">
            <img loading="eager" class="Avatar" src={`https://www.lutececup.org/img/blason/blason_${team.id()}.jpg`} alt="Blason" />
            <span>{team.team_nom()}</span>
            <span>({race ? race.race_nom() : ''})</span>
          </a>
        </div>
      );
    }

    return placeholder;
  }
}
