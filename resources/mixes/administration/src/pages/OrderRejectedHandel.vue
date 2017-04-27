<template>
    <div class="mall-wrap">
        <div class="order-rejected-handel store-edit">
            <div class="store-refund-process">
                <div class="edit-link-title">
                    <i-button type="text">
                        <icon type="chevron-left"></icon>
                    </i-button>
                    <span>所有记录—处理</span>
                </div>
                <div class="refund-process-content store-information">
                    <card :bordered="false">
                        <i-form ref="refundDetail" :model="refundDetail" :rules="ruleValidate" :label-width="200">
                            <div class="refund-application">
                                <h5>买家退货退款申请</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="申请时间">
                                                {{refundDetail.applyTime}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品名称">
                                                {{refundDetail.goodsname}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退款金额">
                                                ￥{{refundDetail.refundMoney}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退货原因">
                                                {{refundDetail.refundReason}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退货说明">
                                                {{refundDetail.refundDescription}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="凭证上传">
                                                {{refundDetail.refundImg}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-handel">
                                <h5>商家退款退货处理</h5>
                                <div class="handel-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="审核结果">
                                                {{refundDetail.handelResult}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="处理备注">
                                                {{refundDetail.handelText}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="处理时间">
                                                {{refundDetail.handelTime}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="order-information">
                                <h5>订单支付信息</h5>
                                <div class="order-pay-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="支付方式">
                                                {{refundDetail.payStyle}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="订单总额">
                                                ￥{{refundDetail.orderCounts}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="在线支付金额">
                                                ￥{{refundDetail.linePay}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-review">
                                <h5>平台退款审核</h5>
                                <div class="review-content refund-module">
                                    <row>
                                        <i-col span="20">
                                            <form-item label="备注信息" prop="remarks" class="remark-input">
                                                <i-input v-model="refundDetail.remarks" type="textarea"
                                                         :autosize="{minRows: 3,maxRows: 5}"></i-input>
                                                <span class="tip">
                                                    系统默认退款到“站内余额”，如果“在线退款”到原支付账号，建议在备注里说明，方便核对。
                                                </span>
                                            </form-item>
                                            <p></p>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="">
                                                <i-button type="primary" @click="handleSubmit('refundDetail')">确认提交</i-button>
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                        </i-form>
                    </card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                refundDetail: {
                    applyTime: '2016-12-21  10:31:59',
                    goodsname: '****',
                    refundMoney: '99.00',
                    refundReason: '不要',
                    refundDescription: 'mm',
                    refundImg: '',
                    handelResult: '同意',
                    handelText: 'jahwuiha',
                    handelTime: '2016-12-21  10:31:59',
                    payStyle: '在线支付',
                    orderCounts: '99.00',
                    linePay: '99.00',
                    remarks: '',
                },
                ruleValidate: {
                    remarks: [
                        { required: true, message: '信息不能为空', trigger: 'blur' },
                    ],
                },
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            handleSubmit(name) {
                this.$refs[name].validate(valid => {
                    if (valid) {
                        this.$Message.success('提交成功!');
                    } else {
                        this.$Message.error('表单验证失败!');
                    }
                });
            },
        },
    };
</script>
