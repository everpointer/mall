<template>
    <div class="mall-wrap">
        <div class="configuration-search-editor">
            <div class="setBox"><icon type="chevron-left" style="margin-right: 10px"></icon>热门搜索-编辑</div>
            <card>
                <!--<i-form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="200">-->
                    <!--<form-item label="搜索默认词" prop="search">-->
                        <!--<i-input v-model="formValidate.search" style="width: 268px;height: 36px"></i-input><br>-->
                        <!--<span class="range">搜索词参与搜索，列：童装</span>-->
                    <!--</form-item>-->
                    <!--<form-item label="显示词" prop="show">-->
                        <!--<i-input v-model="formValidate.show" style="width: 268px;height: 36px"></i-input><br>-->
                        <!--<span class="range">数字范围为0~255，数字越小越靠前</span>-->
                    <!--</form-item>-->
                    <!--<form-item>-->
                        <!--<i-button type="primary" @click="handleSubmit('formValidate')">确认提交</i-button>-->
                    <!--</form-item>-->
                <!--</i-form>-->
                <i-form :label-width="200" ref="activityValidate" :model="searchData" :rules="validate">
                    <row>
                        <i-col span="12">
                            <form-item label="搜索默认词" prop="search">
                                <i-input v-model="searchData.search" placeholder=""></i-input>
                                <span class="range">搜索词参与搜索，列：童装</span>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="显示词" prop="show">
                                <i-input v-model="searchData.show" placeholder=""></i-input>
                                <span class="range">显示词不参与搜索，只起显示作用，例：61儿童节，童装五折狂欢</span>
                            </form-item>
                        </i-col>
                    </row>
                    <form-item>
                        <i-button @click.native="submit" type="primary">
                            <span v-if="!loading">确认提交</span>
                            <span v-else>正在提交…</span>
                        </i-button>
                    </form-item>
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
                loading: false,
                searchData: {
                    search: '',
                    show: '',
                },
                validate: {
                    search: [
                        {
                            required: true,
                            message: '搜索默认词不能为空',
                            trigger: 'blur',
                        },
                    ],
                    show: [
                        {
                            required: true,
                            message: '显示词不能为空',
                            trigger: 'blur',
                        },
                    ],
                },
                formValidate: {
                    search: '',
                    show: '',
                },
                ruleValidate: {
                    search: [
                        { required: true, message: '搜索默认词不能为空', trigger: 'blur' },
                    ],
                    show: [
                        { required: true, message: '显示词不能为空', trigger: 'blur' },
                    ],
                },
            };
        },
        methods: {
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.activityValidate.validate(valid => {
                    if (valid) {
                        self.$Message.success('提交成功!');
                    } else {
                        self.loading = false;
                        self.$notice.error({
                            title: '请正确填写设置信息！',
                        });
                    }
                });
            },
            goback() {
                const self = this;
                self.$router.push({
                    path: ' ',
                });
            },
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
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
