<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                btnStatus: true,
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
                        title: '收取佣金',
                        key: 'commission',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '退单金额',
                        key: 'refund',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '店铺费用',
                        key: 'shopCosts',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '分销佣金',
                        key: 'distribution',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '本期应结',
                        key: 'settlement',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '出账日期',
                        key: 'accountData',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '帐单状态',
                        key: 'status',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家名称',
                        key: 'businessName',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 150,
                        align: 'center',
                        render(row, column, index) {
                            return `<i-button type="ghost" class="delete-ad" v-if="btnStatus === true"
                                    @click.native="handel(${index})">处理</i-button>
                                    <i-button type="ghost" class="delete-ad" v-if="btnStatus === false"
                                    @click.native="look(${index})">查看</i-button>`;
                        },
                    },
                ],
                typeData: [
                    {
                        number: '01',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        refund: '0.00',
                        shopCosts: '30.00',
                        distribution: '10.00',
                        settlement: '865.00',
                        accountData: '2017-5-9',
                        status: '已出账',
                        businessName: 'Rey旗舰店',
                    },
                    {
                        number: '02',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        refund: '0.00',
                        shopCosts: '30.00',
                        distribution: '10.00',
                        settlement: '865.00',
                        accountData: '2017-5-9',
                        status: '已出账',
                        businessName: 'Rey旗舰店',
                    },
                    {
                        number: '03',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        refund: '0.00',
                        shopCosts: '30.00',
                        distribution: '10.00',
                        settlement: '865.00',
                        accountData: '2017-5-9',
                        status: '已出账',
                        businessName: 'Rey旗舰店',
                    },
                    {
                        number: '04',
                        orderMoney: '999.00',
                        freight: '12.00',
                        commission: '37.00',
                        refund: '0.00',
                        shopCosts: '30.00',
                        distribution: '10.00',
                        settlement: '865.00',
                        accountData: '2017-5-9',
                        status: '已出账',
                        businessName: 'Rey旗舰店',
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
                this.$refs.managementTable.exportCsv({
                    filename: '结算管理数据',
                });
            },
            remove(index) {
                this.typeData.splice(index, 1);
            },
            handel() {
                const self = this;
                self.$router.push({
                    path: 'operation/settlement',
                });
            },
            look() {

            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="operation">
            <tabs value="name1">
                <tab-pane label="结算管理" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>账单计算公式：订单金额（含运费）-佣金金额-退单金额+退还金额-店铺促销费用+订金订单中的未退定金+
                            下单时使用的平台红包-全部退款时应扣除的平台红包-分销佣金</p>
                        <p>账单处理流程为：系统出账>商家确认>平台审核>财务支付（完成结算）4个环节，其中平台审核和财务支付
                            需要平台介入，请予以关注</p>
                    </div>
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
                             :data="typeData" ref="managementTable"></i-table>
                    <div class="page">
                        <page :total="150" show-elevator></page>
                    </div>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>