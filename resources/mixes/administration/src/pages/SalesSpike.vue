<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                spikeActivity: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '编号',
                        key: 'num',
                        width: 200,
                    },
                    {
                        title: '活动标题',
                        key: 'title',
                        width: 400,
                    },
                    {
                        title: '开始时间',
                        key: 'startTime',
                        width: 200,
                    },
                    {
                        title: '结束时间',
                        key: 'endTime',
                        width: 200,
                    },
                    {
                        title: '状态',
                        key: 'isstatus',
                        width: 500,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 200,
                        align: 'center',
                        fixed: 'right',
                        render(row, column, index) {
                            return `<dropdown><i-button type="ghost">设置<icon type="arrow-down-b"></icon></i-button>
                                <dropdown-menu slot="list"><dropdown-item>活动设置</dropdown-item><dropdown-item>商品设置</dropdown-item></dropdown-menu></dropdown>
                                <i-button type="ghost" class="delete-ad" @click="removeAd(${index})">删除</i-button>`;
                        },
                    },
                ],
                spikeData: [
                    {
                        num: '00333',
                        title: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        startTime: '2016-12-23',
                        endTime: '2016-12-23',
                        isstatus: '开启',
                    },
                    {
                        num: '00333',
                        title: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        startTime: '2016-12-23',
                        endTime: '2016-12-23',
                        isstatus: '开启',
                    },
                    {
                        num: '00333',
                        title: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        startTime: '2016-12-23',
                        endTime: '2016-12-23',
                        isstatus: '开启',
                    },
                    {
                        num: '00333',
                        title: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        startTime: '2016-12-23',
                        endTime: '2016-12-23',
                        isstatus: '开启',
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
            removeAd(index) {
                this.spikeData.splice(index, 1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="sales-spike">
            <tabs value="name1">
                <tab-pane label="秒杀活动" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>请先设置“秒杀活动”时间段</p>
                        <p>秒杀活动列表可对活动进行编辑、删除、设置等商品操作</p>
                        <p>秒杀截止时间内多个活动可同时进行</p>
                    </div>
                    <div class="advertisement-action">
                        <i-button class="add-data" type="ghost">+添加活动</i-button>
                        <i-button class="delete-data" type="ghost">时间段列表</i-button>
                        <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                    </div>
                    <i-table highlight-row :columns="spikeActivity"
                             :data="spikeData"></i-table>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
