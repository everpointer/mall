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
                managementColumns: [
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
                managementData: [
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
    };
</script>
<template>
    <div class="mall-wrap store-category">
        <div class="store">
            <div class="prompt-box promptBox">
                <h6>提示</h6>
                <p>商家入驻时可指定此处设置店铺分类</p>
                <p>对分类作任何更改后，都需要到 设置 -> 清理缓存 清理店铺分类，新的设置才会生效</p>
            </div>
            <div class="store-body">
                <div class="store-body-header">
                    <i-button class="export-btn" type="ghost">新增数据</i-button>
                    <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                </div>
            <i-table highlight-row class="shop-table" :columns="managementColumns" :data="managementData"></i-table>
            </div>
        </div>
    </div>
</template>
