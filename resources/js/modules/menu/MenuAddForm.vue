<template>
    <div class="add_form_wrapper">
        <form v-on:submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food item</label>
                <input class="form-control" type="text" placeholder="Enter food item name"
                    v-model="food.item">
                <div class="validation-message" v-text="validation.getMessage('item')"></div>
            </div>
            <div class="form-group">
                <label for="name">Select category</label>
                <multiselect 
                    v-model="food.category"
                    :options="categories"
                >
                </multiselect>
                <div class="validation-message" v-text="validation.getMessage('category')"></div>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" type="number" placeholder="Enter food item price"
                    v-model="food.price">
                <div class="validation-message" v-text="validation.getMessage('price')"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>
<script>
    import Multiselect from 'vue-multiselect';
    import Validation from '../../utils/Validation.js'
    export default {
        props:['categories'],
        components:{
            Multiselect
        },
        data:function(){
            return {
                food:{
                    item:'',
                    category:'',
                    price:100
                },
                validation:new Validation(),
            }
        },
        
        methods:{
            handleSubmit(){
                console.log("form data", this.food);
                let postData = this.food
                Vue.axios.post('api/item/save', postData).then(response=>{
                    console.log('response', response.data);
                    this.$emit('newMenuItemAdded', response.data, postData.category);
                    this.food = {
                        item:'',
                        category:'',
                        price:100
                    };
                }).catch(error=>{
                    console.log('error', error.response);
                    if (error.response.status = 422){
                        this.validation.setMessages(error.response.data.errors)
                    }
                });
            }
        }
    }
</script>