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
        <div class="store">
            <tabs value="name1">
                <tab-pane label="店铺管理" name="name1">标签一的内容</tab-pane>
                <tab-pane label="开店申请" name="name2">标签二的内容</tab-pane>
            </tabs>
        </div>
    </div>
</template>
