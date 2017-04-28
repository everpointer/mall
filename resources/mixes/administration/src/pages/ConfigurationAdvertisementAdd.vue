<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                addAdPosition: {
                    name: '',
                    province: '',
                    widthNum: '',
                    heightNum: '',
                    showStyle: 'style1',
                },
                province: [
                    {
                        value: '1',
                        label: '图片',
                    },
                    {
                        value: '2',
                        label: '图片1',
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
        <div class="configuration-advertisement-add">
            <div class="edit-link-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>广告管理—新增广告位</span>
            </div>
            <card :bordered="false">
                <i-form ref="addAdPosition" :model="addAdPosition" :rules="ruleValidate" :label-width="200">
                    <row>
                        <i-col span="12">
                            <form-item label="名称" prop="name">
                                <i-input v-model="addAdPosition.name"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="类别">
                                <i-select v-model="addAdPosition.province" placeholder="请选择">
                                    <i-option v-for="item in province" :value="item.value" :key="item">{{ item.label }}
                                    </i-option>
                                </i-select>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="18">
                            <form-item label="展示方式">
                                <radio-group v-model="addAdPosition.showStyle">
                                    <radio label="style1">
                                        <span>可以发布多条广告并随机展示</span>
                                    </radio>
                                    <radio label="style2">
                                        <span>只允许发布并展示一条广告</span>
                                    </radio>
                                </radio-group>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="宽度" prop="widthNum">
                                <i-input v-model="addAdPosition.widthNum"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="高度" prop="heightNum">
                                <i-input v-model="addAdPosition.heightNum"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                </i-form>
            </card>
        </div>
    </div>
</template>
