<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                searchCategory: '',
                searchWord: '',
                searchList: [
                    {
                        value: '订单编号',
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
                libraryColumns: [
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
                            return '<icon type="image"></icon>';
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
                            return `<i-button  class="first-btn"  @click.native="toEdit" type="ghost" size="small">编辑</i-button>
                                    <i-button class="first-btn" @click.native="remove(${index})" type="ghost" size="small">删除</i-button>`;
                        },
                    },
                ],
                libraryData: [
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
        methods: {
            remove(index) {
                this.libraryData.splice(index, 1);
            },
            toEdit() {
                const self = this;
                self.$router.push(
                    {
                        path: 'library/edit',
                    },
                );
            },
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-library">
            <tabs value="name1">
                <tab-pane label="商品库管理" name="name1">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>商品库中该数据的删除不影响店铺已经认领的商品</p>
                        </div>
                        <div class="store-body">
                            <div class="store-body-header">
                                <i-button class="export-btn" @click="exportData" type="ghost">+新增数据</i-button>
                                <div class="store-body-header-right">
                                    <i-input v-model="searchWord" placeholder="请输入关键词进行搜索">
                                        <i-select v-model="searchCategory" slot="prepend" style="width: 100px">
                                            <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                        </i-select>
                                        <i-button slot="append" type="primary">搜索</i-button>
                                    </i-input>
                                </div>
                            </div>
                            <i-table ref="orderTable" highlight-row :context="self" class="shop-table" :columns="libraryColumns" :data="libraryData"></i-table>
                        </div>
                        <div class="page">
                            <page :total="100" show-elevator></page>
                        </div>
                    </card>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
