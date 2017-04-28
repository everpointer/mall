<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                steps: [
                    {
                        title: '生成订单',
                        content: '2016-12-23  13:41:59',
                    },
                    {
                        title: '完成付款',
                        content: '2016-12-23  13:41:59',
                    },
                    {
                        title: '商家发货',
                        content: '2016-12-23  13:41:59',
                    },
                    {
                        title: '收货确认',
                        content: '2016-12-23  13:41:59',
                    },
                    {
                        title: '完成评价',
                        content: '2016-12-23  13:41:59',
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
        <div class="order-view">
            <div class="view-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>商品订单—查看</span>
            </div>
            <div class="view-body">
                <div class="view-step">
                    <steps :current="1">
                        <step v-for="step in steps" :title="step.title" :content="step.content"></step>
                    </steps>
                </div>
                <tabs type="card" :animated="false">
                    <tab-pane label="订单详情">
                        <i-form :label-width="80">
                            <h4>下单/支付</h4>
                            <form-item label="输入框">
                                gswgwregwrg
                            </form-item>
                        </i-form>
                    </tab-pane>
                    <tab-pane label="退货记录">标签二的内容</tab-pane>
                </tabs>
            </div>
        </div>
    </div>
</template>
