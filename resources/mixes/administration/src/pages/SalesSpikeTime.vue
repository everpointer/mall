<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        data() {
            return {
                timeListColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                    },
                    {
                        title: '编号',
                        key: 'number',
                        align: 'center',
                    },
                    {
                        title: '秒杀时段名称',
                        key: 'name',
                        align: 'center',
                    },
                    {
                        title: '每日开始时间',
                        key: 'startTime',
                        align: 'center',
                    },
                    {
                        title: '每日结束时间',
                        key: 'finishTime',
                        align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 140,
                        align: 'center',
                        render(row, column, index) {
                            return `<i-button type="ghost" class="first-btn" size="small" @click="remove(${index})">编辑</i-button><i-button type="ghost" size="small">删除</i-button>`;
                        },
                    },
                ],
                timeListData: [
                    {
                        number: '001',
                        name: '午夜场',
                        startTime: '2016-12-23',
                        finishTime: '2016-12-23',
                    },
                    {
                        number: '001',
                        name: '午夜场',
                        startTime: '2016-12-23',
                        finishTime: '2016-12-23',
                    },
                    {
                        number: '001',
                        name: '午夜场',
                        startTime: '2016-12-23',
                        finishTime: '2016-12-23',
                    },
                    {
                        number: '001',
                        name: '午夜场',
                        startTime: '2016-12-23',
                        finishTime: '2016-12-23',
                    },
                    {
                        number: '001',
                        name: '午夜场',
                        startTime: '2016-12-23',
                        finishTime: '2016-12-23',
                    },
                ],
            };
        },
        methods: {
            addSpikePeriod() {
                const self = this;
                self.$router.push({
                    path: 'time/addtime',
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="sales-activity-time">
            <div class="edit-link-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—设置商品</span>
            </div>
            <div class="store storeBox">
                <div class="prompt-box">
                    <h6>提示</h6>
                    <p>建议设置四至五个时间段（前台显示）</p>
                </div>
                <div class="store-body">
                    <div class="store-body-header">
                        <i-button class="export-btn" @click.natice="addSpikePeriod" type="ghost">+添加秒杀时段</i-button>
                        <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                    </div>
                    <i-table highlight-row class="shop-table" :columns="timeListColumns" :data="timeListData"></i-table>
                </div>
            </div>
        </div>
    </div>
</template>
