<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            injection.loading.start();
            injection.http.post(`${window.api}/mall/configuration/get`).then(response => {
                const data = response.data.data;
                next(vm => {
                    injection.loading.finish();
                    injection.sidebar.active('mall');
                    vm.form.email = data.email;
                    vm.form.logo = data.logo;
                    vm.form.phone = data.phone;
                });
            }).catch(() => {
                injection.loading.error();
            });
        },
        data() {
            return {
                action: `${window.api}/mall/upload`,
                form: {
                    email: '',
                    logo: '',
                    phone: '',
                },
                loading: false,
                rules: {
                    email: [
                        {
                            required: true,
                            type: 'email',
                            message: '请输入正确的电子邮箱账号',
                            trigger: 'change',
                        },
                    ],
                    logo: [
                        {
                            required: true,
                            type: 'string',
                            message: '请上传网站 Logo',
                            trigger: 'change',
                        },
                    ],
                    phone: [
                        {
                            required: true,
                            pattern: /^0\d{2,3}-?\d{7,8}$/,
                            message: '请输入正确的电话号码',
                            trigger: 'change',
                        },
                    ],
                },
            };
        },
        methods: {
            removeLogo() {
                const self = this;
                self.form.logo = '';
                self.$refs.form.validateField('logo');
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
                    desc: `文件 ${file.name} 格式不正确，请上传 jpg 或 png 格式的图片。`,
                });
            },
            uploadSuccess(data) {
                const self = this;
                injection.loading.finish();
                self.$notice.open({
                    title: data.message,
                });
                self.form.logo = data.data.path;
                self.$refs.form.validateField('logo');
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.form.validate(valid => {
                    if (valid) {
                        self.$http.post(`${window.api}/mall/configuration/set`, self.form).then(() => {
                            self.$notice.open({
                                title: '更新商城配置成功！',
                            });
                        }).finally(() => {
                            self.loading = false;
                        });
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
        <div class="mall-configuration">
            <card>
                <p slot="title">商城设置</p>
                <i-form :label-width="200" :model="form" ref="form" :rules="rules">
                    <row>
                        <i-col span="12">
                            <form-item label="网站logo" prop="logo">
                                <div class="image-preview" v-if="form.logo">
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
                                        v-if="form.logo === '' || form.logo === null">
                                </upload>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="平台客服联系电话" prop="phone">
                                <i-input placeholder="请输入平台客服联系电话" v-model="form.phone"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="平台客服电子邮件" prop="email">
                                <i-input placeholder="请输入平台客服电子邮件" v-model="form.email"></i-input>
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