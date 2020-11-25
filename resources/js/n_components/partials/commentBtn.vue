<template>
    <button @click="$bus.$emit('toggleModal', {sw: true, modal: modal})" class="btn">
        <icon name="coment"></icon>
    </button>
</template>

<script>
export default {
    props: [
        'modal'
    ]
}
</script>
