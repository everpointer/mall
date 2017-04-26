<script>
    import injection from '../helpers/injection';

    export default {
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
                managementColumns: [
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
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '店主账号',
                        key: 'ownerId',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家账号',
                        key: 'businessNumber',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '店铺头像',
                        key: 'shopImg',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '店铺LOGO',
                        key: 'shopLogo',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '店铺等级',
                        key: 'shopLevel',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '开店时间',
                        key: 'shopTime',
                        width: 150,
                        align: 'center',
                    },
                    {
                      title: '到期时间',
                      key: 'endTime',
                      width: 150,
                      align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 140,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">删除</i-button><i-button type="ghost" size="small">查看</i-button>';
                        },
                    },
                ],
                managementData: [
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
                applicationColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '会员ID',
                        key: 'memberID',
                        width: 190,
                        align: 'center',
                    },
                    {
                        title: '会员账号',
                        key: 'memberAccount',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请状态',
                        key: 'applicationStatus',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '开店时长',
                        key: 'shopLength',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '联系人姓名',
                        key: 'contactName',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '联系人电话',
                        key: 'contactPhone',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '联系邮箱',
                        key: 'contactEmail',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '公司名称',
                        key: 'companyName',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '公司地址',
                        key: 'companyAddress',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '公司电话',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 140,
                        align: 'center',
                        render() {
                          return '<i-button type="ghost" size="small">查看</i-button>';
                        },
                    },
                ],
                applicationData: [
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
                {
                    memberID: '65454654546',
                    memberAccount: '465465445',
                    applicationStatus: '等待审核',
                    shopLength: '3年',
                    contactName: '王',
                    contactPhone: '15434354534',
                    contactEmail: '105454354@qq.com',
                    companyName: '本初网络',
                    companyAddress: '陕西西安',
                    companyPhone: '029-5554544',
                },
              ],
            };
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
        <div class="store">
            <tabs value="name1">
                <tab-pane label="店铺管理" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，但是店主仍然可以编辑该店铺</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <i-button class="export-btn" type="ghost">导出数据</i-button>
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord">
                                    <i-select v-model="searchCategory" slot="prepend">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row class="shop-table" :columns="managementColumns" :data="managementData"></i-table>
                    </div>
                    <page :total="100" show-elevator></page>
                </tab-pane>
                <tab-pane label="开店申请" name="name2">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，但是店主仍然可以编辑该店铺</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <div class="store-body-header-right">
                                <i-input v-model="searchWord">
                                    <i-select v-model="searchCategory" slot="prepend">
                                      <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                        <i-table highlight-row class="shop-table" :columns="applicationColumns" :data="applicationData"></i-table>
                    </div>
                    <page :total="100" show-elevator></page>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
