<template>
    <div class="free-trial-app">
        <component
            :error="error"
            :is="currentPanel"
            @form-submit="verifyIsNotCustomer"
        ></component>
    </div>
</template>

<script>
import FormPanel from './FormPanel'
import ExistingCustomerPanel from './ExistingUserPanel'
import axios from 'axios'

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
            isExistingCustomer: false,
            apiEndpoint: '/api/free-trial-submit',
            error: false,
            signupUrl: 'https://pro.creativemarket.com/sign-up'
        }
    },
    methods: {
        verifyIsNotCustomer (data) {
            const {
                apiEndpoint: api,
                signupUrl: signup
            } = this
            
            axios.post(api, data)
                .then(({ data: { response } }) => {
                    this.error = false
                
                    if (!response) {
                        window.location.href = signup
                    } else {
                        this.isExistingCustomer = true
                    }
                }).catch(error => {
                    if (error.response) {
                        this.error = true
                    }
                })
        }
    }
}
</script>

<style lang="scss" scoped>
.free-trial-app {
    max-width: 400px;
    margin: auto;
    box-shadow: 0px 10px 10px hsla(0, 0%, 75%, 0.3);
    border-radius: 15px;
    padding: 2rem 3rem;
    background-color: hsl(0, 0%, 100%);
    line-height: 1.5;
}
</style>
