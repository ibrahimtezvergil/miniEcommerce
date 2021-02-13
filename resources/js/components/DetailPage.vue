<template>
    <div class=" p-3 p-md-5 text-white rounded bg-dark">
        <div class="row col-md-12 px-0">
            <div class="row col-md-6">
                <h1 class=" font-italic">{{ product.name }}</h1>
                <ul class="list">
                    <li ><h5>Price:<s> {{product.price}}</s></h5><br>
                    </li>
                    <li ><h3>discounted price:{{numberFormat(product.price-product.discount_amount) == 'NaN' ? '' :numberFormat(product.price-product.discount_amount)}}</h3>
                    </li>
                </ul>
                <p></p>
            </div>
            <div class="row col-md-6">
                <img class="card-img-top ml-auto" :src="product.image" >
            </div>


        </div>
        <div class="row col-md-12">
            <p>{{product.description}}</p>
        </div>
        <div class="row col-md-12 mb-4">
            <h5>Categories:</h5>
            <router-link  v-for="category in productCategories" :key="category.id" :to="{ name: 'listpage', params: { categoryId: category.id }}">{{category.name}} , </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "DetailPage",
    data(){
        return{
            product:{},
            productCategories:{},

        }
    },

    methods:{
      async getProductDetail(id){
          await axios.get("/api/get-productdetail/"+id)
          .then(res =>{
              this.product=res.data.data[0];
              this.productCategories=this.product.categories;
          })
          .catch(e =>{

          })
      },
        numberFormat(data){
            return data.toFixed(2);
        },
    },
    mounted() {
        this.getProductDetail(this.$route.params.productId);
    }
}
</script>

<style scoped>
    ul{
        list-style: none;
    }
    img{
        width: 200px;
    }
</style>
