<template>
    <div>
       <section class="posts container" v-for="post in items">
           <posts-list-item :post="post" :key="post.id"></posts-list-item>
        </section>

        <section class="posts container" v-if="! items.length">
            <article class="post">
                <div class="content-post">


                    <h1>No hay publicaciones todavia</h1>
                </div>
            </article>

        </section>
    </div>
</template>

<script>
    export default {
        props: ['items']
    }
</script>
