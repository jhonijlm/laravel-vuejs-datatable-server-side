<template>
    <div>
        <data-table-component :dataTable="dataTable" ></data-table-component>
        {{filters}}
        {{search}}
    </div>
</template>

<script>
import debounce from 'lodash/debounce';
import DataTableComponent from "../components/DataTable/DataTableComponent.vue";
export default {
    components:{
        "data-table-component": DataTableComponent
    },
    data(){
        return {
            dataTable: {
                name: "Users",
                headers: [],
                data: [],
                from: null,
                to: null,
                total: null,
                filters: {
                    search: "",
                    descending: false,
                    sortBy: "",
                    countPerPage: 10,
                },
                processing: false,
                links: [],
                link: null,
            }
        }
    },
    computed: {
        search: {
            get(){
                this.dataTable.filters.search;
                this.dataTable.filters.countPerPage = 10;
                this.dataTable.link = null;
                this.dataTable.filters.sortBy = "";
                this.dataTable.filters.descending = false;
                this.listUsers();
            }
        },
        filters: {
            get () {
                this.dataTable.filters.countPerPage;
                this.dataTable.filters.sortBy;
                this.dataTable.filters.descending;
                this.dataTable.link;
                this.listUsers();
            },
        },
    },
    methods: {
        async getUsers() {
            this.dataTable.processing = true;
            const params = { ...this.dataTable.filters };
            // console.log(params);
            try {
                const route = this.dataTable.link ? this.dataTable.link  : "/api/users";
                const {data}  = await axios.get(route, { params });
                this.dataTable.data = await data.data.data;
                this.dataTable.headers = await data.headers;
                this.dataTable.links = await data.data.links;
                this.dataTable.from = data.data.from;
                this.dataTable.to = data.data.to;
                this.dataTable.total = data.data.total;
            } catch (e) {
                console.log(e);
            } finally {
                this.dataTable.processing = false;
            }
        },
        listUsers: debounce(async function() {
            await this.getUsers();
        }, 200 ),
    }
}
</script>
