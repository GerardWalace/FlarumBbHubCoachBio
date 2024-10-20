import app from 'flarum/forum/app';
import { extend } from 'flarum/common/extend';
import UserCard from 'flarum/forum/components/UserCard';
import CoachBio from './components/CoachBio';

export { default as extend } from './extend';

app.initializers.add('gerardwalace/flarum-bb-hub-coach-bio', () => {
  extend(UserCard.prototype, 'infoItems', function (items) {
    const user = this.attrs.user;
    if (user) {
      items.add('coachBio', <CoachBio user={user} />);
    }
  });
});
