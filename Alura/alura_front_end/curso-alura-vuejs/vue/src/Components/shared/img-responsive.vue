<template>
    <img class="list__itens__img" :src="photo" :alt="title">
</template>
<script>
export default {
    props: ["photo", "title"]
}
</script>
<style scoped>
    img {
        width: 100%;
        max-width: 20rem;
        height: 100%;
        max-height: 12rem;
        border: 1px solid black;
        flex-grow: 1;
    }
</style>