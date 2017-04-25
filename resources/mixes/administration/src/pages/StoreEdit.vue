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
				<h5>店铺信息</h5>
				<div class="store-information-form">
					<card>
						<i-form ref="storeDetail" :model="storeDetail" :rules="ruleValidate" :label-width="204">
                            <form-item label="店主账号">
                                {{storeDetail.account}}
                            </form-item>
							<form-item label="店铺名称" prop="storeName">
                                <row>
                                    <i-col span="9">
                                        <i-input v-model="storeDetail.storeName"></i-input>
                                    </i-col>
                                </row>
							</form-item>
                            <form-item label="公司名称">
                                <row>
                                    <i-col span="9">
                                        <i-input v-model="storeDetail.companyName"></i-input>
                                    </i-col>
                                </row>
                            </form-item>
							<form-item label="所在地区">
								<i-select v-model="storeDetail.province" placeholder="请选择">
									<i-option value="beijing">北京市</i-option>
									<i-option value="shanghai">上海市</i-option>
									<i-option value="shenzhen">深圳市</i-option>
								</i-select>
							</form-item>
						</i-form>
					</card>
				</div>
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

