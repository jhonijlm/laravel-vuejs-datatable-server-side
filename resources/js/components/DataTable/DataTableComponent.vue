<template>
    <div class="datatable">
        <header-component :filters="dataTable.filters"></header-component>
        <table-component
        :data="dataTable.data"
        :headers="dataTable.headers"
        :filters="dataTable.filters"
        :options="dataTable"

        >
        </table-component>
        <pagination-component :links="dataTable.links" :dataTable="dataTable" ></pagination-component>
    </div>
</template>
<script>
import HeaderComponent from "./HeaderComponent.vue";
import TableComponent from "./TableComponent.vue";
import PaginationComponent from "./PaginationComponent.vue";

export default {
    props:{
        dataTable: Object,
    },
    components: {
        "header-component": HeaderComponent,
        "table-component": TableComponent,
        "pagination-component": PaginationComponent
    },

};
</script>
