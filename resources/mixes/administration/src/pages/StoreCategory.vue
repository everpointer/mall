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
                storeCategoryColumns: [
                    {
                        type: 'selection',
                        width: 100,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '排序',
                        width: 200,
                        align: 'center',
                        render() {
                            return '<i-input type="ghost" style="width: 48px;"></i-input>';
                        },
                    },
                    {
                        title: '分类名称',
                        width: 500,
                        align: 'center',
                        render() {
                            return '<i-input type="ghost" style="width: 268px;"></i-input>';
                        },
                    },
                    {
                        title: '保证金属额',
                        key: 'number',
                        width: 500,
                        align: 'center',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        width: 200,
                        align: 'center',
                        render() {
                            return '<i-button type="ghost" size="small">删除</i-button><i-button type="ghost" size="small">设置</i-button>';
                        },
                    },
                ],
                storeCategoryData: [
                    {
                        number: 100,
                    },
                    {
                        number: 1000,
                    },
                    {
                        number: 10000,
                    },
                    {
                        number: 30000,
                    },
                    {
                        number: 50000,
                    },
                ],
            };
        },
        methods: {
            exportData() {
                this.$refs.storeCategoryTable.exportCsv({
                    filename: '店铺分类数据',
                });
            },
            remove(index) {
                this.storeCategoryData.splice(index, 1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="storeClassifications">
            <tabs value="name1">
                <tab-pane label="店铺分类" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>商家入驻时可指定此处设置店铺分类</p>
                        <p>对分类作任何更改后，都需要到 设置 -> 清理缓存 清理店铺分类，新的设置才会生效</p>
                    </div>
                    <div class="store-body">
                        <div class="store-body-header">
                            <i-button class="export-btn" type="ghost" @click="exportData()">新增数据</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                        </div>
                        <i-table ref="storeCategoryTable"  highlight-row class="shop-table" :columns="storeCategoryColumns" :data="storeCategoryData"></i-table>
                    </div>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
