<template>
    <router-link :to="{
    name:'publicación',
     params:{url: post.url}}"><slot ></slot>
    </router-link>

</template>
<script>
    export default {
        props:['post']
    }
</script>
