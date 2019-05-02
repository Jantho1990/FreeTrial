<template>
    <div class="free-trial-app">
        <component :is="currentPanel"></component>
    </div>
</template>

<script>
import FormPanel from './FormPanel'
import ExistingCustomerPanel from './ExistingUserPanel'

export default {
    name: "FreeTrialApp",
    components: {
        FormPanel,
        ExistingCustomerPanel
    },
    computed: {
        currentPanel () {
            return this.isExistingCustomer ? 'ExistingCustomerPanel' : 'FormPanel'
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
