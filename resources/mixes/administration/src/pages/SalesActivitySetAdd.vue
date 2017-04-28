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
                searchProduct: '',
                searchLists: [
                    {
                        value: '请选择分类',
                        label: '请选择分类',
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
                columns1: [
                    {
                        title: '姓名',
                        key: 'name',
                    },
                    {
                        title: '年龄',
                        key: 'age',
                    },
                    {
                        title: '地址',
                        key: 'address',
                    },
                ],
                data1: [
                    {
                        name: '王小明',
                        age: 18,
                        address: '北京市朝阳区芍药居',
                    },
                    {
                        name: '张小刚',
                        age: 25,
                        address: '北京市海淀区西二旗',
                    },
                    {
                        name: '李小红',
                        age: 30,
                        address: '上海市浦东新区世纪大道',
                    },
                    {
                        name: '周小伟',
                        age: 26,
                        address: '深圳市南山区深南大道',
                    },
                ],
                sales: [
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                    { content: '  iphone8 plus星空蓝全新发布 信用卡12期分期免息' },
                ],
            };
        },
    };
</script>
<template>
    <!--<div class="mall-wrap">-->
        <!--<div class="store">-->
            <!--<tabs value="name1">-->
                <!--<tab-pane icon="chevron-left" label="秒杀活动-设置商品-添加商品" name="name1" class="activity-title">-->
                    <!--<div class="prompt-box">-->
                        <!--<h6>提示</h6>-->
                        <!--<p>搜索完商品后请在下方添加商品数量、限购、价格。如未填写则默认为0</p>-->
                        <!--<p>可批量添加商品（仅相同数量、限购、价格）</p>-->
                    <!--</div>-->
                    <!--<div class="sales-body">-->
                        <!--<div class="sales-body-header">-->
                            <!--<ul class="sales-body-header-left">-->
                                <!--<li>-->
                                    <!--<i-select v-model="searchCategory" slot="prepend">-->
                                        <!--<i-option v-for="item in searchLists" :value="item.value" :key="item">{{ item.label }}</i-option>-->
                                    <!--</i-select>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<i-select v-model="searchCategory" slot="prepend">-->
                                        <!--<i-option v-for="item in searchLists" :value="item.value" :key="item">{{ item.label }}</i-option>-->
                                    <!--</i-select>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<i-input v-model="searchProduct" placeholder="商品关键词"></i-input>-->
                                <!--</li>-->
                                <!--<li>-->
                                    <!--<i-button slot="append" type="primary">搜索</i-button>-->
                                <!--</li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<ul class="sales-list-add">-->
                        <!--<li class="sales-list">-->
                            <!--<p>可选商品</p>-->
                            <!--<div class="my-card">-->
                                <!--<card>-->
                                    <!--<ul>-->
                                        <!--<li v-for="sale in sales">-->
                                            <!--<checkbox>-->
                                                <!--<span>{{sale.content}}</span>-->
                                            <!--</checkbox>-->
                                            <!--<hr>-->
                                        <!--</li>-->
                                    <!--</ul>-->
                                <!--</card>-->
                            <!--</div>-->
                            <!--<div class="all-select">-->
                                <!--<div>-->
                                    <!--<button>全选</button>-->
                                <!--</div>-->
                                <!--<div>数量: <input type="text">&nbsp;件</div>-->
                                <!--<div>限购: <input type="text">&nbsp;件</div>-->
                                <!--<div>价格: <input type="text">&nbsp;元</div>-->
                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="sales-list">-->
                            <!--<i-button slot="append" type="primary">添加至秒杀列表 ></i-button>-->
                            <!--<div class="my-submit">-->
                                <!--<i-button slot="append" type="primary" class="last-btn">确认提交</i-button>-->
                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="sales-list">-->
                            <!--<p>参与秒杀商品</p>-->
                            <!--<div class="my-card">-->
                                <!--<card>-->
                                    <!--<ul>-->
                                        <!--<li v-for="sale in sales">-->
                                            <!--<checkbox>-->
                                                <!--<span>{{sale.content}}</span>-->
                                            <!--</checkbox>-->
                                            <!--<hr>-->
                                        <!--</li>-->
                                    <!--</ul>-->
                                <!--</card>-->
                            <!--</div>-->
                            <!--<div class="all-select">-->
                                <!--<div>-->
                                    <!--<button>全选</button>-->
                                    <!--<button>移除</button>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</tab-pane>-->
            <!--</tabs>-->
        <!--</div>-->
    <!--</div>-->
    <div class="mall-wrap">
        <div class="sales-activity-set">
            <div class="edit-link-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—设置商品-添加商品</span>
            </div>
            <div class="prompt-box">
                <h6>提示</h6>
                <p>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，但是店主仍然可以编辑该店铺</p>
            </div>
            <div class="prompt-box promptBox">
                <h6>提示</h6>
                <p>建议设置四至五个时间段（前台显示）</p>
            </div>
            <div class="store-body">
                <div class="store-body-header">
                    <i-button class="export-btn" type="ghost">+添加秒杀时段</i-button>
                    <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                </div>
                <i-table highlight-row class="shop-table" :columns="timeListColumns" :data="timeListData"></i-table>
            </div>
        </div>
    </div>
</template>
