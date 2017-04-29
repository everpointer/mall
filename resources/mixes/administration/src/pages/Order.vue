<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                searchCategory: '',
                searchWord: '',
                searchList: [
                    {
                        value: '订单编号',
                        label: '店铺名称',
                    },
                    {
                        value: '商品名称',
                        label: '商品名称',
                    },
                    {
                        value: '商品分类',
                        label: '商品分类',
                    },
                ],
                managementColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                    },
                    {
                        title: '订单编号',
                        key: 'orderID',
                        align: 'center',
                        width: 200,
                    },
                    {
                        title: '订单来源',
                        key: 'orderSource',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '下单时间',
                        key: 'ownerTime',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '订单金额',
                        key: 'orderAmount',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '订单状态',
                        key: 'orderStatus',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '支付单号',
                        key: 'payNumber',
                        width: 250,
                        align: 'center',
                    },
                    {
                        title: '支付方式',
                        key: 'paymentMethod',
                        align: 'left',
                        width: 150,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 180,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" class="first-btn" size="small">查看</i-button><i-button type="ghost" size="small">设置</i-button>';
                        },
                    },
                ],
                managementData: [
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                    {
                        orderID: '65454654546',
                        orderSource: '移动端',
                        ownerTime: '2017-03-21 16:45:45',
                        orderAmount: '899（含运费10.00）',
                        orderStatus: '交易完成',
                        payNumber: '45654646',
                        paymentMethod: '钻石店铺',
                    },
                ],
            };
        },
        methods: {
            exportData() {
                this.$refs.orderTable.exportCsv({
                    filename: '商品订单数据',
                });
            },
            toView() {
                this.$router.push('order/view');
            },
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
        <div class="store">
            <tabs value="name1">
                <tab-pane label="商品订单" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>点击查看操作将显示订单（包括订单物品）的详细信息</p>
                        <p>点击取消操作可以取消订单（在线支付但未付款的订单和货到付款但未发货的订单）</p>
                        <p>如果平台已确认收到买家的付款，但系统支付状态并未变更，可以点击收到货款操作(仅限于下单后7日内可更改收款状态)，并填写相关信息后更改订单支付状态</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <i-button class="export-btn" @click="exportData" type="ghost">导出数据</i-button>
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="searchCategory" slot="prepend">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table ref="orderTable" highlight-row class="shop-table" :columns="managementColumns" :data="managementData"></i-table>
                    </div>
                    <div class="page">
                        <page :total="100" show-elevator></page>
                    </div>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>