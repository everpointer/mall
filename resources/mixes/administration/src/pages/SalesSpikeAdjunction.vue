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
        <div class="sales-spike-add">
            <div class="add-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—添加秒杀活动</span>
            </div>
            <div class="add-body">
                <div class="prompt-box">
                    <h6>提示</h6>
                    <p>秒杀活动仅设置结束时间，截止时间内多个活动可同时进行，建议标题以分类区分便于管理</p>
                </div>
            </div>
        </div>
    </div>
</template>
