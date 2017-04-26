<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                search_category: '',
                search_word: '',
                searchList: [
                    {
                        value: '店铺名称',
                        label: '店铺名称',
                    },
                    {
                        value: '商品名称',
                        label: '商品名称',
                    },
                    {
                        value: '商品分类',
                        label: '商品分类',
                    },
                ],
            };
        },
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
                <tab-pane label="店铺管理" name="name1">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>如果当前时间超过店铺有效期或店铺处于关闭状态，前台将不能继续浏览该店铺，但是店主仍然可以编辑该店铺</p>
                    </div>
                    <div class="store_body">
                        <div class="store-body-header">
                            <i-button class="export-btn" type="ghost">导出数据</i-button>
                            <div class="store-body-header-right">
                                <i-input v-model="search-word">
                                    <i-select v-model="search-category" slot="prepend">
                                        <i-option v-for="item in searchList" :value="item.value" :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                    <i-button slot="append" type="primary">搜索</i-button>
                                </i-input>
                            </div>
                        </div>
                    </div>
                </tab-pane>
                <tab-pane label="开店申请" name="name2">标签二的内容</tab-pane>
            </tabs>
        </div>
    </div>
</template>
