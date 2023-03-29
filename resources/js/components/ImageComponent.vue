<template>
    <img ref="image" :alt="alt" :src="default">
</template>
<script>
import { placeholder } from '@babel/types'

    export default {
        data(){
            return {
                default: window.location.origin + "/img/favicon.png"
            }
        },
        props:{
            src:{
                type:String,
                required:true,
            },
            alt:{
                type:String,
                required:false,
            },
        },
        mounted() {
            const options = {
                rootMargin: '0px',
                threshold: 0.1
            }

            const observer = new IntersectionObserver(this.handleIntersection, options)
            observer.observe(this.$refs.image)
        },
        methods: {
            handleIntersection(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = new Image()
                        img.src = this.src
                        img.onload = () => {
                            this.$refs.image.setAttribute('src', this.src)
                        }
                        observer.unobserve(entry.target)
                    }
                })
            }
        }
    }

</script>