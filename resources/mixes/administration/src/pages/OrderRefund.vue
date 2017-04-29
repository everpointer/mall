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
                        fixed: 'left',
                    },
                    {
                        title: '订单编号',
                        key: 'orderID',
                        width: 190,
                        align: 'center',
                    },
                    {
                        title: '订单金额',
                        key: 'orderAmount',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '申请原因',
                        key: 'applyReason',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '申请图片',
                        key: 'applyImg',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '申请时间',
                        key: 'applyTime',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '涉及商品',
                        key: 'involvingGoods',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '商品ID',
                        key: 'orderId',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '订单编号',
                        key: 'orderNumber',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '商家处理时间',
                        key: 'processingTime',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '商家处理备注',
                        key: 'handlingNotes',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '商家ID',
                        key: 'merchantID',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '买家ID',
                        key: 'buyerID',
                        align: 'left',
                        width: 200,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 140,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">处理</i-button>';
                        },
                    },
                ],
                pendingData: [
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                ],
                allOrderData: [
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                    {
                        orderID: '65454654546',
                        orderAmount: '移动端',
                        applyReason: '2017-03-21 16:45:45',
                        applyImg: '899（含运费10.00）',
                        applyTime: '交易完成',
                        involvingGoods: '45654646',
                        orderId: '钻石店铺',
                        orderNumber: '5464546',
                        processingTime: '2017-03-21 16:45:45',
                        handlingNotes: 'ddqwd',
                        merchantID: '4565464',
                        buyerID: '455646544',
                    },
                ],
                reasonColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                    },
                    {
                        title: '排序',
                        key: 'sort',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '原因',
                        key: 'reason',
                        align: 'left',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 140,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">编辑</i-button>';
                        },
                    },
                ],
                reasonData: [
                    {
                        sort: 1,
                        reason: '不能按时发货',
                    },
                ],
            };
        },
        methods: {
            exportData(table) {
                if (table === 1) {
                    this.$refs.pendingTable.exportCsv({
                        filename: '待处理退款数据',
                    });
                } else if (table === 2) {
                    this.$refs.allOrderTable.exportCsv({
                        filename: '所有退款数据',
                    });
                }
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
                <tab-pane label="待处理" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>卖家提交申请，商家同意并经平台确认后，退款金额以买家付款方式返回给买家</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <i-button class="export-btn" @click="exportData(1)" type="ghost">导出数据</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="searchCategory" slot="prepend" style="width: 100px">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row ref="pendingTable" class="shop-table" :columns="managementColumns" :data="pendingData"></i-table>
                    </div>
                    <div class="page">
                        <page :total="100" show-elevator></page>
                    </div>
                </tab-pane>
                <tab-pane label="所有记录" name="name2">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>卖家提交申请，商家同意并经平台确认后，退款金额以买家付款方式返回给买家</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <i-button class="export-btn" @click="exportData(2)" type="ghost">导出数据</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="searchCategory" slot="prepend" style="width: 100px">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row ref="allOrderTable" class="shop-table" :columns="managementColumns" :data="allOrderData"></i-table>
                    </div>
                    <div class="page">
                        <page :total="100" show-elevator></page>
                    </div>
                </tab-pane>
                <tab-pane label="原因设定" name="name3">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>系统初始化的原因不能删除</p>
                        <p>排序显示规则为排序小的在前</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="searchCategory" slot="prepend" style="width: 100px">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row class="shop-table" :columns="reasonColumns" :data="reasonData"></i-table>
                    </div>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>