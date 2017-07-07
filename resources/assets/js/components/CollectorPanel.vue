<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <x-entity
                    :title="entity1.title"
                    :url="entity1.url"
                    :data="entity1.data"
                    :picture="entity1.picture"
                />
            </div>
            <div class="col-md-6">
                <x-entity
                    :title="entity2.title"
                    :url="entity2.url"
                    :data="entity2.data"
                    :picture="entity2.picture"
                />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['entity1', 'entity2'],
    }
</script>
