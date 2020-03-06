<template>
    <div>


        <div  class="categories-item-warap section-pt-30 section-pb">
            <div class="container">
                <div class="row">
                    <div  v-for="category in this.categories" class="col-lg-2 col-md-4 col-sm-4 col-6">
                        <!-- single-categories-item Start -->
                        <div class="single-categories-item mt-30">
                            <div class="cat-item-image">
                                <a :href="`/category/`+category.slug">
                                    <img :src="category.featured_image?category.featured_image:'/images/default-image.jpg'"
                                         alt=""></a>
                            </div>
                            <div class="categories-title">
                                <h6><a :href="`/category/`+category.slug">{{category.name}}</a></h6>
                                <p>{{category.total}} products</p>
                            </div>
                        </div>
                        <!-- single-categories-item End -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: []
            }
        },

        mounted() {
            this.getCategories();
        },

        methods: {

            getCategories() {
                axios.get('api/get-categories')
                    .then((response) => {
                        this.categories = response.data;
                        console.log(response);
                    })
                    .catch((error) => {
                        console.log(error)
                    });
            }
        }
    }
</script>
