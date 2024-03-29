<template>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<form v-if="editing" class="card-body" @submit.prevent="update">
					<div class="card-title">
						<div class="d-flex align-items-center">
							<input v-model="title" type="text" class="form-control-lg">
						</div>
					</div>
					<hr>
					<div class="media">
						<div class="media-body">
							<div class="form-group">
								<textarea rows="10" v-model="body" class="form-control" required></textarea>
							</div>
							<Button class="btn btn-primary" type="submit" :disabled="isInvalid">Update</Button>
							<Button class="btn btn-outline-secondary" @click="cancel" type="button">Cancel</Button>
						</div>
					</div>
				</form>
				<div v-else class="card-body">
					<div class="card-title">
						<div class="d-flex align-items-center">
							<h1>{{title}}</h1>
							<div class="ml-auto">
								<a class="btn btn-outline-secondary" href="/questions">Back to all
									Questions</a>
							</div>
						</div>
					</div>
					<hr>
					<div class="media">
						<vote :model="question" name="question"></vote>
						<div class="media-body">
							<div v-html="bodyHtml"></div>
							<div class="row">
								<div class="col-4">
									<div class="ml-auto">
										<a v-if="authorize('modify', question)" @click="edit"
										   class="btn btn-sm btn-outline-info">Edit</a>
										<button v-if="authorize('deleteQuestion', question)" @click="destroy"
												class="btn btn-sm btn-outline-danger">Delete
										</button>
									</div>
								</div>
								<div class="col-4"></div>
								<div class="col-4">
									<user-info :model="question" label="Asked"></user-info>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Vote from "./Vote";
	import UserInfo from "./UserInfo";
	import modification from "../mixins/modification";
	export default {
		name: "Question",
		components: {Vote, UserInfo},
		props: ['question'],
		mixins: [modification],
		data() {
			return {
				title: this.question.title,
				body: this.question.body,
				bodyHtml: this.question.body_html,
				id: this.question.id,
				beforeEditCache: {},
			}
		},
		computed: {
			isInvalid() {
				return this.body.length < 10 || this.title.length < 10;
			},
			endpoint() {
				return `/questions/${this.id}`;
			},
		},
		methods: {
			setEditCache() {
				this.beforeEditCache = {
					body: this.body,
					title: this.title,
				};
			},
			restoreFromCache() {
				this.title = this.beforeEditCache.title;
				this.body = this.beforeEditCache.body;
			},
			payload(){
				return {
					body: this.body,
					title: this.title,
				};
			},
			delete()
			{
				axios.delete(this.endpoint)
					.then(({data}) => {
						this.$toast.success(data.message, 'Success', {timeout: 2000});
					});
				setTimeout(() => {
					window.location.href = "/questions";
				},3000);
			}
		}
	}
</script>

<style>

</style>