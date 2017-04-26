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
                    label: '北京市'
                  },
                  {
                    value: 'shanghai',
                    label: '上海市'
                  },
                  {
                    value: 'shenzhen',
                    label: '深圳市'
                  },
                  {
                    value: 'hangzhou',
                    label: '杭州市'
                  },
                  {
                    value: 'nanjing',
                    label: '南京市'
                  },
                  {
                    value: 'chongqing',
                    label: '重庆市'
                  }
                ],
                model2: '',
                model3: '',
                model4: ''
            }
        }
    }
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
        <!--button导出数据-->
        <!--<iButton type="ghost" class="btn">新增模块</iButton>-->
        <row>
          <i-col span="4">
            <button>
              <router-link to="/" class="text-left">导出数据</router-link>
            </button>
          </i-col>
          <i-col span="12">
            <iSelect v-model="model3" style="width:100px">
              <iOption v-for="item in cityList" :value="item.value" :key="item">{{ item.label }}</iOption>
            </iSelect>
          </i-col>
          <i-col span="4">

          </i-col>
          <i-col span="4">{{set.name}}</i-col>
        </row>
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
              <i-button type="ghost">删除</i-button>
              <i-button type="ghost">设置</i-button>
            </td>
          </tr>
          </tbody>
        </i-table>
      </card>
    </div>
  </div>
</template>
