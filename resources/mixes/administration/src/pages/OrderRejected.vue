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
                pendingColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '退单编号',
                        key: 'memberID',
                        width: 190,
                        align: 'center',
                    },
                    {
                        title: '退款金额',
                        key: 'memberAccount',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请原因',
                        key: 'applicationStatus',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请图片',
                        key: 'shopLength',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请原因',
                        key: 'contactName',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '申请时间',
                        key: 'contactPhone',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '涉及商品',
                        key: 'contactEmail',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '退货数量',
                        key: 'companyName',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商品ID',
                        key: 'companyAddress',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '订单编号',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家处理时间',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家处理备注',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '买家ID',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家ID',
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
                            return '<i-button type="ghost" size="small">处理</i-button>';
                        },
                    },
                ],
                pendingData: [
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
                allRecordsColumns: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '退单编号',
                        key: 'memberID',
                        width: 190,
                        align: 'center',
                    },
                    {
                        title: '退款金额',
                        key: 'memberAccount',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请原因',
                        key: 'applicationStatus',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请图片',
                        key: 'shopLength',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '申请时间',
                        key: 'contactPhone',
                        width: 100,
                        align: 'center',
                    },
                    {
                        title: '涉及商品',
                        key: 'contactEmail',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '退货数量',
                        key: 'companyName',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商品ID',
                        key: 'companyAddress',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '订单编号',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家处理',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家处理备注',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '平台处理',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '平台处理备注',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '买家ID',
                        key: 'companyPhone',
                        width: 150,
                        align: 'center',
                    },
                    {
                        title: '商家ID',
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
                allRecordsData: [
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
    };
</script>
<template>
  <div class="mall-wrap">
      <div class="store">
          <tabs value="name1">
              <tab-pane label="待处理" name="name1">
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
                      <i-table highlight-row class="shop-table" :columns="pendingColumns" :data="pendingData"></i-table>
                  </div>
                  <div>
                      <page :total="100" show-elevator></page>
                  </div>
              </tab-pane>
              <tab-pane label="所有记录" name="name2">
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
                        <i-table highlight-row class="shop-table" :columns="allRecordsColumns" :data="allRecordsData"></i-table>
                        <div>
                            <page :total="100" show-elevator></page>
                        </div>
                  </div>
              </tab-pane>
          </tabs>
    </div>
  </div>
</template>
