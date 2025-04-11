<template>
	<div class="project-list">
		<NcEmptyContent v-if="!projects.length" icon="icon-project">
			{{ t('projectmanagement', 'No projects yet') }}
			<template #action>
				<NcButton @click="$emit('create-project')">
					{{ t('projectmanagement', 'Create new project') }}
				</NcButton>
			</template>
		</NcEmptyContent>
		<div v-else class="project-grid">
			<NcCard v-for="project in projects"
				:key="project.id"
				class="project-card"
				:title="project.name">
				<template #header>
					<div class="project-header">
						<h3>{{ project.name }}</h3>
						<NcButton type="tertiary" @click="$emit('edit-project', project)">
							<template #icon>
								<IconPencil />
							</template>
						</NcButton>
					</div>
				</template>
				<div class="project-content">
					<p class="project-description">
						{{ project.description }}
					</p>
					<div class="project-dates">
						<span>{{ t('projectmanagement', 'Start: {date}', { date: formatDate(project.startDate) }) }}</span>
						<span>{{ t('projectmanagement', 'End: {date}', { date: formatDate(project.endDate) }) }}</span>
					</div>
					<div class="project-client">
						<strong>{{ t('projectmanagement', 'Client:') }}</strong> {{ project.clientName }}
					</div>
				</div>
			</NcCard>
		</div>
	</div>
</template>

<script>
import { NcEmptyContent, NcButton, NcCard } from '@nextcloud/vue'
import IconPencil from 'vue-material-design-icons/Pencil.vue'

export default {
	name: 'ProjectList',
	components: {
		NcEmptyContent,
		NcButton,
		NcCard,
		IconPencil,
	},
	props: {
		projects: {
			type: Array,
			default: () => [],
		},
	},
	methods: {
		formatDate(date) {
			return new Date(date).toLocaleDateString()
		},
	},
}
</script>

<style lang="scss" scoped>
.project-list {
	padding: 20px;
}

.project-grid {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
	gap: 20px;
}

.project-card {
	height: 100%;
}

.project-header {
	display: flex;
	justify-content: space-between;
	align-items: center;

	h3 {
		margin: 0;
	}
}

.project-content {
	display: flex;
	flex-direction: column;
	gap: 10px;
}

.project-description {
	margin: 10px 0;
	color: green;
}

.project-dates {
	display: flex;
	justify-content: space-between;
	font-size: 0.9em;
	color: orange;
}

.project-client {
	margin-top: 10px;
	padding-top: 10px;
	border-top: 1px solid black;
}
</style>
