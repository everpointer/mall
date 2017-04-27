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
                                </div>
                            </div>
                            <div class="refund-handel">

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
