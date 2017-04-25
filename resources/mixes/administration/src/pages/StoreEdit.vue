<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            next(() => {
                injection.sidebar.active('mall');
            });
        },
    };
</script>

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
			</div>
		</div>
	</div>
</template>
