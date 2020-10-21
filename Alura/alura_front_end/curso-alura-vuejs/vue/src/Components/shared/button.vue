<template>
    <button class="btn" :class="styleButton" :type="type" @click="confirme">{{ label }}</button>
</template>
<script>
export default {
    props: {
        type: {
            required: true,
            type: String
        },
        label: {
            required: true,
            type: String
        },
        confirmation: Boolean,
        btnStyle: String
    },

    methods: {
        confirme() {
            if (this.confirmation) {
                if(confirm("Tem certeza?")){
                    this.$emit('ButtonActive')
                }
                return;
            }
            this.$emit('ButtonActive')
        }
    },

    computed: {
        styleButton() {
            if(this.btnStyle == 'default' || !this.btnStyle) return 'btn-default';

            if(this.btnStyle == 'danger') return 'btn-danger';
        }
    }
}
</script>
<style scoped> 
    .btn {
        display: inline-block;
        padding: 0.6rem;
        border-radius: 3px;
        margin: 0.6rem;
        font-size: 1.2em;
        cursor: pointer;
    }

    .btn-danger {
        background: firebrick;
        color: white;
    }

    .btn-default {
        background: darkcyan;
        color: white;
    }

    .panel__content .btn {
        width: 100%;
        border: 1px solid black;
        border-radius: 0;
        margin: 0;
        flex-grow: 1;
    }
</style>