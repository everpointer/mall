export default function (injection) {
    injection.useSidebar('shop', [
        {
            children: [
                {
                    path: '/shop/goods',
                    title: '信息列表',
                },
                {
                    path: '/shop/goods/category',
                    title: '分类管理',
                },
                {
                    path: '/shop/goods/type',
                    title: '类型管理',
                },
                {
                    path: '/shop/goods/standard',
                    title: '规格管理',
                },
            ],
            icon: 'plus',
            title: '商品',
        },
        {
            children: [
                {
                    path: '/shop/store',
                    title: '店铺管理',
                },
                {
                    path: '/shop/store/level',
                    title: '店铺等级',
                },
                {
                    path: '/shop/store/category',
                    title: '店铺分类',
                },
                {
                    path: '/shop/store/dynamics',
                    title: '店铺动态',
                },
            ],
            icon: 'plus',
            title: '店铺',
        },
        {
            children: [
                {
                    path: '/shop/order',
                    title: '商品订单',
                },
                {
                    path: '/shop/order/refund',
                    title: '退款管理',
                },
                {
                    path: '/shop/order/rejected',
                    title: '退货管理',
                },
                {
                    path: '/shop/order/evaluation',
                    title: '评价管理',
                },
                {
                    path: '/shop/order/complain',
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
                    path: '/shop/statistics',
                    title: '概述及设置',
                },
                {
                    path: '/shop/statistics/analysis',
                    title: '行业分析',
                },
                {
                    path: '/shop/statistics/member',
                    title: '会员统计',
                },
                {
                    path: '/shop/statistics/store',
                    title: '店铺统计',
                },
                {
                    path: '/shop/statistics/sales',
                    title: '销量分析',
                },
                {
                    path: '/shop/statistics/goods',
                    title: '商品分析',
                },
                {
                    path: '/shop/statistics/aftersales',
                    title: '售后分析',
                },
            ],
            icon: 'plus',
            title: '统计',
        },
        {
            children: [],
            icon: 'plus',
            title: '促销',
        },
        {
            children: [
                {
                    path: '/shop/configuration',
                    title: '商城设置',
                },
                {
                    path: '/shop/configuration/search',
                    title: '搜索设置',
                },
                {
                    path: '/shop/configuration/advertisement',
                    title: '广告设置',
                },
                {
                    path: '/shop/configuration/image',
                    title: '图片设置',
                },
            ],
            icon: 'plus',
            title: '设置',
        },
    ]);
}
