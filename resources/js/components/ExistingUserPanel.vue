<template>
    <div class="existing-user-panel">
        <p>Unfortunately, the free trial is for <strong>new members only</strong>. It looks like you already have a Creative Market account.</p>
        <a href="#" class="btn">Explore Our Catalog</a>
    </div>
</template>

<script>
export default {
    name: 'ExistingUserPanel'
}
</script>

<style lang="scss" scoped>
.existing-user-panel {
    p {
        color: hsl(210, 6.7%, 23.5%);
    }

    .btn {
        width: 100%;
        text-transform: uppercase;
    }
}
</style>
