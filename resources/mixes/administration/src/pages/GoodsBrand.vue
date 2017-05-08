<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                brandColumns: [
                    {
                        title: '品牌ID',
                        key: 'brandId',
                    },
                    {
                        title: '品牌名称',
                        key: 'name',
                    },
                    {
                        title: '首字母',
                        key: 'initials',
                    },
                    {
                        title: '品牌图片',
                        key: 'brandPicture',
                        render() {
                            return '<icon type="image"></icon>';
                        },
                    },
                    {
                        title: '品牌排序',
                        key: 'sort',
                    },
                    {
                        title: '是否推荐品牌',
                        key: 'isshow',
                        render(row) {
                            return `<span v-if="${row.status} === true" class="status-check"><icon type="checkmark-circled"></icon>是</span>
                                <span v-if="${row.status} === false"><icon type="close-circled"></icon>否</span>`;
                        },
                    },
                    {
                        title: '展示形式',
                        key: 'showStyle',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        render() {
                            return '<i-button type="ghost" @click.native="edit">编辑</i-button>';
                        },
                    },
                ],
                brandData: [
                    {
                        brandId: '001',
                        name: '迪卡侬',
                        initials: 'Y',
                        sort: 4,
                        isshow: '是',
                        status: true,
                        showStyle: '图片',
                    },
                    {
                        brandId: '001',
                        name: '迪卡侬',
                        initials: 'Y',
                        sort: 4,
                        isshow: '否',
                        status: false,
                        showStyle: '图片',
                    },
                    {
                        brandId: '001',
                        name: '迪卡侬',
                        initials: 'Y',
                        sort: 4,
                        isshow: '是',
                        status: true,
                        showStyle: '图片',
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
                this.$refs.brand.exportCsv({
                    filename: '品牌管理数据',
                });
            },
            newAddData() {
            },
            edit() {
                const self = this;
                self.$router.push({
                    path: 'brand/edit',
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
                             :data="brandData" ref="brand"></i-table>
                </tab-pane>
                <tab-pane label="待审核" name="name2">

                </tab-pane>
            </tabs>
        </div>
    </div>
</template>