<template>
    <h1>{{ name }}</h1>
    <p>In this series, we will use the following framworks:</p>
    <ul>
    <li v-for="framework in frameworks" >{{ framework }}</li>
    </ul>
</template>
<script setup>
defineProps({
    name:{
        type:String,
        default: 'No data found.'
    },
    frameworks:{
        type:Array,
        default:''
    }
})
</script>
