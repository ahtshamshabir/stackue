<template>
	<div class="row mt-4">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="card-title">
						<h3>Your Answer</h3>
					</div>
					<hr>
					<form @submit.prevent="create" method="post">
						<div class="form-group">
							<textarea class="form-control" name="body" id="" cols="30" rows="7" v-model="body"
									  required></textarea>
							<div class="invalid-feedback">
								<strong></strong>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" :disabled="isInvalid" class="btn btn-lg btn-outline-primary">Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "NewAnswer",
		props: ['questionId'],
		data() {
			return {
				body: '',
			}
		},
		methods: {
			create() {
				axios.post(`/questions/${this.questionId}/answers`, {
					body: this.body
				})
					.catch(error => {
						this.$toast.error(error.response.data.message, 'Error');
					})
					.then(({data}) => {
						this.$toast.success(data.message, "Success");
						this.body = '';
						this.$emit('created', data.answer);
					});
			}
		},
		computed: {
			isInvalid() {
				return !this.signedIn || this.body.length < 10;
			},
		}
	}
</script>

<style>

</style>