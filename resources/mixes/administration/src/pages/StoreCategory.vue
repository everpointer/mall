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
                        rank: '1',
                        name: '服装鞋帽',
                        number: 100,
                        operate: '',
                    },
                    {
                        rank: '2',
                        name: '服装鞋帽',
                        number: 1000,
                        operate: '',
                    },
                    {
                        rank: '3',
                        name: '服装鞋帽',
                        number: 10000,
                        operate: '',
                    },
                    {
                        rank: '4',
                        name: '服装鞋帽',
                        number: 30000,
                        operate: '',
                    },
                    {
                        rank: '5',
                        name: '服装鞋帽',
                        number: 50000,
                        operate: '',
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
                <!--<iButton type="ghost" class="btn">新增模块</iButton>-->
                <button>
                    <router-link to="/" class="text-left">新增数据</router-link>
                </button>
                <!--table模块-->
                <!--<i-table border :columns="columns4" :data="data1" width="1524" height="345"></i-table>-->
                <i-table border :columns="columns4" :data="data1" class="my-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="list2">服装鞋帽</td>
                            <td></td>
                            <td class="ivu-table-cell">
                                <button>删除</button>
                                <button>设置</button>
                            </td>
                        </tr>
                    </tbody>
                </i-table>
            </card>
        </div>
    </div>
</template>
