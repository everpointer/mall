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
                merchantColumns: [
                    {
                        type: 'selection',
                        width: '60',
                        align: 'center',
                    },
                    {
                        title: '模板描述',
                        key: 'describe',
                        align: 'center',
                    },
                    {
                        title: '站内信',
                        align: 'center',
                        render() {
                            return '<i-switch><span slot="open">开启</span> <span slot="close">关闭</span> </i-switch>';
                        },
                    },
                    {
                        title: '手机短信',
                        align: 'center',
                        render() {
                            return '<i-switch><span slot="open">开启</span> <span slot="close">关闭</span> </i-switch>';
                        },
                    },
                    {
                        title: '邮件',
                        align: 'center',
                        render() {
                            return '<i-switch><span slot="open">开启</span> <span slot="close">关闭</span> </i-switch>';
                        },
                    },
                    {
                        title: '操作',
                        key: 'action',
                        align: 'center',
                        width: '140',
                        render() {
                            return '<i-button type="ghost" size="small">编辑</i-button>';
                        },
                    },
                ],
                merchantData: [
                    {
                        describe: '商品库存预警',
                    },
                    {
                        describe: '商品被投诉提醒',
                    },
                    {
                        describe: '商品审核失败提醒',
                    },
                    {
                        describe: '商品违规被下架',
                    },
                    {
                        describe: '新订单提醒',
                    },
                    {
                        describe: '退款提醒',
                    },
                    {
                        describe: '退款自动处理提醒',
                    },
                    {
                        describe: '退款自动处理提醒',
                    },
                    {
                        describe: '结算单等待确认提醒',
                    },
                    {
                        describe: '结算单已付款提醒',
                    },
                ],
                userColumns: [
                    {
                        type: 'selection',
                        align: 'center',
                        width: 60,
                    },
                    {
                        title: '模板描述',
                        key: 'describe',
                        align: 'center',
                    },
                    {
                        title: '站内信',
                        align: 'center',
                        render() {
                            return '<i-switch><span slot="open">开启</span> <span slot="close">关闭</span> </i-switch>';
                        },
                    },
                    {
                        title: '手机短信',
                        align: 'center',
                        render() {
                            return '<i-switch><span slot="open">开启</span> <span slot="close">关闭</span> </i-switch>';
                        },
                    },
                    {
                        title: '邮件',
                        align: 'center',
                        render() {
                            return '<i-switch><span slot="open">开启</span> <span slot="close">关闭</span> </i-switch>';
                        },
                    },
                    {
                        title: '操作',
                        key: 'action',
                        align: 'center',
                        width: 140,
                        render() {
                            return '<i-button type="ghost" size="small">编辑</i-button>';
                        },
                    },
                ],
                userData: [
                    {
                        describe: '到货通知提醒',
                    },
                    {
                        describe: '商品咨询回复提醒',
                    },
                    {
                        describe: '平台客服回复提醒',
                    },
                    {
                        describe: '预定订单尾款支付提醒',
                    },
                    {
                        describe: '付款成功提醒',
                    },
                    {
                        describe: '余额变动提醒',
                    },
                    {
                        describe: '充值卡余额变动提醒',
                    },
                    {
                        describe: '退款退货提醒',
                    },
                    {
                        describe: '红包使用提醒',
                    },
                    {
                        describe: '代金券使用提醒',
                    },
                ],
            };
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="configuration-message">
            <tabs value="name1">
                <tab-pane label="商家消息模板" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>平台可给商家提供站内信、短消息、邮件三种通知方式。平台可以选择开启一种或多种通知方式供商家选择。</p>
                        <p>开启强制接收后，商家不能取消该方式通知的接收。</p>
                        <p> 短消息、邮件需要商家设置正确号码后才能正常接收。</p>
                        <p> 编辑完成后请清理“商家消息模板”缓存。</p>
                    </div>
                    <div class="store-body">
                        <i-table class="shop-table" :columns="merchantColumns" :data="merchantData" class="my-btn"></i-table>
                    </div>
                </tab-pane>
                <tab-pane label="用户消息模板" name="name2">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>平台可以选择开启一种或多种消息通知方式</p>
                        <p>短消息、邮件需要用户绑定手机、邮箱后才能正常接收</p>
                        <p> 编辑完成后请清理“用户消息模板”缓存</p>
                    </div>
                    <div class="store-body">
                        <i-table class="shop-table" :columns="userColumns" :data="userData"></i-table>
                    </div>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>