<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                searchCategory: '',
                searchWord: '',
                goodColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                    },
                    {
                        title: '排序',
                        key: 'sort',
                        width: 150,
                        render() {
                            return '<i-input type="ghost" style="width: 64px;"></i-input>';
                        },
                    },
                    {
                        title: '分类名称',
                        key: 'typeName',
                        width: 200,
                        render() {
                            return '<i-input type="ghost" style="width: 128px;"></i-input>';
                        },
                    },
                    {
                        title: '类型',
                        key: 'typeStyle',
                        width: 150,
                    },
                    {
                        title: '分拥比例',
                        key: 'commissionRate',
                        width: 150,
                    },
                    {
                        title: '商品展示',
                        key: 'goodShow',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 200,
                        align: 'center',
                        render(row, column, index) {
                            return `<dropdown><i-button type="ghost">设置<icon type="arrow-down-b"></icon></i-button>
                                <dropdown-menu slot="list">
                                    <dropdown-item @click.native="editType">编辑分类信息</dropdown-item>
                                    <dropdown-item>新增下级分类</dropdown-item>
                                    <dropdown-item>查看下级分类</dropdown-item>
                                    <dropdown-item @click.native="editTypeNav">编辑分类导航</dropdown-item>
                                </dropdown-menu></dropdown>
                                <i-button type="ghost" class="delete-ad"
                                @click.native="remove(${index})">删除</i-button>`;
                        },
                    },
                ],
                classificationData: [
                    {
                        typeStyle: '通用类型',
                        commissionRate: '5%',
                        goodShow: '颜色',
                    },
                    {
                        typeStyle: '通用类型',
                        commissionRate: '5%',
                        goodShow: '颜色',
                    },
                    {
                        typeStyle: '通用类型',
                        commissionRate: '5%',
                        goodShow: '颜色',
                    },
                    {
                        typeStyle: '通用类型',
                        commissionRate: '5%',
                        goodShow: '颜色',
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
            editType() {
                const self = this;
                self.$router.push({
                    path: 'category/edit',
                });
            },
            editTypeNav() {
                const self = this;
                self.$router.push({
                    path: 'category/edit/nav',
                });
            },
            exportData() {
                this.$refs.goodTable.exportCsv({
                    filename: '商品分类数据',
                });
            },
            remove(index) {
                this.classificationData.splice(index, 1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-category">
            <tabs value="name1">
                <tab-pane label="分类管理" name="name1">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>当店主添加商品时可选择商品分类，用户可根据分类查询商品列表</p>
                            <p>对分类做任何更改后，都需要到 站点设置>清理缓存 清理商品分类，新的设置才会生效</p>
                            <p>"商品展示"为在商品列表页的展示方式</p>
                            <p>"颜色"：每个SPU只展示不同颜色的SKU，同一颜色多个SKU只展示一个SKU</p>
                            <p>"SPU"：每个SPU只展示一个SKU</p>
                            <p>"编辑分类导航"功能可以设置前台左上侧商品分类导航的相关信息，可以设置分类前图片、分类别名、
                                推荐分类、推荐品牌以及两张广告图片</p>
                            <p>分类导航信息设置弯沉够，需要更新“首页及频道”缓存</p>
                        </div>
                        <div class="store-body">
                            <div class="store-body-header">
                                <i-button @click="addData" type="ghost">+新增数据</i-button>
                                <i-button @click="exportData" type="ghost">导出数据</i-button>
                                <i-button @click="deleteData" type="ghost">批量删除</i-button>
                                <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                            </div>
                            <i-table ref="goodTable" highlight-row :context="self" class="shop-table"
                                     :columns="goodColumns" :data="classificationData"></i-table>
                        </div>
                        <div class="page">
                            <page :total="100" show-elevator></page>
                        </div>
                    </card>
                </tab-pane>
                <tab-pane label="TAG管理" name="name2">

                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
