export default function (injection) {
    injection.useSidebar('mall', [
        {
            children: [
                {
                    path: '/mall/goods',
                    title: '信息列表',
                },
                {
                    path: '/mall/goods/category',
                    title: '分类管理',
                },
                {
                    path: '/mall/goods/type',
                    title: '类型管理',
                },
                {
                    path: '/mall/goods/standard',
                    title: '规格管理',
                },
            ],
            icon: 'plus',
            title: '商品',
        },
        {
            children: [
                {
                    path: '/mall/store',
                    title: '店铺管理',
                },
                {
                    path: '/mall/store/level',
                    title: '店铺等级',
                },
                {
                    path: '/mall/store/category',
                    title: '店铺分类',
                },
                {
                    path: '/mall/store/dynamics',
                    title: '店铺动态',
                },
            ],
            icon: 'plus',
            title: '店铺',
        },
        {
            children: [
                {
                    path: '/mall/order',
                    title: '商品订单',
                },
                {
                    path: '/mall/order/refund',
                    title: '退款管理',
                },
                {
                    path: '/mall/order/rejected',
                    title: '退货管理',
                },
                {
                    path: '/mall/order/evaluation',
                    title: '评价管理',
                },
                {
                    path: '/mall/order/complain',
                    title: '投诉管理',
                },
            ],
            icon: 'plus',
            title: '订单',
        },
        {
            children: [],
            icon: 'plus',
            title: '运营',
        },
        {
            children: [
                {
                    path: '/mall/statistics',
                    title: '概述及设置',
                },
                {
                    path: '/mall/statistics/analysis',
                    title: '行业分析',
                },
                {
                    path: '/mall/statistics/member',
                    title: '会员统计',
                },
                {
                    path: '/mall/statistics/store',
                    title: '店铺统计',
                },
                {
                    path: '/mall/statistics/sales',
                    title: '销量分析',
                },
                {
                    path: '/mall/statistics/goods',
                    title: '商品分析',
                },
                {
                    path: '/mall/statistics/aftersales',
                    title: '售后分析',
                },
            ],
            icon: 'plus',
            title: '统计',
        },
        {
            children: [
                {
                    path: '/mall/sales/activity',
                    title: '秒杀活动',
                },
            ],
            icon: 'plus',
            title: '促销',
        },
        {
            children: [
                {
                    path: '/mall/configuration',
                    title: '商城设置',
                },
                {
                    path: '/mall/configuration/search',
                    title: '搜索设置',
                },
                {
                    path: '/mall/configuration/advertisement',
                    title: '广告设置',
                },
                {
                    path: '/mall/configuration/image',
                    title: '图片设置',
                },
                {
                    path: '/mall/configuration/message',
                    title: '消息通知',
                },
            ],
            icon: 'plus',
            title: '设置',
        },
    ]);
}
