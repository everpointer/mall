<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
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
            </card>
        </div>
    </div>
</template>
