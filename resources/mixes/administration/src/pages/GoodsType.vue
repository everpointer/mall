<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                typeColumns: [
                    {
                        title: '类型ID',
                        key: 'typeId',
                    },
                    {
                        title: '类型名称',
                        key: 'typeName',
                    },
                    {
                        title: '类型排序',
                        key: 'sort',
                    },
                    {
                        title: '快捷定位ID',
                        key: 'positionId',
                    },
                    {
                        title: '快捷定位名称',
                        key: 'positionName',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        render(row, column, index) {
                            return `<i-button type="ghost" class="delete-ad" @click.native="edit">编辑</i-button>
                                <i-button type="ghost" class="delete-ad" @click.native="remove(${index})">删除</i-button>`;
                        },
                    },
                ],
                typeData: [
                    {
                        typeId: '0001',
                        typeName: '迪卡侬',
                        sort: '6',
                        positionId: '22',
                        positionName: '液晶电视',
                    },
                    {
                        typeId: '0001',
                        typeName: '迪卡侬',
                        sort: '6',
                        positionId: '22',
                        positionName: '液晶电视',
                    },
                    {
                        typeId: '0001',
                        typeName: '迪卡侬',
                        sort: '6',
                        positionId: '22',
                        positionName: '液晶电视',
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
            remove(index) {
                this.typeData.splice(index, 1);
            },
            newAddData() {
                const self = this;
                self.$router.push({
                    path: 'type/add',
                });
            },
            edit() {
                const self = this;
                self.$router.push({
                    path: 'type/edit',
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-type">
            <tabs value="name1">
                <tab-pane label="类型管理" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>当管理员添加商品分类时需选择类型。前台分类下商品列表页通过类型生成商品检索，方便用户搜索需要的商品</p>
                    </div>
                    <div class="advertisement-action">
                        <i-button class="add-data" type="ghost" @click.native="newAddData">+新增数据</i-button>
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