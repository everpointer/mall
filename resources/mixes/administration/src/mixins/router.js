import Dashboard from '../pages/Dashboard';
import Layout from '../layouts/Layout';

export default function (injection) {
    injection.useModuleRoute([
        {
            children: [
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Dashboard,
                    path: '/',
                },
            ],
            component: Layout,
            path: '/shop',
        },
    ]);
}
