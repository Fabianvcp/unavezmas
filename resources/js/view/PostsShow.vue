<template>
    <section id="postsshow">
        <article class="post container">

<!--            @include($post->viewType())-->

            <div class="content-post">
<!--                @include('posts.header')-->
                    <post-header :post="post"></post-header>
                <div class="image-w-text" v-html="post.body">

                </div>

                <footer class="container-flex space-between">
                    <social-links :description="post.title"></social-links>
<!--                    @include('partials.social-links', ['description' => $post->title])-->
                    <div class="tags container-flex">
                        <span class="tag c-gris text-capitalize" v-for="tag in post.tags">
                            <tag-link :tag="tag"></tag-link>
                        </span>
                    </div>
                </footer>
                <div class="comments">
                    <div class="divider"></div>
                    <disqus-comments></disqus-comments>
                </div>
            </div>
        </article>
    </section>
</template>


<script>
    export default {
        props:['url'],
        data(){
            return {
                post:{
                    owner:{},
                    category:{}
                }
            }
        },
        mounted(){
        axios.get(`/api/blog/${this.url}`)
            .then(res =>{
                this.post = res.data;
            })
            .catch(err=> {
                console.log(err.response.data);
            })
        }
    }
</script>

