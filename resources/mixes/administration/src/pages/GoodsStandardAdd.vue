<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                standardData: {
                    position: '',
                    type: '',
                    sort: '',
                },
                styleData: [
                    {
                        value: '个护化妆',
                        label: '个护化妆',
                        children: [
                            {
                                value: '童车童床',
                                label: '童车童床',
                                children: [
                                    {
                                        value: '婴儿推车',
                                        label: '婴儿推车',
                                    },
                                    {
                                        value: '自行车',
                                        label: '自行车',
                                    },
                                    {
                                        value: '婴儿推车',
                                        label: '婴儿推车',
                                    },
                                    {
                                        value: '电动车',
                                        label: '电动车',
                                    },
                                    {
                                        value: '安全座椅',
                                        label: '安全座椅',
                                    },
                                ],
                            },
                            {
                                value: '营养辅食',
                                label: '营养辅食',
                            },
                            {
                                value: '尿裤湿巾',
                                label: '尿裤湿巾',
                            },
                        ],
                    },
                    {
                        value: '家用电器',
                        label: '家用电器',
                        children: [
                            {
                                value: '服饰寝居',
                                label: '服饰寝居',
                                children: [
                                    {
                                        value: '婴儿推车1',
                                        label: '婴儿推车1',
                                    },
                                    {
                                        value: '自行车2',
                                        label: '自行车2',
                                    },
                                    {
                                        value: '婴儿推车3',
                                        label: '婴儿推车3',
                                    },
                                    {
                                        value: '电动车',
                                        label: '电动车',
                                    },
                                    {
                                        value: '安全座椅4',
                                        label: '安全座椅4',
                                    },
                                ],
                            },
                            {
                                value: '营养辅食',
                                label: '营养辅食',
                                children: [
                                    {
                                        value: '婴儿推车1',
                                        label: '婴儿推车1',
                                    },
                                    {
                                        value: '自行车2',
                                        label: '自行车2',
                                    },
                                ],
                            },
                            {
                                value: '尿裤湿巾',
                                label: '尿裤湿巾',
                                children: [
                                    {
                                        value: '车1',
                                        label: '车1',
                                    },
                                    {
                                        value: '自行车2',
                                        label: '自行车2',
                                    },
                                ],
                            },
                        ],
                    },
                ],
                loading: false,
                ruleValidate: {
                    type: [
                        { required: true, message: '规格不能为空', trigger: 'blur' },
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
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.standardData.validate(valid => {
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
        <div class="goods-standard-add">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>类型管理—添加</span>
            </div>
            <card :bordered="false">
                <i-form ref="standardData" :model="standardData" :rules="ruleValidate" :label-width="200">
                    <div class="basic-information">
                        <row>
                            <i-col span="12">
                                <form-item label="规格" prop="type">
                                    <i-input v-model="standardData.type"></i-input>
                                    <p class="tip">
                                        请填写常用的商品规格的名称；例如：颜色；尺寸等
                                    </p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="快捷定位">
                                    <cascader :data="styleData" trigger="hover" v-model="standardData.position"></cascader>
                                    <p class="tip">选择分类，可关联到任意级分类 （只在后台快捷定位中起作用）</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="排序" prop="sort">
                                    <i-input v-model="standardData.sort"></i-input>
                                    <p class="tip">
                                        请填写自然数。类型列表将会根据排序进行由小到大排列显示
                                    </p>
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
                    </div>
                </i-form>
            </card>
        </div>
    </div>
</template>
