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
                columns4: [
                    {
                        type: 'selection',
                        width: 0,
                        align: 'center',
                    },
                    {
                        title: '排序',
                        key: 'rank',
                    },
                    {
                        title: '等级名称',
                        key: 'name',
                    },
                    {
                        title: '保证金额',
                        key: 'number',
                    },
                    {
                        title: '操作',
                        key: 'operate',
                    },

                ],
                data1: [
                    {
                        rank: '王小明',
                        name: 18,
                        number: 100,
                        operate: 100,
                    },
                    {
                        rank: '张小刚',
                        name: 25,
                        number: 1000,
                        operate: 1000,
                    },
                    {
                        rank: '张小刚',
                        name: 25,
                        number: 10000,
                        operate: 10000,
                    },
                    {
                        rank: '张小刚',
                        name: 25,
                        number: 30000,
                        operate: 30000,
                    },
                    {
                        rank: '张小刚',
                        name: 25,
                        number: 50000,
                        operate: 50000,
                    },
                ],
            };
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="store-category">
            <card>
                <!--提示模块-->
                <div class="prompt">
                    <div>
                        <p>提示<br>商家入驻时可指定此处设置店铺分类,<br>对分类作任何更改后，都需要到 设置 -> 清理缓存 清理店铺分类，新的设置才会生效</p>
                    </div>
                </div>
                <!--button新增数据-->
                <Button type="ghost" class="btn">新增数据</Button>
                <!--table模块-->
                <!--<i-table border :columns="columns4" :data="data1" width="1524" height="345"></i-table>-->
                <i-table border :columns="columns4" :data="data1"></i-table>
            </card>
        </div>
    </div>
</template>
