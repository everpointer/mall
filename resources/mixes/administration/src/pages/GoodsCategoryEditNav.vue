<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                action: `${window.api}/mall/upload`,
                editDetail: {
                    adPicture1: '',
                    adPicture2: '',
                    adAddress1: '',
                    adAddress2: '',
                    checkbox1: [],
                    checkbox2: [],
                    checkbox3: [],
                    checkboxDefault: [],
                    checkboxAllBrand: [],
                    goodsSort: '',
                    quotaRatio: '',
                    typeName: '',
                    showStyle: '',
                    logo: '',
                    interestStyle: '',
                    interestRadio: '',
                    interestType: true,
                },
                showStyle: [
                    {
                        value: '1',
                        label: '颜色',
                    },
                    {
                        value: '2',
                        label: '类型',
                    },
                ],
                location: [
                    {
                        value: '1',
                        label: '颜色',
                    },
                    {
                        value: '2',
                        label: '类型',
                    },
                ],
                loading: false,
                ruleValidate: {
                    typeName: [
                        { required: true, message: '名称名称不能为空', trigger: 'blur' },
                    ],
                    quotaRatio: [
                        { required: true, message: '分佣比例不能为空', trigger: 'blur' },
                    ],
                },
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
                this.editDetail.logo = '';
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
                self.editDetail.logo = data.data.path;
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.editDetail.validate(valid => {
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
        <div class="goods-category-edit-nav">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>分类管理—编辑"珠宝手表"分类导航</span>
            </div>
            <card :bordered="false">
                <div class="prompt-box">
                    <p>提示</p>
                    <p>设置前台左上侧商品分类导航的相关信息，可以设置分类前图标、分类别名、推荐分类、推荐品牌以及两张广告图片</p>
                    <p>分类导航信息设置完成后，需进入"平台>设置>清理缓存>首页及频道"操作后生效</p>
                </div>
                <i-form ref="editDetail" :model="editDetail" :rules="ruleValidate" :label-width="200">
                    <div class="basic-information">
                        <row>
                            <i-col span="12">
                                <form-item label="分类别名">
                                    <i-input v-model="editDetail.typeName"></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="分类图片" prop="logo">
                                    <div class="image-preview" v-if="editDetail.logo">
                                        <img :src="editDetail.logo">
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
                                            v-if="editDetail.logo === '' || editDetail.logo === null">
                                    </upload>
                                    <p class="tip">建议使用16*16像素png透明背景图片</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="推荐分类" prop="recommend">分类下的三级分类
                                    <div class="recommended-classification">
                                        <ul>
                                            <li>
                                                <p>时尚物品</p>
                                                <checkbox-group v-model="editDetail.checkbox1">
                                                    <checkbox label="时尚"></checkbox>
                                                    <checkbox label="时尚1"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                </checkbox-group>
                                            </li>
                                            <li>
                                                <p>时尚物品</p>
                                                <checkbox-group v-model="editDetail.checkbox2">
                                                    <checkbox label="时尚"></checkbox>
                                                    <checkbox label="时尚1"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                </checkbox-group>
                                            </li>
                                            <li>
                                                <p>时尚物品</p>
                                                <checkbox-group v-model="editDetail.checkbox3">
                                                    <checkbox label="时尚"></checkbox>
                                                    <checkbox label="时尚1"></checkbox>
                                                </checkbox-group>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="tip-color">推荐品牌将在展开后的二、三级导航列表右侧突出显示，
                                        建议选择数量为8个具有图片的品牌，超过将被隐藏</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="推荐品牌" class="quike-position">
                                    <div class="flex-position">
                                        <span class="title">快捷定位</span>
                                        <i-select placeholder="请选择" v-model="editDetail.location">
                                            <i-option v-for="item in location" :value="item.value"
                                                      :key="item">{{ item.label }}</i-option>
                                        </i-select>
                                        <span class="intro">分类下的商品类型</span>
                                    </div>
                                    <div class="recommended-classification recommended-brand">
                                        <ul>
                                            <li>
                                                <p>默认</p>
                                                <checkbox-group v-model="editDetail.checkboxDefault">
                                                    <checkbox label="时尚"></checkbox>
                                                    <checkbox label="时尚1"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                </checkbox-group>
                                            </li>
                                            <li>
                                                <p>所有品牌</p>
                                                <checkbox-group v-model="editDetail.checkboxAllBrand">
                                                    <checkbox label="时尚"></checkbox>
                                                    <checkbox label="时尚1"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                    <checkbox label="运动品牌"></checkbox>
                                                </checkbox-group>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="tip-color">推荐品牌将在展开后的二、三级导航列表右侧突出显示，
                                        建议选择数量为8个具有图片的品牌，超过将被隐藏</p>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="广告图1" prop="adPicture1">
                                    <div class="image-preview" v-if="editDetail.adPicture1">
                                        <img :src="editDetail.adPicture1">
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
                                            v-if="editDetail.adPicture1 === '' || editDetail.adPicture1 === null">
                                    </upload>
                                    <i-input v-model="editDetail.adAddress1" placeholder="http://" class="input-address"></i-input>
                                    <div class="tip-width">
                                        <p>
                                            广告图片将展示在推荐品牌下方，请使用宽度190像素，高度150像素的jpg、gif、
                                            png格式图片作为分类导航广告上传，如需跳转请在后方添加以http：//开头的链接地址
                                        </p>
                                    </div>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="20">
                                <form-item label="广告图2" prop="adPicture2">
                                    <div class="image-preview" v-if="editDetail.adPicture2">
                                        <img :src="editDetail.adPicture2">
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
                                            v-if="editDetail.adPicture2 === '' || editDetail.adPicture2 === null">
                                    </upload>
                                    <i-input v-model="editDetail.adAddress2" placeholder="http://" class="input-address"></i-input>
                                    <div class="tip-width">
                                        <p>
                                            广告图片将展示在推荐品牌下方，请使用宽度190像素，高度150像素的jpg、gif、
                                            png格式图片作为分类导航广告上传，如需跳转请在后方添加以http：//开头的链接地址
                                        </p>
                                    </div>
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
                    </div>
                </i-form>
            </card>
        </div>
    </div>
</template>
