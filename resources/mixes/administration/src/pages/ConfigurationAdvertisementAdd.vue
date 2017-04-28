<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                action: `${window.api}/mall/upload`,
                addAdPosition: {
                    name: '',
                    province: '',
                    widthNum: '',
                    heightNum: '',
                    showStyle: 'style1',
                    logo: '',
                    switchStatus: true,
                },
                ruleValidate: {
                    name: [
                        { required: true, message: '名称不能为空', trigger: 'blur' },
                    ],
                    widthNum: [
                        { required: true, message: '宽度不能为空', trigger: 'blur' },
                    ],
                    heightNum: [
                        { required: true, message: '高度不能为空', trigger: 'blur' },
                    ],
                    logo: [
                        { required: true, message: '广告位默认图片不能为空', trigger: 'blur' },
                    ],
                },
                loading: false,
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
        methods: {
            removeLogo() {
                this.addAdPosition.logo = '';
            },
            uploadBefore() {
                injection.loading.start();
            },
            uploadError(error, data) {
                const self = this;
                injection.loading.error();
                if (typeof data.message === 'object') {
                    for (const p in data.message) {
                        self.$notice.error({
                            title: data.message[p],
                        });
                    }
                } else {
                    self.$notice.error({
                        title: data.message,
                    });
                }
            },
            uploadFormatError(file) {
                this.$notice.warning({
                    title: '文件格式不正确',
                    desc: `文件 ${file.name} 格式不正确`,
                });
            },
            uploadSuccess(data) {
                const self = this;
                injection.loading.finish();
                self.$notice.open({
                    title: data.message,
                });
                self.addAdPosition.logo = data.data.path;
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.addAdPosition.validate(valid => {
                    if (valid) {
                        window.console.log(valid);
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
                    <row>
                        <i-col span="12">
                            <form-item label="高度" prop="heightNum">
                                <i-input v-model="addAdPosition.heightNum"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="广告位默认图片上传" prop="logo">
                                <div class="image-preview" v-if="addAdPosition.logo">
                                    <img :src="form.logo">
                                    <icon type="close" @click.native="removeLogo"></icon>
                                </div>
                                <upload :action="action"
                                        :before-upload="uploadBefore"
                                        :format="['jpg','jpeg','png']"
                                        :headers="{
                                            Authorization: `Bearer ${$store.state.token.access_token}`
                                        }"
                                        :max-size="2048"
                                        :on-error="uploadError"
                                        :on-format-error="uploadFormatError"
                                        :on-success="uploadSuccess"
                                        ref="upload"
                                        :show-upload-list="false"
                                        v-if="addAdPosition.logo === '' || addAdPosition.logo === null">
                                </upload>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="状态">
                                <i-switch size="large" v-model="addAdPosition.switchStatus">
                                    <span slot="open">开启</span>
                                    <span slot="close">关闭</span>
                                </i-switch>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item>
                                <i-button :loading="loading" type="primary" @click.native="submit">
                                    <span v-if="!loading">确认提交</span>
                                    <span v-else>正在提交…</span>
                                </i-button>
                            </form-item>
                        </i-col>
                    </row>
                </i-form>
            </card>
        </div>
    </div>
</template>
