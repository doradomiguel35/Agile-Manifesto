<template>
	<b-card bg-variant="light" class="text-center" header="Principles">
		
		<div class="container">
			<principle-list></principle-list>
		</div>

	</b-card>
</template>

<script>
import List from './List'
export default {
  components: {
    'principle-list': List
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