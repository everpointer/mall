<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
        data() {
            return {
                loading: false,
                parameter: {
                    imageType: '',
                },
                validate: {
                    imageType: [
                        {
                            required: true,
                            message: '请选择图片存放类型',
                            trigger: 'change',
                        },
                    ],
                },
                radioList: [
                    {
                        label: 'fileName',
                        content: '按照文件名存放（例：店铺ID/图片）',
                    },
                    {
                        label: 'year',
                        content: '按照年份存放（例：店铺ID/年/图片）',
                    },
                    {
                        label: 'yearMonth',
                        content: '按照年月存放（例：店铺ID/年/月/图片）',
                    },
                    {
                        label: 'yearMonthDay',
                        content: '按照年月日存放（例：店铺ID/年/月/日/图片）',
                    },
                ],
            };
        },
        methods: {
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.configurationImage.validate(valid => {
                    if (valid) {
                        self.$Message.success('提交成功!');
                    } else {
                        self.loading = false;
                        self.$notice.error({
                            title: '请正确填写设置信息！',
                        });
                    }
                });
            },
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="configuration-image">
            <tabs value="configurationImage">
                <tab-pane label="上传参数" name="uploadParameters">
                    <card>
                        <i-form :label-width="200" ref="configurationImage" :model="parameter" :rules="validate">
                            <row>
                                <i-col span="12">
                                    <form-item label="图片存放类型：" prop="imageType">
                                        <radio-group v-model="parameter.imageType">
                                            <radio v-for="item in radioList" :label="item.label">{{ item.content }}</radio>
                                        </radio-group>
                                    </form-item>
                                </i-col>
                            </row>
                            <form-item>
                                <i-button @click.native="submit" type="primary">
                                    <span v-if="!loading">确认提交</span>
                                    <span v-else>正在提交…</span>
                                </i-button>
                            </form-item>
                        </i-form>
                    </card>
                </tab-pane>
                <tab-pane label="默认图片" name="defaultImage">
                    <card>
                        fwfew
                    </card>
                </tab-pane>
            </tabs>
        </div>
    </div>
</template>