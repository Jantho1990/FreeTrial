<template>
    <div class="form-panel">
        <h2>Get <strong>3 free downloads</strong> when you start your free trial today.</h2>
        <ul class="benefits">
            <li>Get access to our full Pro catalog</li>
            <li>Cancel anytime, risk free</li>
            <li>7 days free</li>
        </ul>
        <input type="text" class="form-control" placeholder="Enter Your Email Address" v-model="emailValue">
        <button class="btn" @click="sendVerificationRequest">Start Your Free Trial</button>
        <p class="disclaimer">The free trial is for new members only. All assets downloaded during the free trial period are covered by a basic license.</p>
    </div>
</template>

<script>

export default {
    name: 'FormPanel',
    data () {
        return {
            emailValue: ''
        }
    },
    methods: {
        sendVerificationRequest () {
            const { emailValue: email } = this
            this.$emit('form-submit', { email })
        }
    }
}
</script>

<style lang="scss" scoped>
.form-panel {
    color: hsl(210, 6.7%, 23.5%);
    .benefits {
        list-style-image: url('/img/checkmark-lined.svg');
    }
    input[type="text"] {
        padding: 1.25rem 0.75rem;
    }
    .btn {
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        padding: 0.5rem 0.75rem;
        margin-top: 1rem;
    }
    .disclaimer {
        font-size: 0.6rem;
        margin-top: 1rem;
    }
}
</style>
