<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                goodsCategory: {
                    goodsStyle: '',
                },
                styleData: [
                    {
                        value: 'beijing',
                        label: '北京',
                        children: [
                            {
                                value: 'gugong',
                                label: '故宫',
                            },
                            {
                                value: 'tiantan',
                                label: '天坛',
                            },
                            {
                                value: 'wangfujing',
                                label: '王府井',
                            },
                        ],
                    },
                    {
                        value: 'jiangsu',
                        label: '江苏',
                        children: [
                            {
                                value: 'nanjing',
                                label: '南京',
                                children: [
                                    {
                                        value: 'fuzimiao',
                                        label: '夫子庙',
                                    },
                                ],
                            },
                            {
                                value: 'suzhou',
                                label: '苏州',
                                children: [
                                    {
                                        value: 'zhuozhengyuan',
                                        label: '拙政园',
                                    },
                                    {
                                        value: 'shizilin',
                                        label: '狮子林',
                                    },
                                ],
                            },
                        ],
                    },
                ],
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
                <i-form ref="goodsCategory" :model="goodsCategory" :rules="ruleValidate" :label-width="200">
                    <row>
                        <i-col span="12">
                            <form-item label="您常用的商品分类：" >
                                <cascader :data="styleData" trigger="hover"></cascader>
                            </form-item>
                        </i-col>
                    </row>
                </i-form>
            </card>
        </div>
    </div>
</template>
