<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card header"><h1>My Repository</h1></div>

                    <div class="card-body">
                        <router-link
                            :to="{ name: 'create' }"
                            class="btn btn-md btn-success"
                            >Create</router-link
                        >

                        <div class="table-responsive mt-2">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Author</th>
                                        <th class="text-center">Year</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(
                                            repository, index
                                        ) in repositories"
                                        :key="repository.id"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ repository.title }}</td>
                                        <td>{{ repository.author }}</td>
                                        <td>{{ repository.year }}</td>
                                        <td>{{ repository.description }}</td>
                                        <td class="text-center">
                                            <router-link
                                                :to="{
                                                    name: 'edit',
                                                    params: {
                                                        id: repository.id,
                                                    },
                                                }"
                                                class="btn btn-sm btn-primary"
                                                >Edit</router-link
                                            >
                                            <button
                                                @click="
                                                    deleteRepository(
                                                        repository.id
                                                    )
                                                "
                                                class="btn btn-sm btn-danger"
                                            >
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            repositories: [],
        };
    },
    methods: {
        getRepository() {
            this.axios.get("/api/repository").then((response) => {
                console.log(response.data.repositories);
                this.repositories = response.data.repositories;
            });
        },

        async deleteRepository(id) {
            try {
                await this.axios.get("/api/repository/${id}/destroy");
                this.getRepository();
            } catch (error) {
                console.error("Error deleting repository: ", error);
            }
        },
    },

    mounted() {
        this.getRepository();
    },
};
</script>
