import app from 'flarum/forum/app';
import { extend } from 'flarum/common/extend';
import UserCard from 'flarum/forum/components/UserCard';
import CoachBio from './components/CoachBio';
import User from 'flarum/common/models/User';

export { default as extend } from './extend';

app.initializers.add('gerardwalace/flarum-bb-hub-coach-bio', () => {
  extend(UserCard.prototype, 'infoItems', function (items) {
    const user = this.attrs?.user as User;
    if (user) {
      items.add('coachBio', <CoachBio user={user} />);
    }
  });

  // Écouter quand l'utilisateur revient à l'onglet
  document.addEventListener('visibilitychange', () => {
    if (!document.hidden) {
      // La page devient visible (utilisateur revient à l'onglet)
      console.log('L\'utilisateur est revenu à l\'onglet. Actualisation des discussions...');
      app.discussions.refresh().then(() => {
      m.redraw();
      });
    }
  });
});