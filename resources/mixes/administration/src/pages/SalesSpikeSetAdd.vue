<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        data() {
            return {
                loading: false,
                searchCategory: '',
                searchProduct: '',
                searchLists: [
                    {
                        value: '北京',
                        label: '北京',
                    },
                    {
                        value: '上海',
                        label: '上海',
                    },
                    {
                        value: '西安',
                        label: '西安',
                    },
                ],
                searchProducts: [
                    {
                        value: '苹果',
                        label: '苹果',
                    },
                    {
                        value: '香蕉',
                        label: '香蕉',
                    },
                ],
                sales: [
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                ],
                ruleValidate: {
                    remarks: [
                        { required: true, message: '信息不能为空', trigger: 'blur' },
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
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="sales-activity-set-add activity-title">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—设置商品-添加商品</span>
            </div>
            <div class="store storeBox">
                <div class="prompt-box">
                    <h6>提示</h6>
                    <p>搜索完商品后请在下方添加商品数量、限购、价格。如未填写则默认为0</p>
                    <p>可批量添加商品（仅相同数量、限购、价格）</p>
                </div>
                <!--搜索模块-->
                <div class="sales-body">
                    <div class="sales-body-header">
                        <row>
                            <i-col span="5">
                                <div class="p-change">
                                    <i-select v-model="searchCategory" placeholder="请选择分类">
                                        <i-option v-for="item in searchLists" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </div>
                            </i-col>
                            <i-col span="3">
                                <div class="p-change">
                                    <i-select v-model="searchProduct" placeholder="请选择品牌">
                                        <i-option v-for="item in searchProducts" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </div>
                            </i-col>
                            <i-col span="3">
                                <div class="p-change">
                                    <i-input placeholder="商品关键词"></i-input>
                                </div>
                            </i-col>
                            <i-col span="1">
                                <div class="p-change">
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </div>
                            </i-col>
                            <i-col span="12">
                            </i-col>
                        </row>
                    </div>
                </div>
                <!--可选商品模块-->
                <div class="sales-list-add">
                    <row>
                        <i-col span="11" class="sales-list">
                            <div>
                                <p>可选商品</p>
                                <div class="my-card">
                                    <card>
                                        <ul>
                                            <li v-for="sale in sales">
                                                <checkbox>
                                                    <span>{{sale.content}}</span>
                                                </checkbox>
                                                <hr>
                                            </li>
                                        </ul>
                                    </card>
                                </div>
                                <!--全选模块-->
                                <div class="all-select">
                                    <row>
                                        <i-col span="3">
                                            <div class="p-list"><i-button type="ghost" style="width:64px">全选</i-button></div>
                                        </i-col>
                                        <i-col span="4">
                                            <div class="p-list">
                                                数量:<i-input style="width:64px;height: 26px"></i-input>件
                                            </div>
                                        </i-col>
                                        <i-col span="4">
                                            <div class="p-list">
                                                限购:<i-input style="width:64px;height: 26px"></i-input>件
                                            </div>
                                        </i-col>
                                        <i-col span="4">
                                            <div class="p-list">
                                                价格:<i-input style="width:64px;height: 26px"></i-input>元
                                            </div>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                        </i-col>
                        <i-col span="2" class="sales-list">
                            <div>
                                <i-button slot="append" type="primary" size="small" class="my-btn">添加至秒杀列表
                                    <icon type="chevron-right"></icon>
                                </i-button>
                                <i-button @click.native="submit" type="primary" size="small" class="my-submit">
                                    <span v-if="!loading">确认提交</span>
                                    <span v-else>正在提交…</span>
                                </i-button>
                            </div>
                        </i-col>
                        <i-col span="11" class="sales-list">
                            <div>
                                <p>参与秒杀商品</p>
                                <div class="my-card">
                                    <card>
                                        <ul>
                                            <li v-for="sale in sales">
                                                <checkbox>
                                                    <span>{{sale.content}}</span>
                                                </checkbox>
                                                <hr>
                                            </li>
                                        </ul>
                                    </card>
                                </div>
                                <div class="all-select">
                                    <row>
                                        <i-col span="3">
                                            <div class="p-list"><i-button type="ghost" style="width: 64px">全选</i-button></div>
                                        </i-col>
                                        <i-col span="3">
                                            <div class="p-list remove"><i-button type="ghost" style="width: 64px">移除</i-button></div>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                        </i-col>
                    </row>
                </div>
            </div>
        </div>
    </div>
</template>
