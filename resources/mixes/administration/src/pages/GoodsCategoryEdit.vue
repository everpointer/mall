<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                editDetail: {
                    typeName: '',
                    showStyle: '',
                },
                showStyle: [
                    {
                        value: '1',
                        label: '颜色',
                    },
                    {
                        value: '2',
                        label: '类型',
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
        <div class="goods-category-edit">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>店铺管理—店铺编辑</span>
            </div>
        </div>
        <card :bordered="false">
            <i-form ref="editDetail" :model="editDetail" :rules="ruleValidate" :label-width="200">
                <div class="basic-information">
                    <row>
                        <i-col span="12">
                            <form-item label="分类名称" prop="typeName">
                                <i-input v-model="editDetail.typeName"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="商品展示方式">
                                <i-select placeholder="请选择" v-model="editDetail.showStyle">
                                    <i-option v-for="item in showStyle" :value="item.value"
                                              :key="item">{{ item.label }}</i-option>
                                </i-select>
                            </form-item>
                        </i-col>
                    </row>
                </div>
            </i-form>
        </card>
    </div>
</template>
