<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                goodsCategory: {
                    goodsStyle: '',
                    selectStyle: '',
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
                self: this,
                style: false,
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
            handleChange(value, selectedData) {
                this.style = true;
                this.goodsCategory.selectStyle = selectedData.map(o => o.label).join('>');
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.goodsCategory.validate(valid => {
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
        <div class="edit-goods-category">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>商品库管理—编辑—商品分类</span>
            </div>
            <card :bordered="false">
                <i-form ref="goodsCategory" :model="goodsCategory" :rules="ruleValidate" :label-width="280">
                    <row>
                        <i-col>
                            <form-item label="您常用的商品分类：" >
                                <cascader :data="styleData" trigger="hover" @on-change="handleChange"
                                          v-model="goodsCategory.selectStyle"></cascader>
                            </form-item>
                        </i-col>
                    </row>
                    <div class="select-style" v-if="style">
                        您当前选择的商品类别是： {{ goodsCategory.selectStyle }}
                    </div>
                    <div class="submit-btn" v-if="style">
                        <i-button :loading="loading" type="primary" @click.native="submit">
                            <span v-if="!loading">确认提交</span>
                            <span v-else>正在提交…</span>
                        </i-button>
                    </div>
                </i-form>
            </card>
        </div>
    </div>
</template>
