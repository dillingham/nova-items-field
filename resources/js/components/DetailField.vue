<template>
    <div class="flex border-b border-40">
        <div class="w-1/4 py-4">
             <h4 class="font-normal text-80">
                {{ field.name }}
            </h4>
        </div> 
        <div class="w-3/4 pt-4">    
            <component v-for="(item, index) in JSON.parse(field.value)" :item="item" :is="field.detailItemComponent" :key="index" />
        </div>
    </div>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field']
}
</script>
