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
                goodsColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '店铺ID',
                        key: 'shopID',
                        width: 190,
                        align: 'center',
                    },
                    {
                        title: '店铺名称',
                        key: 'shopName',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '店主账号',
                        key: 'ownerId',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '商家账号',
                        key: 'businessNumber',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '店铺头像',
                        key: 'shopImg',
                        width: 100,
                        align: 'center',
                        render() {
                            return '<Icon type="image"></Icon>';
                        },
                    },
                    {
                        title: '店铺LOGO',
                        key: 'shopLogo',
                        width: 100,
                        align: 'center',
                        render() {
                            return '<Icon type="image"></Icon>';
                        },
                    },
                    {
                        title: '店铺等级',
                        key: 'shopLevel',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '开店时间',
                        key: 'shopTime',
                        width: 170,
                        align: 'center',
                    },
                    {
                        title: '到期时间',
                        key: 'endTime',
                        align: 'left',
                        width: 170,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 180,
                        align: 'center',
                        render(row, column, index) {
                            return `<i-button class="first-btn" @click.native="remove(${index})" type="ghost" size="small">删除</i-button>
                                    <i-button @click.native="toEdit" type="ghost" size="small">编辑</i-button>`;
                        },
                    },
                ],
                goodsData: [
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                    {
                        shopID: '65454654546',
                        shopName: '默认',
                        ownerId: '545464554',
                        businessNumber: '爱拍数码',
                        shopImg: '541',
                        shopLogo: '454',
                        shopLevel: '钻石店铺',
                        shopTime: '2017-12-5',
                        endTime: '2017-12-5',
                    },
                ],
            };
        },
        methods: {
            exportData() {
                this.$refs.goodsList.exportCsv({
                    filename: '商品管理数据',
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-wrap">
            <tabs value="name1">
                <tab-pane label="所有商品" name="name1" class="all-goods">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>上架，当商品处于非上架状态时，前台将不能浏览该商品，店主可控制商品上架状态</p>
                            <p>违规下架，当商品处于违规下架状态时，前台将不能购买该商品，只有管理员可控制商品违规下架状态，
                                并且商品只有重新编辑后才能上架</p>
                            <p>设置项中可以查看商品详细、查看商品SKU。查看商品详细，跳转到商品详细页。查看商品SKU，显示商
                                品的SKU、图片、价格、库存信息</p>
                        </div>
                        <div class="goods-list">
                            <div class="goods-body-header">
                                <i-button class="export-btn" @click="exportData" type="ghost">导出数据</i-button>
                                <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                                <div class="goods-body-header-right">
                                    <i-input v-model="managementWord" placeholder="请输入关键词进行搜索">
                                        <i-select v-model="managementSearch" slot="prepend" style="width: 100px;">
                                            <i-option v-for="item in searchList"
                                                      :value="item.value">{{ item.label }}</i-option>
                                        </i-select>
                                        <i-button slot="append" type="primary">搜索</i-button>
                                    </i-input>
                                </div>
                            </div>
                            <i-table ref="goodsList" highlight-row class="goods-table" :columns="goodsColumns"
                                     :context="self" :data="goodsData"></i-table>
                        </div>
                        <div class="page">
                            <page :total="100" show-elevator></page>
                        </div>
                    </card>
                </tab-pane>
                <tab-pane label="违规下架" name="name2">

                </tab-pane>
                <tab-pane label="等待审核" name="name3">

                </tab-pane>
                <tab-pane label="商品设置" name="name4">

                </tab-pane>
            </tabs>
        </div>
    </div>
</template>