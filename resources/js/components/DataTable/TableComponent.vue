<template>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th v-for="header in headers" :key="header.value" @click="orderBy(header.value)" >
                    <span>{{header.text}} {{ sortBy == header.value ? (descending ? '🔼' : '🔽') : '' }}</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <template v-for="dataDT in data" >
                <tr >
                    <template v-for="header in headers"  >
                        <td v-if="Object.keys(dataDT).find(key => key === header.value)" >
                            {{dataDT[header.value]}}
                        </td>
                        <td v-else>
                        </td>
                    </template>
                </tr>
            </template>

        </tbody>
    </table>

</template>

<script>
export default {
    props: {
        data: Array,
        headers: Array,
        filters: Object,
        options: Object,
    },
    data(){
        return {
            sortBy: null,
            descending: false,
            deleteId : null
        }
    },
    methods: {
        orderBy(value){
            this.sortBy = value;
            this.descending = !this.descending;

            this.filters.descending = !this.filters.descending;
            this.filters.sortBy = value;
        },
        deleteRow(value){
            this.deleteId = value;
            this.options.deleteId = 0;
            this.options.deleteId = this.deleteId;
            this.deleteId = null;
        }
    },

}
</script>
