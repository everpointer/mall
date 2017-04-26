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
                    <i-form ref="storeDetail" :model="storeDetail" :rules="ruleValidate" :label-width="204">
                        <div class="basic-information">
                            <h5>店铺信息</h5>
                            <div>
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

