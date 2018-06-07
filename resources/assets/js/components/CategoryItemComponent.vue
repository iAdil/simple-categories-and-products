<template>
	<li>
		<a
				class="category-item"
				v-text="capitalizedName"
				:class="{ 'is-active': isActive }"
				v-on:click.prevent="getCategoryProducts(category.id)">

		</a>

		<ul v-if="category.children.length > 0">
			<category-item v-for="(child, index)  in category.children"  :category="child" ></category-item>
		</ul>
	</li>
</template>

<script>
    export default {
        props: ['category'],

		data(){
            return {
                // активное состояние ссылки категории
                isActive: false
			}
		},

		computed:{
		    // функция возврщает имя категории с прописной буквы
			// можно перенести в css
		    capitalizedName(){
		        let name = this.category.name
                return name.charAt(0).toUpperCase() + name.slice(1);
			}
		},

		methods:{
            // устанавливает активную категорию
		    setActiveCategory(){
		        // удаляем класс у других элементов
		        $('.category-item').removeClass('is-active')
				// делаем активным текущий элемент
                this.isActive = true
			},

            getCategoryProducts(){
                // устанавливаем активную категорию
		        this.setActiveCategory();

                // получаем товары по данной категории
                this.$root.$emit('loadProductsByCategory', this.category.id)
			}
		}
    }
</script>
