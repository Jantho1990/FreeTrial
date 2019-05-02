<template>
    <div class="free-trial-app">
        <h2>Get <strong>3 free downloads</strong> when you start your free trial today.</h2>
        <ul class="benefits">
            <li>Get access to our full Pro catalog</li>
            <li>Cancel anytime, risk free</li>
            <li>7 days free</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "FreeTrialApp"
}
</script>

<style lang="scss">
.free-trial-app {
    .benefits {
        list-style-image: url('/img/checkmark-lined.svg');
        li {
        }
    }
}
</style>
