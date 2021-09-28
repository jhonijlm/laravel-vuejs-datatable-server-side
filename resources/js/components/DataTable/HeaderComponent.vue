<template>
    <div class="row mb-2">
        <div class="col">
            <label for="">Showing</label>
            <select @change="selectCount" class="form-select" v-model="count" >
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text"  class="form-control" v-model="filters.search" placeholder="Search">
        </div>
    </div>
</template>

<script>
export default {
    props: {
        filters: Object
    },
    data(){
        return {
            count : this.filters.countPerPage
        }
    },
    methods: {
        selectCount(){
            this.filters.countPerPage = Number(this.count);
        }
    }
}
</script>
