<template>
	<div class="column  is-one-third">
		<div class="card">
			<div class="card-image">
				<figure class="image is-4by3">
					<img :src="imageUrl" alt="Placeholder image">
				</figure>
			</div>
			<div class="card-content">
				<div class="media">

					<div class="media-content">
						<p class="title is-4" v-text="product.name"></p>
					</div>
				</div>

				<div class="content" v-text="product.description"></div>
			</div>
		</div>
	</div>
</template>

<script>
    export default{
        props: ['product'],

        computed: {
            // формируем путь к картинке
            imageUrl(){
                return  this.product.image
			}
		}
    }
</script>
