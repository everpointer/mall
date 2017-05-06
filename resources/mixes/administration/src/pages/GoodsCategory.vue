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
                        title: '商品名称',
                        key: 'name',
                        align: 'center',
                        width: 200,
                    },
                    {
                        title: '商品图片',
                        key: 'pic',
                        width: 170,
                        align: 'center',
                        render() {
                            return '<Icon type="image"></Icon>';
                        },
                    },
                    {
                        title: '广告词',
                        key: 'advertising',
                        width: 170,
                        align: 'left',
                    },
                    {
                        title: '分类ID',
                        key: 'configurationID',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '分类名称',
                        key: 'configurationName',
                        width: 200,
                        align: 'center',
                    },
                    {
                        title: '品牌ID',
                        key: 'brandID',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '品牌名称',
                        key: 'brandName',
                        align: 'center',
                        width: 100,
                    },
                    {
                        title: '发布时间',
                        key: 'time',
                        align: 'center',
                        width: 250,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 180,
                        align: 'center',
                        render(row, column, index) {
                            return `<dropdown><i-button type="ghost">设置<icon type="arrow-down-b"></icon></i-button>
                                <dropdown-menu slot="list">
                                    <dropdown-item>编辑分类信息</dropdown-item>
                                    <dropdown-item>新增下级分类</dropdown-item>
                                    <dropdown-item>查看下级分类</dropdown-item>
                                    <dropdown-item>编辑分类导航</dropdown-item>
                                </dropdown-menu></dropdown>
                                <i-button type="ghost" class="delete-ad"
                                @click.native="remove(${index})">删除</i-button>`;
                        },
                    },
                ],
                classificationData: [
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
                    },
                    {
                        name: '太阳镜眼睛放蓝光紫外线',
                        pic: '',
                        advertising: '17年春夏新品纯棉面料',
                        configurationID: 33,
                        configurationName: '运动健康>户外>鞋服',
                        brandID: 33,
                        brandName: '迪卡侬',
                        time: '2017-03-30 16:30:41',
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
                            <p>“商品展示”为在商品列表页的展示方式</p>
                            <p>“颜色”：每个SPU只展示不同颜色的SKU，同一颜色多个SKU只展示一个SKU</p>
                            <p>“SPU”：每个SPU只展示一个SKU</p>
                            <p>“编辑分类导航”功能可以设置前台左上侧商品分类导航的相关信息，可以设置分类前图片、分类别名、
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
