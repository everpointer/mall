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
                cityList: [
                    {
                        value: 'beijing',
                        label: '北京市',
                    },
                ],
                model1: '',
                columns8: [
                    {
                        type: 'selection',
                        width: 105,
                        fixed: 'left',
                    },
                    {
                        title: '退单编号',
                        key: 'number1',
                        width: 150,
                        align: 'left',
                    },
                    {
                        title: '申请原因',
                        key: 'reason1',
                        width: 120,
                        align: 'center',
                    },
                    {
                        title: '申请时间',
                        key: 'timer',
                        width: 200,
                    },
                    {
                        title: '退款金额',
                        key: 'money',
                        width: 120,
                    },
                    {
                        title: '申请原因',
                        key: 'reason2',
                        width: 120,
                        align: 'center',
                    },
                    {
                        title: '订单编号',
                        key: 'number2',
                        width: 150,
                    },
                    {
                        title: '商家处理备注',
                        key: 'remark',
                        width: 400,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        fixed: 'right',
                        align: 'center',
                        width: 220,
                        render() {
                            return '<i-button type="background" size="small" class="my-btn">处理</i-button>';
                        },
                    },
                ],
                data4: [
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                    {
                        number1: '215454567821235',
                        reason1: '移动端',
                        timer: '2017-03-21  16:31:47',
                        money: 899.00,
                        reason2: '退钱',
                        number2: 359693221575213,
                        remark: '尽快',
                    },
                ],
            };
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="order-rejected">
            <!--提示模块-->
            <div class="el-prompt">
                <div>
                    <p>提示<br>卖家提交申请，商家同意并经平台确认后，退款金额以买家付款方式返回给买家</p>
                </div>
            </div>
            <!--button-select-input模块-->
            <div class="btn-sel">
                <button>
                    <router-link to="/" class="text-left">导出数据</router-link>
                </button>
                <div class="store-body-header-right">
                    <i-input v-model="searchWord">
                        <i-select v-model="searchCategory" slot="prepend">
                            <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                        </i-select>
                        <i-button slot="append" type="primary">搜索</i-button>
                    </i-input>
                </div>
                <!--<i-table highlight-row class="shop-table" :columns="applicationColumns" :data="applicationData"></i-table>-->
            </div>
            <!--table模块-->
            <i-table highlight-row :columns="columns8" :data="data4" class="order-tab"></i-table>
        </div>
    </div>
</template>
