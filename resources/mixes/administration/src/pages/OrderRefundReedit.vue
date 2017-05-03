<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                refundEdit: {
                    refundReason: '',
                    refundSort: '',
                },
                ruleValidate: {
                    refundReason: [
                        { required: true, message: '原因不能为空', trigger: 'blur' },
                    ],
                    refundSort: [
                        { required: true, message: '排序不能为空', trigger: 'blur' },
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
                self.$refs.refundEdit.validate(valid => {
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
        <div class="order-refund-reason-edit">
            <div class="edit-link-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>原因设定—编辑</span>
            </div>
            <card :bordered="false">
                <i-form ref="refundEdit" :model="refundEdit" :rules="ruleValidate" :label-width="200">
                    <row>
                        <i-col span="12">
                            <form-item label="原因" prop="refundReason">
                                <i-input v-model="refundEdit.refundReason"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="排序" prop="refundSort">
                                <i-input v-model="refundEdit.refundSort"></i-input>
                                <p>数字范围为0~255，数字越小越靠前</p>
                            </form-item>
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
                </i-form>
            </card>
        </div>
    </div>
</template>
