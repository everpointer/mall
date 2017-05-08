<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                brandColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '名称',
                        key: 'name',
                        width: 200,
                    },
                    {
                        title: '类型',
                        key: 'type',
                        width: 100,
                    },
                    {
                        title: '展示方式',
                        key: 'showStyle',
                        width: 200,
                    },
                    {
                        title: '宽度/字数',
                        key: 'wordNum',
                        width: 150,
                    },
                    {
                        title: '高度',
                        key: 'heightNum',
                        width: 150,
                    },
                    {
                        title: '广告数',
                        key: 'adverNum',
                        width: 150,
                    },
                    {
                        title: '正在展示',
                        key: 'showNum',
                        width: 150,
                    },
                    {
                        title: '是否启用',
                        key: 'isshow',
                        width: 200,
                        render(row) {
                            return `<span v-if="${row.status} === true" class="status-check"><icon type="checkmark-circled"></icon>开启</span>
                                <span v-if="${row.status} === false"><icon type="close-circled"></icon>关闭</span>`;
                        },
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 200,
                        align: 'center',
                        fixed: 'right',
                        render(row, column, index) {
                            return `<dropdown><i-button type="ghost">设置<icon type="arrow-down-b"></icon></i-button>
                                <dropdown-menu slot="list"><dropdown-item>设置设置</dropdown-item></dropdown-menu></dropdown>
                                <i-button type="ghost" class="delete-ad" @click.native="removeAd(${index})">删除</i-button>`;
                        },
                    },
                ],
                brandData: [
                    {
                        name: '商品列表左侧广告位',
                        type: '图片',
                        showStyle: '多广告展示',
                        wordNum: 206,
                        heightNum: 206,
                        adverNum: 0,
                        showNum: 4,
                        isshow: '是',
                        status: true,
                    },
                    {
                        name: '商品列表左侧广告位',
                        type: '图片',
                        showStyle: '多广告展示',
                        wordNum: 206,
                        heightNum: 206,
                        adverNum: 0,
                        showNum: 4,
                        isshow: '是',
                        status: true,
                    },
                    {
                        name: '商品列表左侧广告位',
                        type: '图片',
                        showStyle: '多广告展示',
                        wordNum: 206,
                        heightNum: 206,
                        adverNum: 0,
                        showNum: 4,
                        isshow: '是',
                        status: false,
                    },
                ],
                self: this,
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            exportData() {
                this.$refs.goodsList.exportCsv({
                    filename: '品牌管理数据',
                });
            },
            removeAd(index) {
                this.advertisementData.splice(index, 1);
            },
            newAddData() {
                const self = this;
                self.$router.push({
                    path: 'advertisement/add',
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-brand">
            <tabs value="name1">
                <tab-pane label="品牌管理" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>当店主添加商品时可选择商品品牌，用户可根据品牌查询商品列表
                            被推荐品牌，将在前台品牌推荐模块显示</p>
                        <p>在品牌列表页面，品牌将按类别分组，即具有相同类别的品牌为一组，品牌类别与品牌分类无联系</p>
                    </div>
                    <div class="brand-management">
                        <i-button class="add-data" type="ghost" @click.native="newAddData">+新增数据</i-button>

                        <i-button class="export-btn" @click="exportData" type="ghost">导出数据</i-button>
                        <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                    </div>
                    <i-table highlight-row :columns="brandColumns" :context="self"
                             :data="brandData"></i-table>
                </tab-pane>
                <tab-pane label="待审核" name="name2">

                </tab-pane>
            </tabs>
        </div>
    </div>
</template>