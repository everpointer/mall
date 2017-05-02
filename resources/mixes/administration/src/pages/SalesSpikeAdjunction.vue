<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                self: this,
                loading: false,
                activityData: {
                    title: '',
                    startTime: '',
                    endTime: '',
                    status: false,
                },
                activityValidate: {
                    title: [
                        {
                            required: true,
                            message: '标题不能为空',
                            trigger: 'blur',
                        },
                    ],
                },
                startOptions: {
                    disabledDate(date) {
                        return date && date.valueOf() < Date.now() - 86400000;
                    },
                },
                endOptions: {
                    disabledDate(date) {
                        return date && date.valueOf() < this.getStartTime;
                    },
                },
            };
        },
        computed: {
            getStartTime() {
                return Date.parse(this.activityData.startTime);
            },
        },
        methods: {
            shuchu() {
                console.log(Date.parse(this.activityData.startTime));
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
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
    };
</script>
<template>
    <div class="mall-wrap">
        <div class="sales-spike-add">
                <div class="add-title">
                    <card>
                        <i-button type="text">
                            <icon type="chevron-left"></icon>
                        </i-button>
                        <span>秒杀活动—添加秒杀活动</span>
                    </card>
                </div>
            <card>
                <div class="add-body">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>秒杀活动仅设置结束时间，截止时间内多个活动可同时进行，建议标题以分类区分便于管理</p>
                    </div>
                    <i-form :label-width="200" ref="activityValidate" :model="activityData" :rules="activityValidate">
                        <row>
                            <i-col span="12">
                                <form-item label="活动标题：" prop="title">
                                    <i-input v-model="activityData.title" placeholder=""></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="开始时间：">
                                    <date-picker type="date" placeholder="选择日期"
                                                 :options="startOptions"
                                                 v-model="activityData.startTime"></date-picker>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="结束时间：">
                                    <date-picker type="date" placeholder="选择日期"
                                                 :options="endOptions"
                                                 @on-change="shuchu"
                                                 v-model="activityData.endTime"></date-picker>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="状态：">
                                    <i-switch size="large" v-model="activityData.status">
                                        <span slot="open">开启</span>
                                        <span slot="close">关闭</span>
                                    </i-switch>
                                </form-item>
                            </i-col>
                        </row>
                        <form-item>
                            <i-button @click.native="submit" type="primary">
                                <span v-if="!loading">确认提交</span>
                                <span v-else>正在提交…</span>
                            </i-button>
                        </form-item>
                    </i-form>
                </div>
            </card>
        </div>
    </div>
</template>