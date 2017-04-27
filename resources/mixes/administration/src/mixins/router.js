import Configuration from '../pages/Configuration.vue';
import ConfigurationAdvertisement from '../pages/ConfigurationAdvertisement.vue';
import ConfigurationImage from '../pages/ConfigurationImage.vue';
import ConfigurationSearch from '../pages/ConfigurationSearch.vue';
import Dashboard from '../pages/Dashboard.vue';
import Goods from '../pages/Goods.vue';
import GoodsCategory from '../pages/GoodsCategory.vue';
import GoodsStandard from '../pages/GoodsStandard.vue';
import GoodsType from '../pages/GoodsType.vue';
import Layout from '../layouts/Layout.vue';
import Order from '../pages/Order.vue';
import OrderComplain from '../pages/OrderComplain.vue';
import OrderEvaluation from '../pages/OrderEvaluation.vue';
import OrderRefund from '../pages/OrderRefund.vue';
import OrderRefundProcess from '../pages/OrderRefundProcess.vue';
import OrderRefundReedit from '../pages/OrderRefundReedit.vue';
import OrderRejected from '../pages/OrderRejected.vue';
import Statistics from '../pages/Statistics.vue';
import StatisticsAftersales from '../pages/StatisticsAftersales.vue';
import StatisticsAnalysis from '../pages/StatisticsAnalysis.vue';
import StatisticsGoods from '../pages/StatisticsGoods.vue';
import StatisticsMember from '../pages/StatisticsMember.vue';
import StatisticsSales from '../pages/StatisticsSales.vue';
import StatisticsStore from '../pages/StatisticsStore.vue';
import Store from '../pages/Store.vue';
import StoreEdit from '../pages/StoreEdit.vue';
import StoreCategory from '../pages/StoreCategory.vue';
import StoreCategorySet from '../pages/StoreCategorySet.vue';
import StoreDynamics from '../pages/StoreDynamics.vue';
import StoreLevel from '../pages/StoreLevel.vue';
import SalesActivity from '../pages/SalesActivity.vue';
import SalesActivitySetAdd from '../pages/SalesActivitySetAdd.vue';
import SalesActivitySet from '../pages/SalesActivitySet.vue';
import SalesActivityTime from '../pages/SalesActivityTime.vue';

export default function (injection) {
    injection.useModuleRoute([
        {
            children: [
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Dashboard,
                    path: '/',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Configuration,
                    path: 'configuration',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: ConfigurationAdvertisement,
                    path: 'configuration/advertisement',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: ConfigurationImage,
                    path: 'configuration/image',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: ConfigurationSearch,
                    path: 'configuration/search',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Goods,
                    path: 'goods',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: GoodsCategory,
                    path: 'goods/category',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: GoodsType,
                    path: 'goods/type',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: GoodsStandard,
                    path: 'goods/standard',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Order,
                    path: 'order',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: OrderComplain,
                    path: 'order/complain',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: OrderEvaluation,
                    path: 'order/evaluation',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: OrderRefund,
                    path: 'order/refund',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: OrderRefundProcess,
                    path: 'order/refund/process',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: OrderRefundReedit,
                    path: 'order/refund/reedit',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: OrderRejected,
                    path: 'order/rejected',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Statistics,
                    path: 'statistics',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StatisticsAftersales,
                    path: 'statistics/aftersales',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StatisticsAnalysis,
                    path: 'statistics/analysis',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StatisticsGoods,
                    path: 'statistics/goods',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StatisticsMember,
                    path: 'statistics/member',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StatisticsSales,
                    path: 'statistics/sales',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StatisticsStore,
                    path: 'statistics/store',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: Store,
                    path: 'store',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StoreEdit,
                    path: 'store/edit',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StoreCategory,
                    path: 'store/category',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StoreCategorySet,
                    path: 'store/category/set',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StoreDynamics,
                    path: 'store/dynamics',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: StoreLevel,
                    path: 'store/level',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: SalesActivity,
                    path: 'sales/activity',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: SalesActivitySetAdd,
                    path: 'sales/activity/set/add',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: SalesActivitySet,
                    path: 'sales/activity/set',
                },
                {
                    beforeEnter: injection.middleware.requireAuth,
                    component: SalesActivityTime,
                    path: 'sales/activity/time',
                },
            ],
            component: Layout,
            path: '/mall',
        },
    ]);
}
