<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ title }}</div>
                <div class="panel-body">
                    <div class="picture" v-if="picture"><img :src="picture"></div>
                    <div class="url"><a :href="url">{{ url.replace(/_/g, " ") }}</a></div>
                    <div class="entity-table">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr v-for="item in data">
                                    <th>{{ item.key }}</th>
                                    <td>
                                        <template v-for="value in item.values">
                                            {{ value }}<br>
                                        </template>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'url', 'picture', 'data'],
    }
</script>

<style lang="scss">
    
    .picture img {
        max-height: 200px;
        margin: 0 auto;
        display: block;
    }
    
    .url {
        text-align: center;
        
        a {
            font-size: 80%;
            text-decoration: underline;
            text-decoration-skip: ink;
        }
    }
    
    .entity-table {
        table > tbody > tr {
            > th, > td {
                padding-top: 1px;
                padding-bottom: 1px;
            }
        }
        
        max-height: 400px;
        overflow-y: scroll;
    }
    
</style>