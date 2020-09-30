<template>
    <div>

            <paginator :url="`/api/etiquetas/${this.tag}`" component-name="posts-list" ></paginator>

    </div>
</template>
<script>
    export default{
        props:['tag']
    }
</script>
<!--<script>-->
<!--    export default{-->
<!--        props:['tag'],-->
<!--        data(){-->
<!--            return{-->
<!--                posts:[]-->
<!--            }-->
<!--        },-->
<!--        mounted() {-->
<!--            this.getPosts();-->
<!--        },-->
<!--        beforeRouteUpdate(to, from, next){-->

<!--            console.log(to.params.tag, from.params.tag);-->
<!--            this.tag = to.params.tag;-->

<!--            this.getPosts();-->

<!--            next();-->

<!--        },-->
<!--        methods:{-->
<!--            getPosts(){-->
<!--                axios.get(`/api/etiquetas/${this.tag}`)-->
<!--                    .then(res => {-->
<!--                        this.posts = res.data.data;-->
<!--                    })-->
<!--                    .catch(err =>{-->
<!--                        console.log(err);-->
<!--                    });-->
<!--            }-->
<!--        },-->
<!--        // watch:{-->
<!--        //     tag(){-->
<!--        //         this.getPosts();-->
<!--        //     }-->
<!--        // }-->
<!--    }-->
<!--</script>-->
