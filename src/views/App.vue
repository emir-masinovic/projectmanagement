<template>
	<NcContent :app-name="appName">
		<NcAppContent>
			<div id="projectmanagement">
				<NcAppNavigation>
					<NcAppNavigationItem
						id="projects"
						:title="t('projectmanagement', 'Projects')"
						icon="icon-project"
						:exact="true"
						@click="currentView = 'projects'" />
					<NcAppNavigationItem
						id="clients"
						:title="t('projectmanagement', 'Clients')"
						icon="icon-user"
						@click="currentView = 'clients'" />
				</NcAppNavigation>

				<div class="content-wrapper">
					<div v-if="currentView === 'projects'" class="projects-view">
						<div class="view-header">
							<h2>{{ t('projectmanagement', 'Projects') }}</h2>
							<NcButton v-if="!showProjectForm" @click="showProjectForm = true">
								<template #icon>
									<IconPlus />
								</template>
								{{ t('projectmanagement', 'New Project') }}
							</NcButton>
						</div>

						<ProjectForm
							v-if="showProjectForm"
							:project="selectedProject"
							:clients="clients"
							@submit="handleProjectSubmit"
							@cancel="handleProjectCancel" />

						<ProjectList
							v-else
							:projects="projects"
							@create-project="showProjectForm = true"
							@edit-project="handleEditProject" />
					</div>

					<div v-else-if="currentView === 'clients'" class="clients-view">
						<h2>{{ t('projectmanagement', 'Clients') }}</h2>
						<NcEmptyContent icon="icon-user">
							{{ t('projectmanagement', 'Client management coming soon!') }}
						</NcEmptyContent>
					</div>
				</div>
			</div>
		</NcAppContent>
	</NcContent>
</template>

<script>
import { NcContent, NcAppContent, NcAppNavigation, NcAppNavigationItem, NcButton, NcEmptyContent } from '@nextcloud/vue'
import IconPlus from 'vue-material-design-icons/Plus.vue'
import ProjectList from '../components/ProjectList.vue'
import ProjectForm from '../components/ProjectForm.vue'

export default {
	name: 'App',
	components: {
		NcContent,
		NcAppContent,
		NcAppNavigation,
		NcAppNavigationItem,
		NcButton,
		NcEmptyContent,
		IconPlus,
		ProjectList,
		ProjectForm,
	},
	data() {
		return {
			appName: 'projectmanagement',
			currentView: 'projects',
			showProjectForm: false,
			selectedProject: null,
			projects: [],
			clients: [],
		}
	},
	methods: {
		handleProjectSubmit(projectData) {
			// console.log('Submit:', projectData)
			this.showProjectForm = false
			this.selectedProject = null
		},
		handleProjectCancel() {
			this.showProjectForm = false
			this.selectedProject = null
		},
		handleEditProject(project) {
			this.selectedProject = project
			this.showProjectForm = true
		},
	},
}
</script>

<style scoped lang="scss">
#projectmanagement {
	height: 100%;
	display: flex;
}

.content-wrapper {
	padding: 20px;
	width: 100%;
}

.view-header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-bottom: 20px;

}
</style>
