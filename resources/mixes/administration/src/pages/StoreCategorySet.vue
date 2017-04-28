<template>
    <div class="mall-wrap">
        <div class="store-category-set">
            <div class="setBox">店铺名称-设置</div>
                <card>
                    <i-form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="200">
                        <form-item label="分类名称" prop="name">
                            <i-input v-model="formValidate.name" style="width: 268px;height: 36px"></i-input>
                        </form-item>
                        <form-item label="保证金额" prop="number">
                            <i-input v-model="formValidate.number" style="width: 268px;height: 36px"></i-input>
                        </form-item>
                        <form-item label="排序" prop="rank">
                            <i-input v-model="formValidate.rank" style="width: 268px;height: 36px"></i-input><br>
                            <span class="range">数字范围为0~255，数字越小越靠前</span>
                        </form-item>
                        <form-item>
                            <i-button type="primary" @click="handleSubmit('formValidate')">确认提交</i-button>
                        </form-item>
                    </i-form>
                </card>

        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                formValidate: {
                    name: '',
                    number: '',
                    rank: '',
                },
                ruleValidate: {
                    name: [
                        { required: true, message: '分类名称不能为空', trigger: 'blur' },
                    ],
                    number: [
                        { required: true, message: '保证金额数不能为空', trigger: 'blur' },
                    ],
                },
            };
        },
        /*methods: {
            handleSubmit(name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        this.$Message.success('提交成功!');
                    } else {
                        this.$Message.error('表单验证失败!');
                    }
                });
            },
            handleReset(name) {
                this.$refs[name].resetFields();
            },
        },*/
    };
</script>
<style>

</style>
