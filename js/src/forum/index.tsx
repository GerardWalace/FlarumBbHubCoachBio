import app from 'flarum/forum/app';
import { extend } from 'flarum/common/extend';
import UserCard from 'flarum/forum/components/UserCard';
import CoachBio from './components/CoachBio';

app.initializers.add('gerardwalace/flarum-react-zoom-pan-pitch', () => {
  extend(UserCard.prototype, 'infoItems', function (items) {
    const user = this.attrs.user;
    if (user) {
      items.add('coachBio', <CoachBio user={user} />);
    }
  });
});
