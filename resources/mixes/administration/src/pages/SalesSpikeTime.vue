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
                        width: 100,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '编号',
                        width: 200,
                        key: 'number',
                        align: 'center',
                    },
                    {
                        title: '秒杀时段名称',
                        width: 300,
                        key: 'name',
                        align: 'center',
                    },
                    {
                        title: '每日开始时间',
                        key: 'startTime',
                        width: 350,
                        align: 'center',
                    },
                    {
                        title: '每日结束时间',
                        key: 'finishTime',
                        width: 350,
                        align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 200,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">编辑</i-button><i-button type="ghost" size="small">删除</i-button>';
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
    };
</script>
<template>
    <div class="mall-wrap store-category">
        <div class="store">
            <div class="prompt-box promptBox">
                <h6>提示</h6>
                <p>建议设置四至五个时间段（前台显示）</p>
            </div>
            <div class="store-body">
                <div class="store-body-header">
                    <i-button class="export-btn" type="ghost">+添加秒杀时段</i-button>
                    <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                </div>
                <i-table highlight-row class="shop-table" :columns="timeListColumns" :data="timeListData"></i-table>
            </div>
        </div>
    </div>
</template>
