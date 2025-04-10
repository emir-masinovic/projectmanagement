<template>
	<NcAppContent>
		<div id="projectmanagement">
			<h1>Hello word!</h1>
		</div>
	</NcAppContent>
</template>

<script>
import NcAppContent from '@nextcloud/vue/dist/Components/NcAppContent.js'

export default {
	name: 'App',
	components: {
		NcAppContent,
	},
}
</script>

<style scoped lang="scss">
#projectmanagement {
	display: flex;
	justify-content: center;
	margin: 36px;
}
</style>
