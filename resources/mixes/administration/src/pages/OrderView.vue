<script>
    import injection from '../helpers/injection';
    import goods from '../assets/images/adv.jpg';

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
                orderColumns: [
                    {
                        title: '商品',
                        key: 'orderName',
                        align: 'center',
                        width: 650,
                        render(row) {
                            return `<img class="orderImg" :src="${row.img}"><span>${row.orderName}</span>`;
                        },
                    },
                    {
                        title: '单价',
                        key: 'orderPrice',
                        align: 'center',
                    },
                    {
                        title: '数量',
                        key: 'orderNumber',
                        align: 'center',
                    },
                    {
                        title: '总金额',
                        key: 'totalAmount',
                        align: 'center',
                    },
                ],
                orderInfo: [
                    {
                        orderName: 'AIM 商务男包牛皮单肩包男手提包横款公文包休闲皮包斜挎男士包包',
                        orderPrice: 19.99,
                        orderNumber: 5,
                        totalAmount: '99.99',
                        freight: 10.00,
                        img: goods,
                    },
                ],
                orderData: {
                    orderNumber: '565454424',
                    orderSource: 'PC端',
                    orderTime: '2015-06-12 10:42:40',
                    payNumber: '541544524124245',
                    payMethod: '在线支付',
                    payTime: '2015-06-12 10:42:40',
                },
                buyerData: {
                    buyerName: '昵称',
                    buyerPhone: '029-66458124',
                    address: '某人，陕西 西安 雁塔区 高新二路与光泰路口陕西国土资源大厦2304',
                    invoiceData: {
                        type: '普通发票',
                        title: 'sgs',
                        content: '闽西',
                    },
                    buyerMessage: '包装仔细',
                },
                sellersData: {
                    shopName: '以瓷换米',
                    owner: 'fwef',
                    phone: '1234546546',
                    address: '某人，陕西 西安 雁塔区 高新二路与光泰路口陕西国土资源大厦2304',
                    shipTime: '2016-12-24   03:06:47',
                    expressDelivery: '顺丰速递',
                    shipmentNumber: '54654654545454786',
                },
                refundsData: {
                    orderNumber: '5465454542',
                    money: '99.99',
                    occurrenceTime: '2015-06-12 10:42:40',
                    remarks: '不合适',
                },
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
                        <i-form :label-width="110">
                            <h4>下单/支付</h4>
                            <row>
                                <i-col span="8">
                                    <form-item label="订单号：">
                                        {{　orderData.orderNumber　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="订单来源：">
                                        {{　orderData.orderSource　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="下单时间：">
                                        {{　orderData.orderTime　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="支付单号：">
                                        {{　orderData.payNumber　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="支付方式：">
                                        {{　orderData.payMethod　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="支付时间：">
                                        {{　orderData.payTime　}}
                                    </form-item>
                                </i-col>
                            </row>
                        </i-form>
                        <i-form :label-width="110">
                            <h4>购买/收货方信息</h4>
                            <row>
                                <i-col span="8">
                                    <form-item label="买家：">
                                        {{　buyerData.buyerName　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="联系方式：">
                                        {{　buyerData.buyerPhone　}}
                                    </form-item>
                                </i-col>
                            </row>
                            <form-item label="收货地址：">
                                {{　buyerData.address　}}
                            </form-item>
                            <form-item label="发票信息：">
                                <p>类型：{{　buyerData.invoiceData.type　}}</p>
                                <p>抬头：{{　buyerData.invoiceData.title　}}</p>
                                <p>内容：{{　buyerData.invoiceData.content　}}</p>
                            </form-item>
                            <form-item label="买家留言：">
                                {{　buyerData.buyerMessage　}}
                            </form-item>
                        </i-form>
                        <i-form :label-width="110">
                            <h4>销售/发货方信息</h4>
                            <row>
                                <i-col span="8">
                                    <form-item label="店铺：">
                                        {{　sellersData.shopName　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="店主名称：">
                                        {{　sellersData.owner　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="联系电话：">
                                        {{　sellersData.phone　}}
                                    </form-item>
                                </i-col>
                            </row>
                            <form-item label="发货地址：">
                                {{　sellersData.address　}}
                            </form-item>
                            <row>
                                <i-col span="8">
                                    <form-item label="发货时间：">
                                        {{　sellersData.shipTime　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="快递公司：">
                                        {{　sellersData.expressDelivery　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="物流单号：">
                                        {{　sellersData.shipmentNumber　}}
                                    </form-item>
                                </i-col>
                            </row>
                        </i-form>
                        <i-form>
                            <h4>商品信息</h4>
                            <i-table highlight-row :columns="orderColumns" :data="orderInfo"></i-table>
                            <p class="price">订单总额： <span class="totalAmount">￥{{ orderInfo[0].totalAmount }}</span></p>
                            <p class="price">(含运费：￥{{ orderInfo[0].freight }})</p>
                        </i-form>
                    </tab-pane>
                    <tab-pane label="退货信息">
                        <i-form :label-width="110">
                            <h4>退货信息</h4>
                            <row>
                                <i-col span="8">
                                    <form-item label="退货单号：">
                                        {{　refundsData.orderNumber　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="退款金额：">
                                        ￥{{　refundsData.money　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="发生时间：">
                                        {{　refundsData.occurrenceTime　}}
                                    </form-item>
                                </i-col>
                                <i-col span="8">
                                    <form-item label="备注：">
                                        {{　refundsData.remarks　}}
                                    </form-item>
                                </i-col>
                            </row>
                        </i-form>
                    </tab-pane>
                </tabs>
            </div>
        </div>
    </div>
</template>