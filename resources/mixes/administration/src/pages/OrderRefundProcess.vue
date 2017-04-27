<template>
    <div class="mall-wrap">
        <div class="order-refund-process">
            <div class="store-refund-process store-edit">
                <div class="edit-link-title">
                    <i-button type="text">
                        <icon type="chevron-left"></icon>
                    </i-button>
                    <span>退款管理—处理</span>
                </div>
                <div class="refund-process-content store-information">
                    <card>
                        <i-form ref="refundDetail" :model="refundDetail" :rules="ruleValidate" :label-width="197">
                            <div class="refund-application">
                                <h5>买家退款申请</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="店主账号">
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
                                            <form-item label="退款原因">
                                                {{refundDetail.refundReason}}
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="退款说明">
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
                                <h5>商家退款处理</h5>
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

                            </div>
                            <div class="refund-review">

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
