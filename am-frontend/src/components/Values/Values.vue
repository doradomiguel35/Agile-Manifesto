<template>
	<b-card bg-variant="dark" text-variant="white" class="text-center" header="Values">
		<!-- <b-card-text class="p-1 text-left medium-txt header mb-5">Values</b-card-text> -->
		
		<div class="container">
			<values-list></values-list>
		</div>

	</b-card>
</template>

<script>
import List from './List'
export default {
		components: {
			'values-list': List
		}
}
</script>

<style scoped>
	.header {
		font-size: 28px;
	}

	.card-header{
		font-size: 28px;
	}
</style>