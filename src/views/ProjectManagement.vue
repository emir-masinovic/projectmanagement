<template>
	<NcContent app-name="projectmanagement">
		<NcAppContent>
			<div class="project-management">
				<div class="project-management__header">
					<h1>{{ t('projectmanagement', 'Project Management') }}</h1>
					<NcButton @click="incrementCounter">
						{{ t('projectmanagement', 'Counter:', { count: counter }) }}
					</NcButton>
				</div>
			</div>
		</NcAppContent>
	</NcContent>
</template>

<script>
import { defineComponent } from 'vue'
import { generateUrl } from '@nextcloud/router'
import NcButton from '@nextcloud/vue/dist/Components/NcButton.js'
import NcContent from '@nextcloud/vue/dist/Components/NcContent.js'
import NcAppContent from '@nextcloud/vue/dist/Components/NcAppContent.js'
import axios from '@nextcloud/axios'

export default defineComponent({
	name: 'ProjectManagement',

	components: {
		NcButton,
		NcContent,
		NcAppContent,
	},

	data() { return { counter: 0 } },

	async created() { await this.getCounter() },

	methods: {
		async getCounter() {
			try {
				const response = await axios.get(generateUrl('/apps/projectmanagement/test/counter'))
				this.counter = response.data.counter
			} catch (error) {
				console.error('Error getting counter:', error)
			}
		},

		async incrementCounter() {
			try {
				const response = await axios.post(generateUrl('/apps/projectmanagement/test/counter/increment'))
				this.counter = response.data.counter
			} catch (error) {
				console.error('Error incrementing counter:', error)
			}
		},
	},
})
</script>

<style lang="scss" scoped>
.project-management {
	&__header {
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-bottom: 20px;
	}
}
</style>
