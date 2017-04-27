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
    <div class="order-view">
        <div class="view-title">
            <i-button type="text">
                <icon type="chevron-left"></icon>
            </i-button>
            <span>商品订单—查看</span>
        </div>
        <steps :current="1">
            <step title="已完成" content="这里是该步骤的描述信息"></step>
            <step title="进行中" content="这里是该步骤的描述信息"></step>
            <step title="待进行" content="这里是该步骤的描述信息"></step>
            <step title="待进行" content="这里是该步骤的描述信息"></step>
        </steps>
    </div>
</template>
