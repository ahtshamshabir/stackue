<template>
	<div class="media post">
		<vote :model="answer" name="answer"></vote>
		<div class="media-body">
			<form id="form" v-if="editing" action="#" @submit.prevent="update">
				<div class="form-group">
					<textarea rows="10" v-model="body" class="form-control" required></textarea>
				</div>
				<Button class="btn btn-primary" type="submit" :disabled="isInvalid">Update</Button>
				<Button class="btn btn-outline-secondary" @click="cancel" type="button">Cancel</Button>
			</form>
			<div v-else>
				<div v-html="bodyHtml"></div>
				<div class="row">
					<div class="col-4">
						<div v-if="authorize('modify', answer)" class="ml-auto">
							<a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
							<button @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>
						</div>
					</div>
					<div class="col-4">

					</div>
					<div class="col-4">
						<user-info :model="answer" label="Answered"></user-info>
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
		name: "Answer",
		components: {Vote, UserInfo},
		props: ['answer'],
		mixins: [modification],
		data() {
			return {
				body: this.answer.body,
				bodyHtml: this.answer.body_html,
				id: this.answer.id,
				questionId: this.answer.question_id,
				beforeEditCache: null,
			}
		},
		methods: {
			setEditCache() {
				this.beforeEditCache = this.body;
			},
			restoreFromCache() {
				this.body = this.beforeEditCache;
			},
			payload() {
				return {body: this.body};
			},
			delete()
			{
				axios.delete(this.endpoint)
					.then(res => {
						this.$emit('deleted');
						this.$toast.success(res.data.message, "Success", {timeout: 3000});
					});
			}
		},
		computed: {
			isInvalid() {
				return this.body.length < 10;
			},
			endpoint() {
				return `/questions/${this.questionId}/answers/${this.id}`;
			}
		}
	}
</script>

<style>

</style>