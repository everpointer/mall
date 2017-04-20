import Dashboard from '../pages/Dashboard.vue';
import Layout from '../layouts/Layout.vue';

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
