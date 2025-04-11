<template>
	<div class="project-form">
		<NcContent>
			<NcCard>
				<template #header>
					<h2>{{ isEdit ? t('projectmanagement', 'Edit Project') : t('projectmanagement', 'New Project') }}</h2>
				</template>
				<form @submit.prevent="handleSubmit">
					<div class="form-group">
						<NcTextField
							v-model="form.name"
							:label="t('projectmanagement', 'Project Name')"
							:placeholder="t('projectmanagement', 'Enter project name')"
							required />
					</div>

					<div class="form-group">
						<NcTextField
							v-model="form.description"
							:label="t('projectmanagement', 'Description')"
							:placeholder="t('projectmanagement', 'Enter project description')"
							type="textarea"
							required />
					</div>

					<div class="form-row">
						<div class="form-group">
							<NcTextField
								v-model="form.startDate"
								:label="t('projectmanagement', 'Start Date')"
								type="date"
								required />
						</div>
						<div class="form-group">
							<NcTextField
								v-model="form.endDate"
								:label="t('projectmanagement', 'End Date')"
								type="date"
								required />
						</div>
					</div>

					<div class="form-group">
						<NcSelect
							v-model="form.clientId"
							:label="t('projectmanagement', 'Client')"
							:options="clients"
							:placeholder="t('projectmanagement', 'Select a client')"
							required />
					</div>

					<div class="form-actions">
						<NcButton type="primary" native-type="submit">
							{{ isEdit ? t('projectmanagement', 'Save Changes') : t('projectmanagement', 'Create Project') }}
						</NcButton>
						<NcButton type="tertiary" @click="$emit('cancel')">
							{{ t('projectmanagement', 'Cancel') }}
						</NcButton>
					</div>
				</form>
			</NcCard>
		</NcContent>
	</div>
</template>

<script>
import { NcContent, NcCard, NcTextField, NcSelect, NcButton } from '@nextcloud/vue'

export default {
	name: 'ProjectForm',
	components: {
		NcContent,
		NcCard,
		NcTextField,
		NcSelect,
		NcButton,
	},
	props: {
		project: {
			type: Object,
			default: () => ({}),
		},
		clients: {
			type: Array,
			default: () => [],
		},
	},
	data() {
		return {
			form: {
				name: this.project.name || '',
				description: this.project.description || '',
				startDate: this.project.startDate || '',
				endDate: this.project.endDate || '',
				clientId: this.project.clientId || '',
			},
		}
	},
	computed: {
		isEdit() {
			return !!this.project.id
		},
	},
	methods: {
		handleSubmit() {
			this.$emit('submit', { ...this.form })
		},
	},
}
</script>

<style lang="scss" scoped>
.project-form {
	padding: 20px;
}

.form-group {
	margin-bottom: 20px;
}

.form-row {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 20px;
}

.form-actions {
	display: flex;
	gap: 10px;
	justify-content: flex-end;
	margin-top: 20px;
}
</style>
