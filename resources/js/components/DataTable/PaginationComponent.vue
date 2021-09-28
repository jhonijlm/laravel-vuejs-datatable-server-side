<template>
    <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <div class="datatable__info">Showing {{dataTable.from}} to {{dataTable.to}} of {{dataTable.total}} {{dataTable.name}}</div>
        <nav>
            <ul class="pagination">
                <template v-for="link in links">
                    <li v-if="!link.url" class="page-item disabled" >
                        <a
                            v-if="!link.url"
                            class="page-link"
                            v-html="link.label"
                        ></a>
                    </li>

                    <li v-else class="page-item" :class="{'active' : link.active}">
                        <a
                        class="page-link"
                        @click="selectPage(link.url)"
                        v-html="link.label"
                    ></a>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        props: {
            links: Array,
            dataTable: Object
        },
        methods: {
            selectPage(linkClick){
                this.dataTable.link = linkClick;
            }
        }
    }
</script>
