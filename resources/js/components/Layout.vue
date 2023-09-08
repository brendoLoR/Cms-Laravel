<template>
    <header>
        <slot name="header"></slot>
    </header>
    <div class="container">
        <main>
            <slot></slot>
        </main>
        <footer>
            <slot name="footer"></slot>
        </footer>
    </div>
</template>

<script>
export default {
    name: "Layout"
}
</script>

<style scoped>
 main{
     min-height: 100vh;
 }
</style>
