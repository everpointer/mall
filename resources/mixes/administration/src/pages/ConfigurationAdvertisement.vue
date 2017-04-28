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
        <div class="configuration-advertisement">
            <tabs value="name1">
                <tab-pane label="广告管理" name="name1">
                    <card :bordered="false">
                        <div class="prompt-box">
                            <p>提示</p>
                            <p>将广告位调用代码放入前台页面，将显示该广告位的广告</p>
                        </div>
                        <div class="advertisement-action">
                            <i-button class="add-data" type="ghost">+新增数据</i-button>
                            <i-button class="delete-data" type="ghost">批量删除</i-button>
                            <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                        </div>
                    </card>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
