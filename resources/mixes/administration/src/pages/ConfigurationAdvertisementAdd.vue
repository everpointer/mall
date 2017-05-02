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
                action: `${window.api}/mall/upload`,
                addAdPosition: {
                    adname: '',
                    endtime: '',
                    linkAddress: '',
                    logo: '',
                    position: '',
                    starttime: '',
                },
                loading: false,
                position: [
                    {
                        value: '1',
                        label: '图片',
                    },
                    {
                        value: '2',
                        label: '图片1',
                    },
                ],
                ruleValidate: {
                    adname: [
                        { required: true, message: '广告名称不能为空', trigger: 'blur' },
                    ],
                    position: [
                        { required: true, message: '广告位不能为空', trigger: 'blur' },
                    ],
                    logo: [
                        { required: true, message: '图片上传不能为空', trigger: 'blur' },
                    ],
                },
            };
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
                <span>广告管理—新增广告</span>
            </div>
            <card :bordered="false">
                <i-form :label-width="200" ref="addAdPosition" :model="addAdPosition" :rules="ruleValidate">
                    <row>
                        <i-col span="12">
                            <form-item label="广告名称" prop="adname">
                                <i-input v-model="addAdPosition.adname"></i-input>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="选择广告位">
                                <i-select placeholder="请选择" v-model="addAdPosition.position">
                                    <i-option v-for="item in position" :value="item.value" :key="item">{{ item.label }}
                                    </i-option>
                                </i-select>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="开始时间" prop="starttime">
                                <time-picker placeholder="选择时间" type="time" v-model="addAdPosition.starttime" >
                                </time-picker>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="结束时间" prop="endtime">
                                <time-picker type="time" placeholder="选择时间" v-model="addAdPosition.endtime" >
                                </time-picker>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="广告位默认图片上传" prop="logo">
                                <div class="image-preview" v-if="addAdPosition.logo">
                                    <img :src="addAdPosition.logo">
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
                                <p>系统支持的图片格式为：gif、jpg、jpeg、png</p>
                            </form-item>
                        </i-col>
                    </row>
                    <row>
                        <i-col span="12">
                            <form-item label="链接地址" prop="linkAddress">
                                <i-input v-model="addAdPosition.linkAddress"></i-input>
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