<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                advertisement: [
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
                advertisementData: [
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
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="configuration-advertisement">
            <tabs value="name1">
                <tab-pane label="广告管理" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>将广告位调用代码放入前台页面，将显示该广告位的广告</p>
                    </div>
                    <div class="advertisement-action">
                        <i-button class="add-data" type="ghost">+新增数据</i-button>
                        <i-button class="delete-data" type="ghost">批量删除</i-button>
                        <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                    </div>
                    <i-table highlight-row :columns="advertisement"
                             :data="advertisementData"></i-table>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
