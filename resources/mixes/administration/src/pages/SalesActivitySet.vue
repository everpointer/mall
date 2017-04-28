<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                columns5: [
                    {
                        title: '编号',
                        key: 'num',
                        width: 130,
                        align: 'center',
                    },
                    {
                        title: '秒杀时段名称',
                        key: 'spike',
                    },
                    {
                        title: '每日开始时间',
                        key: 'startTime',
                    },
                    {
                        title: '每日结束时间',
                        key: 'endTime',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">+设置商品</i-button>';
                        },
                    },
                ],
                salesSet: [
                    {
                        num: '001',
                        spike: '午夜场',
                        startTime: '2016-02-15',
                        endTime: '2017-12-27',
                        action: '',
                    },
                    {
                        num: '002',
                        spike: '午夜场',
                        startTime: '2016-02-15',
                        endTime: '2017-12-27',
                    },
                    {
                        num: '003',
                        spike: '午夜场',
                        startTime: '2016-02-15',
                        endTime: '2017-12-27',
                    },
                    {
                        num: '004',
                        spike: '午夜场',
                        startTime: '2016-02-15',
                        endTime: '2017-12-27',
                    },
                    {
                        num: '005',
                        spike: '午夜场',
                        startTime: '2016-02-15',
                        endTime: '2017-12-27',
                    },

                ],
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            addGoods() {},
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="sales-activity-set">
            <div class="edit-link-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—设置商品</span>
            </div>
           <card :bordered="false">
               <i-table highlight-row :columns="columns5"
                    :data="salesSet"></i-table>
           </card>
        </div>
    </div>
</template>
