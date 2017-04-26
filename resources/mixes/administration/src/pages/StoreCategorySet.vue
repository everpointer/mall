<template>
    <div class="mall-wrap">
        <div class="store-category-set">
            <card>
                <div class="content">
                    <ul>
                        <li v-for="set in sets">
                            <row>
                                <i-col span="8">
                                    <row>
                                        <i-col span="1" class="content-ico">*</i-col>
                                        <i-col span="4">{{set.name}}</i-col>
                                        <i-col span="8">
                                            <input type="text" class="my-input">
                                        </i-col>
                                    </row>
                                </i-col>
                            </row>
                        </li>
                    </ul>
                    <div class="rank">
                        <row>
                            <i-col span="8">
                                <row>
                                    <i-col span="5">排序</i-col>
                                    <i-col span="14">
                                      <input type="text" class="my-input">
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="1"></i-col>
                                    <i-col span="19">
                                      <span>数字范围为0~255，数字越小越靠前</span>
                                    </i-col>
                                </row>
                                <row>
                                    <i-col span="1"></i-col>
                                    <i-col span="12">
                                      <button>
                                        <router-link to="/" class="text-left">确认提交</router-link>
                                      </button>
                                    </i-col>
                                </row>
                            </i-col>
                        </row>
                    </div>
                </div>
          </card>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                sets: [
                    { name: '名称分类' },
                    { name: '保证金额数' },
                ],
            };
        },
    };
</script>
<style>

</style>
