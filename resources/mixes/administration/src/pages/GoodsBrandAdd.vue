<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                action: `${window.api}/mall/upload`,
                defaultList: [],
                storeDetail: {
                    account: 'hjhjkhjk',
                    companyPlace: '',
                    classification: '',
                    province: '',
                    storeName: '',
                    companyName: '',
                    storeAddress: '',
                    createTime: '2016-12-23',
                    company_detail_name: '',
                    company_phone: '',
                    company_person_num: '',
                    register_money: '',
                    company_email: '',
                    contact_name: '',
                    contact_phone: '',
                    switch1: true,
                    level: '',
                    logo: '',
                    licensePlace: '',
                },
                ruleValidate: {
                    storeName: [
                        { required: true, message: '名称不能为空', trigger: 'blur' },
                    ],
                },
                options2: {
                    disabledDate(date) {
                        return date && date.valueOf() < Date.now();
                    },
                },
                companyPlace: [
                    {
                        value: '1',
                        label: '上海市',
                    },
                    {
                        value: '2',
                        label: '北京市',
                    },
                ],
                classification: [
                    {
                        value: '1',
                        label: '分类1',
                    },
                    {
                        value: '2',
                        label: '分类2',
                    },
                ],
                province: [
                    {
                        value: '1',
                        label: '上海市',
                    },
                    {
                        value: '2',
                        label: '北京市',
                    },
                ],
                licensePlace: [
                    {
                        value: '1',
                        label: '上海市',
                    },
                    {
                        value: '2',
                        label: '北京市',
                    },
                ],
                imgName: '',
                visible: false,
                uploadList: [],
                self: this,
                loading: false,
                level: [
                    {
                        value: '1',
                        label: '等级1',
                    },
                    {
                        value: '2',
                        label: '等级2',
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
            goBack() {
                const self = this;
                self.$router.go(-1);
            },
            removeLogo() {
                this.storeDetail.logo = '';
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
                self.storeDetail.logo = data.data.path;
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.storeDetail.validate(valid => {
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
        <div class="good-brand-add">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>品牌管理—新增</span>
            </div>
            <card :bordered="false">
                <i-form ref="storeDetail" :model="storeDetail" :rules="ruleValidate" :label-width="200">
                    <div class="basic-information">
                        <row>
                            <i-col span="12">
                                <form-item label="店主账号">
                                    {{storeDetail.account}}
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="店铺名称" prop="storeName">
                                    <i-input v-model="storeDetail.storeName"></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="公司名称">
                                    <i-input v-model="storeDetail.companyName"></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="所在地区">
                                    <i-select placeholder="请选择" v-model="storeDetail.province">
                                        <i-option v-for="item in province" :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="店铺地址">
                                    <i-input v-model="storeDetail.storeAddress"></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="开店时间">
                                    {{storeDetail.createTime}}
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="所属分类">
                                    <i-select v-model="storeDetail.classification" placeholder="请选择">
                                        <i-option v-for="item in classification" :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="所属等级">
                                    <i-select v-model="storeDetail.level" placeholder="请选择">
                                        <i-option v-for="item in level" :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12" class="data-picker-input picker-input">
                                <form-item label="有效期至">
                                    <date-picker type="date" :options="options2"
                                                 placeholder="选择日期"></date-picker>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="状态"  class="switch-status">
                                    <i-switch size="large" v-model="storeDetail.switch1">
                                        <span slot="open">开启</span>
                                        <span slot="close">关闭</span>
                                    </i-switch>
                                </form-item>
                            </i-col>
                        </row>
                    </div>
                </i-form>
            </card>
        </div>
    </div>
</template>
