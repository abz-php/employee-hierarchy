<template>
    <vue-nestable v-model="data" childrenProp="subordinates">
        <template slot-scope="{ item }">
            <!-- Handler -->
            <vue-nestable-handle :item="item">
                ☰
            </vue-nestable-handle>

            <!-- Content -->
            <span>{{item.full_name}} [{{item.position}}]</span>
        </template>
    </vue-nestable>
</template>

<script>
    export default {
        data() {
            return {
                data: [
                    {
                        name: 'Node 0-000',
                        id: 20,
                        children: [
                            {
                                name: 'Node 1-1',
                                id: 3,
                                children: [
                                    {
                                        name: 'Node 2-1',
                                        id: 4,
                                        children: []
                                    },
                                    {
                                        name: 'Node 2-2',
                                        id: 10,
                                        children: []
                                    }
                                ]
                            },
                            {
                                name: 'Node 1-2',
                                id: 13,
                                children: []
                            }
                        ]
                    },
                    {
                        name: 'Node 0-1',
                        id: 14,
                        children: []
                    }
                ]
            }
        },
        mounted() {
            this.init();
        },
        methods: {
            init() {
                let vm = this;
                axios
                    .get('/employees/tree')
                    .then(response => {
                        console.log(response.data.data);
                        vm.data = response.data.data;
                    });

                axios
                    .get('/catalogs/position')
                    .then(response => {
                        console.log(response.data.data);
                    });
            }
        }
    }
</script>
