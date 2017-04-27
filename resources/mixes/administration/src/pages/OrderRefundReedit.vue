<template>
    <div class="mall-wrap">
        <div class="order-refund-reason-edit store-edit">
            <div class="edit-link-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>原因设定—编辑</span>
            </div>
            <card :bordered="false">
                <i-form ref="refundEdit" :model="refundEdit" :rules="ruleValidate" :label-width="200">
                    <row>
                        <i-col span="18">
                            <form-item label="原因" prop="refundReason">
                                <i-input v-model="refundEdit.refundReason"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="18">
                            <form-item label="排序" prop="refundSort">
                                <i-input v-model="refundEdit.refundSort"></i-input>
                                <span class="tip">数字范围为0~255，数字越小越靠前</span>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="18">
                            <form-item label="">
                                <i-button type="primary" @click="handleSubmit('refundEdit')">确认提交</i-button>
                            </form-item>
                        </i-col>
                    </row>
                </i-form>
            </card>
        </div>
    </div>
</template>

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
                        { type: 'number', message: '输入正确的数字', trigger: 'blur' },
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
