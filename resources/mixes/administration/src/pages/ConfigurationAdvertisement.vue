<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                advertisement: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center',
                        fixed: 'left',
                    },
                    {
                        title: '名称',
                        key: 'name',
                        width: 200,
                    },
                    {
                        title: '类型',
                        key: 'type',
                        width: 100,
                    },
                    {
                        title: '展示方式',
                        key: 'showStyle',
                        width: 200,
                    },
                    {
                        title: '宽度/字数',
                        key: 'wordNum',
                        width: 150,
                    },
                    {
                        title: '高度',
                        key: 'heightNum',
                        width: 150,
                    },
                    {
                        title: '广告数',
                        key: 'adverNum',
                        width: 150,
                    },
                    {
                        title: '正在展示',
                        key: 'showNum',
                        width: 150,
                    },
                    {
                        title: '是否启用',
                        key: 'isshow',
                        width: 200,
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 200,
                        align: 'center',
                        fixed: 'right',
                        render(row, column, index) {
                            return `<dropdown><i-button type="ghost">设置<icon type="arrow-down-b"></icon></i-button>
                                <dropdown-menu slot="list"><dropdown-item>设置设置</dropdown-item></dropdown-menu></dropdown>
                                <i-button type="ghost" class="delete-ad" @click="removeAd(${index})">删除</i-button>`;
                        },
                    },
                ],
                advertisementData: [
                    {
                        name: '商品列表左侧广告位',
                        type: '图片',
                        showStyle: '多广告展示',
                        wordNum: 206,
                        heightNum: 206,
                        adverNum: 0,
                        showNum: 4,
                        isshow: '是',
                    },
                    {
                        name: '商品列表左侧广告位',
                        type: '图片',
                        showStyle: '多广告展示',
                        wordNum: 206,
                        heightNum: 206,
                        adverNum: 0,
                        showNum: 4,
                        isshow: '是',
                    },
                    {
                        name: '商品列表左侧广告位',
                        type: '图片',
                        showStyle: '多广告展示',
                        wordNum: 206,
                        heightNum: 206,
                        adverNum: 0,
                        showNum: 4,
                        isshow: '是',
                    },
                ],
            };
        },
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        methods: {
            removeAd(index) {
                console.log(index);
                this.advertisementData.splice(index, 1);
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="configuration-advertisement">
            <tabs value="name1">
                <tab-pane label="广告管理" name="name1">
                    <div class="prompt-box">
                        <p>提示</p>
                        <p>将广告位调用代码放入前台页面，将显示该广告位的广告</p>
                    </div>
                    <div class="advertisement-action">
                        <i-button class="add-data" type="ghost">+新增数据</i-button>
                        <i-button class="delete-data" type="ghost">批量删除</i-button>
                        <i-button type="text" icon="android-sync" class="refresh">刷新</i-button>
                    </div>
                    <i-table highlight-row :columns="advertisement"
                             :data="advertisementData"></i-table>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>
