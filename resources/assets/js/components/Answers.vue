<template>
	<div>
		<div v-if="count" class="row mt-4" v-cloak>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="card-title">
							<h2>{{title}}</h2>
						</div>
						<hr>
						<answer @deleted="remove(index)" v-for="(answer, index) in answers" :answer="answer"
								:key="answer.id"></answer>
						<div v-if="nextUrl" class="text-center mt-3">
							<button @click.prevent="fetch(nextUrl)" class="btn btn-outline-secondary">Load more
								answers
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<new-answer @created="add" :question-id="question.id"></new-answer>
	</div>
</template>

<script>
	import Answer from "./Answer";
	import NewAnswer from "./NewAnswer";

	export default {
		name: "Answers",
		components: {Answer, NewAnswer},
		props: ['question'],
		data() {
			return {
				questionId: this.question.id,
				count: this.question.answers_count,
				answers: [],
				nextUrl: null,
			}
		},
		methods: {
			fetch(endpoint) {
				axios.get(endpoint)
					.then(({data}) => {
						this.answers.push(...data.data);
						this.nextUrl = data.next_page_url;
					})
			},
			remove(index) {
				this.answers.splice(index, 1);
				this.count--;
			},
			add(answer)
			{
				this.answers.push(answer);
				this.count++;
			},
		},
		created() {
			this.fetch(`/questions/${this.question.id}/answers`);
		},
		computed: {
			title() {
				return this.count + " " + (this.count > 1 ? ' Answers' : 'Answer');
			}
		}
	}
</script>

<style>

</style>