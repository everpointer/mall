<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                rejectedDetail: {
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
                loading: false,
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.rejectedDetail.validate(valid => {
                    if (valid) {
                        window.console.log(valid);
                    } else {
                        self.loading = false;
                        self.$notice.error({
                            title: '请正确填写设置信息！',
                        });
                    }
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="order-rejected-handel">
            <div class="store-refund-process">
                <div class="edit-link-title">
                    <i-button type="text">
                        <icon type="chevron-left"></icon>
                    </i-button>
                    <span>所有记录—处理</span>
                </div>
                <div class="refund-process-content store-information">
                    <card :bordered="false">
                        <i-form ref="rejectedDetail" :model="rejectedDetail" :rules="ruleValidate" :label-width="200">
                            <div class="refund-application">
                                <h5>买家退货退款申请</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="12">
                                            <form-item label="申请时间">
                                                {{rejectedDetail.applyTime}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="商品名称">
                                                {{rejectedDetail.goodsname}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="退款金额">
                                                ￥{{rejectedDetail.refundMoney}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="退货原因">
                                                {{rejectedDetail.refundReason}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="退货说明">
                                                {{rejectedDetail.refundDescription}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="凭证上传">
                                                {{rejectedDetail.refundImg}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-handel">
                                <h5>商家退款退货处理</h5>
                                <div class="handel-content refund-module">
                                    <row>
                                        <i-col span="12">
                                            <form-item label="审核结果">
                                                {{rejectedDetail.handelResult}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="处理备注">
                                                {{rejectedDetail.handelText}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="处理时间">
                                                {{rejectedDetail.handelTime}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="order-information">
                                <h5>订单支付信息</h5>
                                <div class="order-pay-content refund-module">
                                    <row>
                                        <i-col span="12">
                                            <form-item label="支付方式">
                                                {{rejectedDetail.payStyle}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="订单总额">
                                                ￥{{rejectedDetail.orderCounts}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="在线支付金额">
                                                ￥{{rejectedDetail.linePay}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-review">
                                <h5>平台退款审核</h5>
                                <div class="review-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="备注信息" prop="remarks" class="remark-input">
                                                <i-input v-model="rejectedDetail.remarks" type="textarea"
                                                         :autosize="{minRows: 3,maxRows: 5}"></i-input>
                                                <p>系统默认退款到“站内余额”，如果“在线退款”到原支付账号，建议在备注里说明，
                                                    方便核对。</p>
                                            </form-item>
                                            <p></p>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item>
                                                <i-button :loading="loading" type="primary" @click.native="submit">
                                                    <span v-if="!loading">确认提交</span>
                                                    <span v-else>正在提交…</span>
                                                </i-button>
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
