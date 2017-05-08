<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                editDetail: {
                    goodsSort: '',
                    quotaRatio: '',
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
                interestStyle: '',
                interestRadio: '',
                interestType: '',
                location: [
                    {
                        value: '1',
                        label: '颜色',
                    },
                    {
                        value: '2',
                        label: '类型',
                    },
                ],
                loading: false,
                ruleValidate: {
                    typeName: [
                        { required: true, message: '名称名称不能为空', trigger: 'blur' },
                    ],
                    quotaRatio: [
                        { required: true, message: '分佣比例不能为空', trigger: 'blur' },
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
                self.$refs.editDetail.validate(valid => {
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
        <div class="goods-category-edit">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>分类管理—编辑"珠宝手表"</span>
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
                                    <div class="tip">
                                        <p>在商品列表页的展示方式</p>
                                        <p>"颜色"：每个SPU只展示不同个颜色SKU，同一颜色多个SKU只展示一个SKU</p>
                                        <p>"SPU"：每个SUP只展示一个SKU</p>
                                    </div>
                                    <checkbox-group v-model="editDetail.interestStyle">
                                        <checkbox label="关联到子分类"></checkbox>
                                    </checkbox-group>
                                    <p class="contact tip">勾选关联到子分类后，被绑定的商品展示方式也将继承到子分类中使用</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="分佣比例" prop="quotaRatio">
                                    <i-input v-model="editDetail.quotaRatio"></i-input>
                                    <div class="tip">
                                        <p>分佣比例必须为0-100的整数</p>
                                    </div>
                                    <checkbox-group v-model="editDetail.interestRadio">
                                        <checkbox label="关联到子分类"></checkbox>
                                    </checkbox-group>
                                    <p class="contact tip">勾选关联到子分类后，被绑定的商品展示方式也将继承到子分类中使用</p>
                                </form-item>
                            </i-col>
                            <i-col span="1" class="inline-symbol">%</i-col>
                        </row>
                        <form-item label="类型">
                            <row>
                                <i-col span="2" class="position-module">快捷定位
                                    <div class="tip">
                                        <p>如果当前下拉选项中没有适合的类型，可以去
                                            <a href="">类型管理</a>
                                            功能中添加新的类型</p>
                                    </div>
                                    <checkbox-group v-model="editDetail.interestType" class="tip"
                                                    style="text-align: inherit; color: inherit">
                                        <checkbox label="关联到子分类"></checkbox>
                                    </checkbox-group>
                                    <p class="contact tip">勾选关联到子分类后，被绑定的商品展示方式也将继承到子分类中使用</p>
                                </i-col>
                                <i-col span="10" class="select-dropdown">
                                    <i-select placeholder="请选择" v-model="editDetail.location">
                                        <i-option v-for="item in location" :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </i-col>
                                <i-col span="12" class="inline-symbol" style="text-align: inherit">分类下的商品类型</i-col>
                            </row>
                        </form-item>
                        <row>
                            <i-col span="12">
                                <form-item label="排序">
                                    <i-input v-model="editDetail.goodsSort"></i-input>
                                    <p class="contact tip">数字范围为0~255，数字越小越靠前</p>
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
