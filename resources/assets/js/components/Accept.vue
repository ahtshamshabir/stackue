<template>
	<div>
		<a v-if="canAccept" title="Mark as best answer (Click again to undo)"
		   :class="classes" href="#" @click.prevent="create">
			<i class="fas fa-check fa-2x"></i>
		</a>
		<a v-if="accepted" title="This is the best answer" :class="classes">
			<i class="fas fa-check fa-2x"></i>
		</a>
	</div>
</template>

<script>
	import eventBus from "../event-bus";

	export default {
		name: "Accept",
		props: ['answer'],
		data() {
			return {
				isBest: this.answer.is_best,
				id: this.answer.id,
			}
		},
		methods: {
			create() {
				axios.post(`/answers/${this.id}/accept`)
					.then(res => {
						this.$toast.success(res.data.message, 'Success', {
							timeout: 3000,
							position: 'bottomLeft',
						});
						this.isBest = true;
						eventBus.$emit('accepted', this.id);
					});
			}
		},
		computed:
			{
				canAccept() {
					return this.authorize('accept', this.answer);
				},
				accepted() {
					return !this.canAccept && this.isBest;
				},
				classes() {
					return [
						'mt-2',
						this.isBest ? 'vote-accepted' : ''
					]
				}
			},
		created() {
			eventBus.$on('accepted', id => {
				this.isBest = id === this.id;
			});
		},
	}
</script>

<style>

</style>