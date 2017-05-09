<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                typeColumns: [
                    {
                        title: '相册ID',
                        key: 'albumId',
                    },
                    {
                        title: '相册名称',
                        key: 'albumName',
                    },
                    {
                        title: '店铺ID',
                        key: 'shopId',
                    },
                    {
                        title: '店铺名称',
                        key: 'shopName',
                    },
                    {
                        title: '封面图片',
                        key: 'coverImg',
                        render() {
                            return '<icon type="image"></icon>';
                        },
                    },
                    {
                        title: '图片数量',
                        key: 'albumNum',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 180,
                        render(row, column, index) {
                            return `<i-button type="ghost" class="delete-ad" @click.native="look">查看</i-button>
                                <i-button type="ghost" class="delete-ad" @click.native="remove(${index})">删除</i-button>`;
                        },
                    },
                ],
                typeData: [
                    {
                        albumId: '01',
                        albumName: '默认相册',
                        shopId: '336',
                        shopName: 'Rey吕官方旗舰店',
                        albumNum: 50,
                    },
                    {
                        albumId: '01',
                        albumName: '默认相册',
                        shopId: '336',
                        shopName: 'Rey吕官方旗舰店',
                        albumNum: 50,
                    },
                    {
                        albumId: '01',
                        albumName: '默认相册',
                        shopId: '336',
                        shopName: 'Rey吕官方旗舰店',
                        albumNum: 50,
                    },
                ],
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
                self: this,
                managementSearch: '',
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            remove(index) {
                this.typeData.splice(index, 1);
            },
            lookData() {
                const self = this;
                self.$router.push({
                    path: 'picture/look',
                });
            },
            look() {

            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-picture">
            <tabs value="name1">
                <tab-pane label="图片空间" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>相册删除后，相册内全部图片都会删除，不能回复，请谨慎操作</p>
                    </div>
                    <div class="album-action">
                        <i-button class="add-data" type="ghost" @click.native="lookData">全部图片</i-button>
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
                    <i-table highlight-row :columns="typeColumns" :context="self"
                             :data="typeData"></i-table>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>