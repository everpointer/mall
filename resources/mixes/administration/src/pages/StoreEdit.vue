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
                                    <i-col span="10">
                                        <form-item label="有效期至">
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
                                                                <date-picker type="date" :options="options3"
                                                                     placeholder="选择日期"></date-picker>
                                                            </form-item>
                                                        </i-col>
                                                        <i-col span="8" class="data-picker-input picker-input">
                                                            <form-item label="-">
                                                                <date-picker type="date" :options="options3"
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
                                                            <form-item label="营业执照电子版">
                                                                <i-input v-model="storeDetail.license"></i-input>
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
        };
    },
    beforeRouteEnter(to, from, next) {
        next(() => {
            injection.sidebar.active('mall');
        });
    },
};
</script>

