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
        <div class="order-rejected">
            <card>
                <!--提示模块-->
                <div class="el-prompt">
                    <div>
                        <p>提示<br>卖家提交申请，商家同意并经平台确认后，退款金额以买家付款方式返回给买家</p>
                    </div>
                </div>
                <div class="btn-sel">
                    <button>
                    <router-link to="/" class="text-left">导出数据</router-link>
                    </button>
                    <input type="text">
                    <select>
                        <option value="1">订单编号</option>
                        <option value="1"  selected="selected">北京</option>
                        <option value="1">北京</option>
                    </select>
                </div>
                <!--table模块-->
                <i-table border :columns="columns4" :data="data1" class="my-table"></i-table>
            </card>
        </div>
    </div>
</template>
