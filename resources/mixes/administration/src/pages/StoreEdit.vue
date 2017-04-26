<template>
	<div class="mall-wrap">
		<div class="store-edit">
			<div class="edit-link-title">
				<i-button type="text">
					<icon type="chevron-left"></icon>
				</i-button>
				<span>店铺管理—店铺编辑</span>
			</div>
			<div class="store-information title-line">
                <card>
                    <i-form ref="storeDetail" :model="storeDetail" :rules="ruleValidate" :label-width="197">
                        <div class="basic-information">
                            <h5>店铺信息</h5>
                            <div class="common-padding">
                                <row>
                                    <i-col span="18">
                                        <form-item label="店主账号" class="input-default">
                                            {{storeDetail.account}}
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="18">
                                        <form-item label="店铺名称" prop="storeName">
                                            <i-input v-model="storeDetail.storeName"></i-input>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="18">
                                        <form-item label="公司名称">
                                            <i-input v-model="storeDetail.companyName"></i-input>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="10">
                                        <form-item label="所在地区">
                                            <i-select v-model="storeDetail.province" placeholder="请选择">
                                                <i-option value="beijing">北京市</i-option>
                                                <i-option value="shanghai">上海市</i-option>
                                                <i-option value="shenzhen">深圳市</i-option>
                                            </i-select>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="18">
                                        <form-item label="店铺地址">
                                            <i-input v-model="storeDetail.storeAddress"></i-input>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="18">
                                        <form-item label="开店时间"  class="input-default">
                                            {{storeDetail.createTime}}
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="10">
                                        <form-item label="所属分类">
                                            <i-select v-model="storeDetail.province" placeholder="请选择">
                                                <i-option value="beijing">北京市</i-option>
                                                <i-option value="shanghai">上海市</i-option>
                                                <i-option value="shenzhen">深圳市</i-option>
                                            </i-select>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="10">
                                        <form-item label="所属等级">
                                            <i-select v-model="storeDetail.province" placeholder="请选择">
                                                <i-option value="beijing">北京市</i-option>
                                                <i-option value="shanghai">上海市</i-option>
                                                <i-option value="shenzhen">深圳市</i-option>
                                            </i-select>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="8" class="data-picker-input picker-input">
                                        <form-item label="有效期至">
                                            <date-picker type="date" :options="options2"
                                                 placeholder="选择日期"></date-picker>
                                        </form-item>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="10">
                                        <form-item label="状态"  class="switch-status">
                                            <i-switch size="large">
                                                <span slot="open">开启</span>
                                                <span slot="close">关闭</span>
                                            </i-switch>
                                        </form-item>
                                    </i-col>
                                </row>
                            </div>
                        </div>
                        <div class="register-information">
                            <h5>注册信息</h5>
                            <div class="register-content">
                                <div class="company-information border-color">
                                    <div>
                                        <h5>公司及联系人信息</h5>
                                        <div class="company-content">
                                            <ul>
                                                <li>
                                                    <row>
                                                        <i-col span="18">
                                                            <form-item label="公司名称">
                                                                <i-input v-model="storeDetail.companyName"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="10">
                                                            <form-item label="公司所在地">
                                                                <i-select v-model="storeDetail.province" placeholder="请选择">
                                                                    <i-option value="beijing">北京市</i-option>
                                                                    <i-option value="shanghai">上海市</i-option>
                                                                    <i-option value="shenzhen">深圳市</i-option>
                                                                </i-select>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="18">
                                                            <form-item label="公司详细地址" class="company-name">
                                                                <i-input v-model="storeDetail.company_detail_name"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="12">
                                                            <form-item label="公司电话">
                                                                <i-input v-model="storeDetail.company_phone"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                        <i-col span="12">
                                                            <form-item label="电子邮箱">
                                                                <i-input v-model="storeDetail.company_email"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="12">
                                                            <form-item label="员工总数">
                                                                <i-input v-model="storeDetail.company_person_num" class="input-param"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                        <i-col span="12">
                                                            <form-item label="注册资金">
                                                                <i-input v-model="storeDetail.register_money"  class="input-param"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="12">
                                                            <form-item label="联系人姓名">
                                                                <i-input v-model="storeDetail.contact_name"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                        <i-col span="12">
                                                            <form-item label="联系人电话">
                                                                <i-input v-model="storeDetail.contact_phone"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="license-information border-color">
                                    <div>
                                        <h5>营业执照信息（副本）</h5>
                                        <div class="license-content">
                                            <ul>
                                                <li>
                                                    <row>
                                                        <i-col span="18">
                                                            <form-item label="营业执照号">
                                                                <i-input v-model="storeDetail.license"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="10">
                                                            <form-item label="营业执照所在地">
                                                                <i-select v-model="storeDetail.province" placeholder="请选择">
                                                                    <i-option value="beijing">北京市</i-option>
                                                                    <i-option value="shanghai">上海市</i-option>
                                                                    <i-option value="shenzhen">深圳市</i-option>
                                                                </i-select>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="8" class="data-picker-input">
                                                            <form-item label="营业执照有效期">
                                                                <date-picker type="date" :options="options1"
                                                                     placeholder="选择日期"></date-picker>
                                                            </form-item>
                                                        </i-col>
                                                        <i-col span="8" class="data-picker-input picker-input">
                                                            <form-item label="-">
                                                                <date-picker type="date" :options="options2"
                                                                     placeholder="选择日期"></date-picker>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="18">
                                                            <form-item label="法定经营范围">
                                                                <i-input v-model="storeDetail.license"></i-input>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                                <li>
                                                    <row>
                                                        <i-col span="18">
                                                            <form-item label="营业执照电子版" class="upload-picture">
                                                                <div class="demo-upload-list" v-for="item in uploadList">
                                                                    <template v-if="item.status === 'finished'">
                                                                        <img :src="item.url">
                                                                        <div class="demo-upload-list-cover">
                                                                            <icon type="ios-eye-outline" @click.native="handleView(item.name)"></icon>
                                                                            <icon type="ios-trash-outline" @click.native="handleRemove(item)"></icon>
                                                                        </div>
                                                                    </template>
                                                                    <template v-else>
                                                                        <i-progress v-if="item.showProgress" :percent="item.percentage" hide-info></i-progress>
                                                                    </template>
                                                                </div>
                                                                <upload
                                                                    ref="upload"
                                                                    :show-upload-list="false"
                                                                    :default-file-list="defaultList"
                                                                    :on-success="handleSuccess"
                                                                    :format="['jpg','jpeg','png']"
                                                                    :max-size="2048"
                                                                    :on-format-error="handleFormatError"
                                                                    :on-exceeded-size="handleMaxSize"
                                                                    :before-upload="handleBeforeUpload"
                                                                    multiple
                                                                    type="drag"
                                                                    action="//jsonplaceholder.typicode.com/posts/"
                                                                    style="display: inline-block;">
                                                                    <div class="upload-input">
                                                                        <icon type="plus-round"></icon>
                                                                    </div>
                                                                </upload>
                                                                <modal title="查看图片" v-model="visible">
                                                                    <img :src="'https://o5wwk8baw.qnssl.com/' + imgName + '/large'" v-if="visible" style="width: 100%">
                                                                </modal>
                                                            </form-item>
                                                        </i-col>
                                                    </row>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn">
                            <i-button type="primary" @click="handleSubmit('storeDetail')">确认提交</i-button>
                        </div>
                    </i-form>
                </card>
			</div>
		</div>
	</div>
</template>

<script>
import injection from '../helpers/injection';

export default {
    data() {
        return {
            storeDetail: {
                account: 'hjhjkhjk',
                province: '',
                storeName: '',
                companyName: '',
                storeAddress: '',
                createTime: '2016-18-23',
                company_detail_name: '',
                company_phone: '',
                company_person_num: '',
                register_money: '',
                company_email: '',
                contact_name: '',
                contact_phone: '',
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
            defaultList: [],
            imgName: '',
            visible: false,
            uploadList: [],
        };
    },
    beforeRouteEnter(to, from, next) {
        next(() => {
            injection.sidebar.active('mall');
        });
    },
    methods: {
        handleSubmit(name) {
            this.$refs[name].validate(valid => {
                if (valid) {
                    this.$Message.success('提交成功!');
                } else {
                    this.$Message.error('表单验证失败!');
                }
            });
        },
        handleView(name) {
            this.imgName = name;
            this.visible = true;
        },
        handleRemove(file) {
            // 从 upload 实例删除数据
            const fileList = this.$refs.upload.fileList;
            this.$refs.upload.fileList.splice(fileList.indexOf(file), 1);
        },
        handleSuccess(res, file) {
            // 因为上传过程为实例，这里模拟添加 url
            file.url = 'https://o5wwk8baw.qnssl.com/7eb99afb9d5f317c912f08b5212fd69a/avatar';
            file.name = '7eb99afb9d5f317c912f08b5212fd69a';
        },
        handleFormatError(file) {
            this.$Notice.warning({
                title: '文件格式不正确',
                desc: `文件${file.name}格式不正确，请上传 jpg 或 png 格式的图片。`,
            });
        },
        handleMaxSize(file) {
            this.$Notice.warning({
                title: '超出文件大小限制',
                desc: `文件${file.name}太大，不能超过 2M。`,
            });
        },
        handleBeforeUpload() {
            const check = this.uploadList.length < 5;
            if (!check) {
                this.$Notice.warning({
                    title: '最多只能上传 5 张图片。',
                });
            }
            return check;
        },
    },
    mounted() {
        this.uploadList = this.$refs.upload.fileList;
    },
};
</script>

