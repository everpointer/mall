<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                action: `${window.api}/mall/upload`,
                goodsEdit: {
                    barCode: '',
                    type: '数码办公>时尚影音>智能设备',
                    name: '',
                    sellPoint: '',
                    logo: '',
                },
                loading: false,
                searchProduct: '',
                searchProducts: [
                    {
                        value: '华为',
                        label: '华为',
                    },
                    {
                        value: '苹果',
                        label: '苹果',
                    },
                ],
                ruleValidate: {
                    remarks: [
                        { required: true, message: '信息不能为空', trigger: 'blur' },
                    ],
                },
                requests: [
                    {
                        name: '1.基本要求',
                        content: '（1）手机详情总体大小：图片+文字，图片不超过20张，文字不超过5000字；建议：所有图片都是本宝贝相关的图片',
                    },
                    {
                        name: '2.图片大小要求',
                        content: '（1）建议使用宽度480~620像素、高度小于等于960像素的图片；（2）格式为：jpg、jepg、gif、png举例：可以上传一张宽度为480，高度为960像素，格式为jpg的图片',
                    },
                    {
                        name: '3.文字要求',
                        content: '（1）每次插入文字不能超过500个字，标点、特殊字符按照一个字计算；（2）请手动输入文字，不要复制粘网页上的文字，防止出现乱码；',
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
                this.goodsEdit.logo = '';
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
                self.goodsEdit.logo = data.data.path;
            },
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.activityValidate.validate(valid => {
                    if (valid) {
                        self.$Message.success('提交成功!');
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
        <div class="goods-library-editor ">
            <div class="store-refund-process">
                <div class="edit-link-title">
                    <i-button type="text" @click.native="goBack">
                        <icon type="chevron-left"></icon>
                    </i-button>
                    <span>商品库管理—编辑</span>
                </div>
                <div>
                    <card :bordered="false">
                        <i-form ref="goodsEdit" :model="goodsEdit" :rules="ruleValidate" :label-width="200">
                            <div class="refund-application">
                                <h5>商品基本信息</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="12">
                                            <form-item label="商品分类">
                                                {{ goodsEdit.type }}&nbsp; &nbsp;&nbsp;
                                                <i-button type="ghost">编辑</i-button>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="商品名称">
                                                <i-input v-model="goodsEdit.name"></i-input>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="12">
                                            <form-item label="商品卖点">
                                                <i-input v-model="goodsEdit.sellPoint" type="textarea"
                                                         :autosize="{minRows: 3,maxRows: 5}"></i-input>
                                                <p>商品卖点最长不超过140个汉字</p>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="10">
                                            <form-item label="商品条形码">
                                                <i-input v-model="goodsEdit.barCode"></i-input>
                                                <p>请填写商品条形码下方数字</p>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="24">
                                            <form-item label="商品图片">
                                                <div class="image-preview" v-if="goodsEdit.logo">
                                                    <img :src="goodsEdit.logo">
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
                                                        v-if="goodsEdit.logo === '' || goodsEdit.logo === null">
                                                </upload>
                                                <p>第一张图片为默认主图，图片支持JPG、gif、png格式上传或从图片空间中选择，
                                                    建议使用尺寸800*800像素以上，大小不超过4M的正方形图片，单击选中图片，
                                                    可进行上传，替换和删除
                                                </p>
                                                <i-button type="ghost">图片上传</i-button>
                                                <i-button type="ghost">从图片空间删除</i-button>
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-application">
                                <h5>商品详情描述</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品品牌">
                                                <i-select v-model="searchProduct" style="width:124px">
                                                    <i-option v-for="item in searchProducts" :value="item.value" :key="item">{{ item.label }}</i-option>
                                                </i-select>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品属性">
                                                价格区间
                                                <i-select v-model="searchProduct" style="width:124px">
                                                    <i-option v-for="item in searchProducts" :value="item.value" :key="item">{{ item.label }}</i-option>
                                                </i-select>
                                                口碑
                                                <i-select v-model="searchProduct" style="width:124px">
                                                    <i-option v-for="item in searchProducts" :value="item.value" :key="item">{{ item.label }}</i-option>
                                                </i-select>
                                                区域配送
                                                <i-select v-model="searchProduct"  style="width:124px">
                                                    <i-option v-for="item in searchProducts" :value="item.value" :key="item">{{ item.label }}</i-option>
                                                </i-select>
                                                产地
                                                <i-select v-model="searchProduct" style="width:124px">
                                                    <i-option v-for="item in searchProducts" :value="item.value" :key="item">{{ item.label }}</i-option>
                                                </i-select>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品描述" class="remark-input">
                                                <row>
                                                    <i-col span="14">
                                                        <div>
                                                            <tabs type="card">
                                                                <tab-pane label="电脑端">
                                                                    <div class="pro-des">
                                                                        <div class="pro-bg">
                                                                            <span>图片总数不得超过20张，文字不得超过500字</span>
                                                                        </div>
                                                                        <div class="pro-bg2">
                                                                            <i-button type="gory" size="small">插入图片</i-button>
                                                                            <i-button type="gory" size="small">添加文字</i-button>
                                                                        </div>
                                                                    </div>
                                                                    <span>还可以输入500字</span><br>
                                                                    <i-input v-model="goodsEdit.remarks" type="textarea"
                                                                             :autosize="{minRows: 3,maxRows: 5}" style="width: 480px"></i-input><br>
                                                                    <i-button type="gory" size="small">确认</i-button>
                                                                    <i-button type="gory" size="small">提交</i-button>
                                                                </tab-pane>
                                                                <tab-pane label="手机端">
                                                                    <div class="pro-des">
                                                                        <div class="pro-bg">
                                                                            <span>图片总数不得超过20张，文字不得超过500字</span>
                                                                        </div>
                                                                        <div class="pro-bg2">
                                                                            <i-button type="gory" size="small">插入图片</i-button>
                                                                            <i-button type="gory" size="small">添加文字</i-button>
                                                                        </div>
                                                                    </div>
                                                                    <span>还可以输入500字</span><br>
                                                                    <i-input v-model="goodsEdit.remarks" type="textarea"
                                                                             :autosize="{minRows: 3,maxRows: 5}" style="width: 480px"></i-input><br>
                                                                    <i-button type="gory" size="small">确认</i-button>
                                                                    <i-button type="gory" size="small">提交</i-button>
                                                                </tab-pane>
                                                            </tabs>
                                                        </div>
                                                    </i-col>
                                                    <i-col span="10">
                                                        <ul class="request">
                                                            <li v-for="item in  requests">
                                                                <h6>{{item.name}}</h6>
                                                                <span>{{item.content}}</span>
                                                            </li>
                                                        </ul>
                                                    </i-col>
                                                </row>
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <div class="refund-application">
                                <h5>商品基本信息</h5>
                                <div class="application-content refund-module">
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品重量">
                                                <i-input></i-input>
                                            </form-item>
                                        </i-col>
                                    </row>
                                    <row>
                                        <i-col span="18">
                                            <form-item label="商品体积">
                                                <i-input></i-input>
                                            </form-item>
                                        </i-col>
                                    </row>
                                </div>
                            </div>
                            <row>
                                <i-col span="18">
                                    <form-item label="">
                                        <i-button @click.native="submit" type="primary">
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
        </div>
    </div>
</template>

