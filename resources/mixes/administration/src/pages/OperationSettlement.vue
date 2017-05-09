<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                billDetail: {
                    settlementNum: '75 (原结算单号：20150115)',
                    startData: '2015-01-01  至  2015-01-31',
                    accountData: '2015-02-01',
                    PayMoney: ' 0.00 = 0.00 (订单金额) - 0.00 (佣金金额) - 0.00 (退单金额) + 0.00 (退还佣金) - 0.00 (店铺促销费用)',
                    settlementStatus: '已出帐',
                },
                typeColumns: [
                    {
                        title: '账单编号',
                        key: 'number',
                        width: 150,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '订单金额（含运费）',
                        key: 'orderMoney',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '运费',
                        key: 'freight',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '佣金',
                        key: 'commission',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '平台红包',
                        key: 'redEnvelopes',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '下单日期',
                        key: 'orderData',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '成交日期',
                        key: 'dealData',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '买家',
                        key: 'buyer',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '买家ID',
                        key: 'buyerId',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家',
                        key: 'businessmen',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家ID',
                        key: 'businessmenId',
                        width: 150,
                        align: 'center',
                    },
                ],
                typeData: [
                    {
                        number: '01',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        redEnvelopes: '0.00',
                        orderData: '2017-2-21',
                        dealData: '2017-2-24',
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                    },
                    {
                        number: '01',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        redEnvelopes: '0.00',
                        orderData: '2017-2-21',
                        dealData: '2017-2-24',
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                    },
                    {
                        number: '01',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        redEnvelopes: '0.00',
                        orderData: '2017-2-21',
                        dealData: '2017-2-24',
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                    },
                    {
                        number: '01',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        redEnvelopes: '0.00',
                        orderData: '2017-2-21',
                        dealData: '2017-2-24',
                        buyer: '买家',
                        buyerId: '0012',
                        businessmen: 'Rey旗舰店',
                        businessmenId: '235468',
                    },
                ],
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
                settlementStatus: 0,
                self: this,
                managementSearch: '',
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            exportData() {
                this.$refs.orderTable.exportCsv({
                    filename: '订单列表数据',
                });
            },
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="operation-settlement">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>结算管理—账单明细</span>
            </div>
            <card :bordered="false">
                <i-form ref="billDetail" :model="billDetail" :rules="ruleValidate" :label-width="200">
                    <div class="bill-information">
                        <h5>店铺 - 官方店铺2（ID：15）结算单</h5>
                        <div class="bill-content">
                            <row>
                                <i-col span="18">
                                    <form-item label="结算单号">
                                        {{billDetail.settlementNum}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="起止日期">
                                        {{billDetail.startData}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="出账日期">
                                        ￥{{billDetail.accountData}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="20">
                                    <form-item label="平台应付金额">
                                        {{billDetail.PayMoney}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="结算状态">
                                        {{billDetail.settlementStatus}}
                                    </form-item>
                                </i-col>
                            </row>
                            <row>
                                <i-col span="18">
                                    <form-item label="">
                                        <i-button type="primary" v-if="settlementStatus === 0">审核</i-button>
                                        <i-button type="primary" v-if="settlementStatus === 1">付款完成</i-button>
                                        <i-button type="primary" v-if="settlementStatus === 2">打印</i-button>
                                    </form-item>
                                </i-col>
                            </row>
                        </div>
                    </div>
                </i-form>
                <tabs type="card">
                    <tab-pane label="订单列表">
                        <div class="album-action">
                            <i-button class="add-data" type="ghost" @click.native="exportData">导出数据</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            <div class="goods-body-header-right">
                                <i-input v-model="managementWord" placeholder="请输入关键词进行搜索">
                                    <i-select v-model="managementSearch" slot="prepend" style="width: 150px;">
                                        <i-option v-for="item in searchList"
                                                  :value="item.value">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row :columns="typeColumns" :context="self"
                                 :data="typeData" ref="orderTable"></i-table>
                    </tab-pane>
                    <tab-pane label="退单列表">标签二的内容</tab-pane>
                </tabs>
            </card>
        </div>
    </div>
</template>
