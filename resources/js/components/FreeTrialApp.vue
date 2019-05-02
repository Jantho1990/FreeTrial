<template>
    <div class="free-trial-app">
        <component :is="currentPanel"></component>
    </div>
</template>

<script>
import FormPanel from './FormPanel'
export default {
    name: "FreeTrialApp",
    components: {
        FormPanel
    },
    computed: {
        currentPanel () {
            return this.isExistingCustomer ? null : 'FormPanel'
        }
    },
    data () {
        return {
            isExistingCustomer: false
        }
    }
}
</script>

<style lang="scss" scoped>
.free-trial-app {
    
}
</style>
