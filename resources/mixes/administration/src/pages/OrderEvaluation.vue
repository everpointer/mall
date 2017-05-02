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
                searchCategory: '',
                searchWord: '',
                searchList: [
                    {
                        value: '店铺名称',
                        label: '店铺名称',
                    },
                    {
                        value: '商品名称',
                        label: '商品名称',
                    },
                    {
                        value: '商品分类',
                        label: '商品分类',
                    },
                ],
                evaluationListColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '评价人',
                        key: 'evaluationPeople',
                        width: 190,
                        align: 'center',
                    },
                    {
                        title: '评分',
                        width: 150,
                        align: 'center',
                        render() {
                            return '<Icon type="star" style="color:#f7d55f;"></Icon><Icon type="star" style="color:#f7d55f;"></Icon><Icon type="star" style="color:#f7d55f;"></Icon><Icon type="star" style="color:#f7d55f;"></Icon><Icon type="star" style="color:#f7d55f;"></Icon>';
                        },
                    },
                    {
                        title: '评价内容',
                        key: 'evaluationContent',
                        width: 400,
                        align: 'center',
                    },
                    {
                        title: '晒单图片',
                        key: 'baskImage',
                        width: 300,
                        align: 'center',
                    },
                    {
                        title: '评价时间',
                        key: 'evaluationTime',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '被评商品',
                        key: 'evaluationProduct',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 150,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">删除</i-button>';
                        },
                    },
                ],
                evaluationListData: [
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                    {
                        evaluationPeople: 'pingjia',
                        evaluationContent: '时尚但不易过时，高上大，还配有眼睛盒，发货速度',
                        baskImage: '',
                        evaluationTime: '2016-12-23',
                        evaluationProduct: '黎明眼镜GUCCI古驰太阳',
                    },
                ],
            };
        },
        methods: {
            exportData() {
                this.$refs.evaluationListTable.exportCsv({
                    filename: '评价管理数据',
                });
            },
            remove(index) {
                this.evaluationListData.splice(index, 1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="order-evaluation">
            <tabs value="name1">
                <tab-pane label="评价列表" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>买家可以在订单完成后对订单商品进行评价操作，评价信息将显示在对应的商品页面</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <i-button class="export-btn" type="ghost" @click="exportData">批量删除</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord">
                                    <i-select v-model="searchCategory" slot="prepend" style="width: 100px">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table  ref="evaluationListTable" highlight-row class="shop-table" :columns="evaluationListColumns" :data="evaluationListData"></i-table>
                    </div>
                    <div class="page">
                        <page :total="100" show-elevator></page>
                    </div>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>