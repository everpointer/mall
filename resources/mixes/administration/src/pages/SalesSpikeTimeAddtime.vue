<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
                loading: false,
                addTimeData: {
                    name: '',
                    startTime: '',
                    endTime: '',
                },
                validate: {
                    name: [
                        {
                            required: true,
                            message: '时段标题不能为空',
                            trigger: 'blur',
                        },
                    ],
                },
            };
        },
        methods: {
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
            goback() {
                const self = this;
                self.$router.push({
                    path: ' ',
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
        <div class="sales-spike-time-add">
            <div class="time-add-title">
                <card>
                    <i-button type="text" @click.native="goback">
                        <icon type="chevron-left"></icon>
                    </i-button>
                    <span>秒杀活动—时间段列表—添加时间段列表</span>
                </card>
            </div>
            <card>
                <div class="time-add-body">
                    <div class="prompt-box">
                        <h6>提示</h6>
                        <p>第一次新增秒杀时间段可对开始时间进行修改，以后默认为上一时间段结束时间的后一秒</p>
                        <p>秒杀时段名称将会显示在秒杀列表页的时间段内</p>
                        <p>编辑秒杀结束时段时不会影响到下一秒杀时段开始时间，结束时间不得小于当前时段开始时间，不得大于下一段结束时间</p>
                    </div>
                    <i-form :label-width="200" ref="activityValidate" :model="addTimeData" :rules="validate">
                        <row>
                            <i-col span="12">
                                <form-item label="秒杀时段名称：" prop="name">
                                    <i-input v-model="addTimeData.name" placeholder=""></i-input>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="开始时间：">
                                    <time-picker type="time" placeholder="选择时间"
                                                 v-model="addTimeData.startTime"></time-picker>
                                </form-item>
                            </i-col>
                        </row>
                        <row>
                            <i-col span="12">
                                <form-item label="结束时间：">
                                    <time-picker type="time" placeholder="选择时间"
                                                 v-model="addTimeData.endTime"></time-picker>
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