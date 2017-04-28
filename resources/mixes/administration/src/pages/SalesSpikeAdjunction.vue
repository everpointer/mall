<script>
    import injection from '../helpers/injection';

    export default {
        data() {
            return {
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
                            message: '姓名不能为空',
                            trigger: 'blur',
                        },
                    ],
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
<template>
    <div class="mall-wrap">
        <div class="sales-spike-add">
            <div class="add-title">
                <i-button type="text">
                    <icon type="chevron-left"></icon>
                </i-button>
                <span>秒杀活动—添加秒杀活动</span>
            </div>
            <div class="add-body">
                <div class="prompt-box">
                    <h6>提示</h6>
                    <p>秒杀活动仅设置结束时间，截止时间内多个活动可同时进行，建议标题以分类区分便于管理</p>
                </div>
                <i-form :label-width="200" ref="activityValidate" :model="formValidate" :rules="ruleValidate">
                    <form-item label="活动标题：" prop="title">
                        <i-input style="width: 268px;" v-model="activityData.title" placeholder=""></i-input>
                    </form-item>
                    <form-item label="开始时间：" prop="startTime">
                        <date-picker type="date" placeholder="选择日期" v-model="activityData.startTime" style="width: 200px"></date-picker>
                    </form-item>
                    <form-item label="结束时间：" prop="endTime">
                        <date-picker type="date" placeholder="选择日期" v-model="activityData.endTime" style="width: 200px"></date-picker>
                    </form-item>
                    <form-item label="状态：" prop="endTime">
                        <i-switch v-model="activityData.status">
                            <span slot="open">开</span>
                            <span slot="close">关</span>
                        </i-switch>
                    </form-item>
                    <form-item>
                        <i-button type="primary">提交</i-button>
                    </form-item>
                </i-form>
            </div>
        </div>
    </div>
</template>
