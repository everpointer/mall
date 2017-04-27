<template>
    <div class="mall-wrap">
        <div class="store-refund-process">

        </div>
    </div>
</template>

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
