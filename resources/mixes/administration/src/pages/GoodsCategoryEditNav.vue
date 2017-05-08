<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                action: `${window.api}/mall/upload`,
                checkbox: [
                    {
                        title: '时尚物品',
                        list: [
                            {
                                name: '运动品牌',
                            },
                            {
                                name: '运动品牌',
                            },
                            {
                                name: '运动品牌',
                            },
                        ],
                    },
                    {
                        title: '时尚物品',
                        list: [
                            {
                                name: '运动品牌',
                            },
                            {
                                name: '运动品牌',
                            },
                            {
                                name: '运动品牌',
                            },
                            {
                                name: '运动品牌',
                            },
                        ],
                    },
                    {
                        title: '时尚物品',
                        list: [
                            {
                                name: '运动品牌',
                            },
                            {
                                name: '运动品牌',
                            },
                        ],
                    },
                ],
                editDetail: {
                    checkbox: [],
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
                            <i-col span="24">
                                <form-item label="推荐分类" prop="recommend">分类下的三级分类
                                    <div class="recommended-classification">
                                        <ul>
                                            <li v-for="type in checkbox">
                                                <p>{{ type.title }}</p>
                                                <checkbox-group v-model="editDetail.checkbox">
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
                        <form-item label="推荐品牌">
                            <row>
                                <i-col span="2" class="position-module">快捷定位
                                    <div class="tip">
                                        <p>如果当前下拉选项中没有适合的类型，可以去
                                            <a href="">类型管理</a>
                                            功能中添加新的类型</p>
                                    </div>
                                    <checkbox v-model="editDetail.interestType" class="tip"
                                              style="text-align: inherit; color: inherit">关联到子分类</checkbox>
                                    <p class="contact tip">勾选关联到子分类后，被绑定的商品展示方式也将继承到子分类中使用</p>
                                </i-col>
                                <i-col span="10" class="select-dropdown">
                                    <i-select placeholder="请选择" v-model="editDetail.location">
                                        <i-option v-for="item in location" :value="item.value"
                                                  :key="item">{{ item.label }}</i-option>
                                    </i-select>
                                </i-col>
                                <i-col span="12" class="inline-symbol" style="text-align: inherit">分类下的商品类型</i-col>
                            </row>
                        </form-item>
                        <row>
                            <i-col span="12">
                                <form-item label="排序">
                                    <i-input v-model="editDetail.goodsSort"></i-input>
                                    <p class="contact tip">数字范围为0~255，数字越小越靠前</p>
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
