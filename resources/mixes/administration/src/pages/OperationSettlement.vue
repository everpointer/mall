<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {

            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="operation-settlement">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>结算管理—账单明细</span>
            </div>
            <card :bordered="false">
                <div class="account-information">
                    
                </div>
            </card>
        </div>
    </div>
</template>
