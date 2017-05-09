<script>
    import injection from '../helpers/injection';
    import image from '../assets/images/adv.jpg';

    export default {
        data() {
            return {
                indeterminate: true,
                checkAll: false,
                checkAllGroup: [],
                pictureList: [
                    {
                        img: image,
                        name: '商品rey的主图',
                        uploadTime: '上传时间：2017/02/11 12:30:17',
                        size: '原图尺寸：400*400',
                    },
                    {
                        img: image,
                        name: '商品rey的主图',
                        uploadTime: '上传时间：2017/02/11 12:30:17',
                        size: '原图尺寸：400*400',
                    },
                    {
                        img: image,
                        name: '商品rey的主图',
                        uploadTime: '上传时间：2017/02/11 12:30:17',
                        size: '原图尺寸：400*400',
                    },
                    {
                        img: image,
                        name: '商品rey的主图',
                        uploadTime: '上传时间：2017/02/11 12:30:17',
                        size: '原图尺寸：400*400',
                    },
                    {
                        img: image,
                        name: '商品rey的主图',
                        uploadTime: '上传时间：2017/02/11 12:30:17',
                        size: '原图尺寸：400*400',
                    },
                    {
                        img: image,
                        name: '商品rey的主图',
                        uploadTime: '上传时间：2017/02/11 12:30:17',
                        size: '原图尺寸：400*400',
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
            handleCheckAll() {
                if (this.indeterminate) {
                    this.checkAll = false;
                } else {
                    this.checkAll = !this.checkAll;
                }
                this.indeterminate = false;

                if (this.checkAll) {
                    this.checkAllGroup = this.pictureList;
                } else {
                    this.checkAllGroup = [];
                }
            },
            checkAllGroupChange(data) {
                if (data.length === this.pictureList.length) {
                    this.indeterminate = false;
                    this.checkAll = true;
                } else if (data.length > 0) {
                    this.indeterminate = true;
                    this.checkAll = false;
                } else {
                    this.indeterminate = false;
                    this.checkAll = false;
                }
            },
            delete() {},
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="goods-picture-look">
            <div class="edit-link-title">
                <i-button type="text" @click.native="goBack">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>图片管理—全部图片</span>
            </div>
            <card :bordered="false">
                <div class="picture-select">
                    <checkbox
                            :indeterminate="indeterminate"
                            :value="checkAll"
                            @click.prevent.native="handleCheckAll">全选</checkbox>
                    <i-button type="ghost" @click.native="delete">删除</i-button>
                </div>
                <checkbox-group v-model="checkAllGroup" @on-change="checkAllGroupChange">
                    <row class="picture-list">
                        <i-col v-for="(item, index) in pictureList">
                            <checkbox v-model="picture1">
                                <img :src="item.img" alt="">
                                <p>{{ item.name}}</p>
                                <p class="tip">{{ item.uploadTime}}</p>
                                <p class="tip">{{ item.size}}</p>
                            </checkbox>
                        </i-col>
                    </row>
                </checkbox-group>
                <div class="page">
                    <page :total="100" show-elevator></page>
                </div>
            </card>
        </div>
    </div>
</template>
