<template>
    <div>
        <v-container grid-list-sm>
            <!-- Template Campaigns -->
            <div class="text-right">
                <v-btn small variant="text" to="/campaigns" class="text-blue">
                    All Campaigns <v-icon>mdi-chevron-right</v-icon>
                </v-btn>
            </div>
            <v-layout wrap>
                <div
                    class="flex"
                    v-for="campaign in campaigns"
                    :key="`category-` + campaign.id"
                >
                    <v-card :to="`/category/` + campaign.id">
                        <v-img :src="campaign.image" class="text-white">
                            <v-card-title
                                class="fill-height align-end"
                                v-text="campaign.title"
                            ></v-card-title>
                        </v-img>
                    </v-card>
                </div>
            </v-layout>

            <!-- Template Books -->
            <div class="text-right">
                <v-btn small variant="text" to="/blogs" class="text-blue">
                    All Blogs <v-icon>mdi-chevron-right</v-icon>
                </v-btn>
            </div>
            <v-layout wrap>
                <v-carousel hide-delimiters height="250px">
                    <v-carousel-item
                        v-for="blog in blogs"
                        :key="`blog-` + blog.id"
                        xs6
                    >
                        <v-img :src="blog.image" class="fill-height">
                            <v-container fill-height fluid pa-0 ma-0>
                                <v-layout fill-height align-end>
                                    <div class="flex xs12 mx-2">
                                        <span
                                            class="headline text-white"
                                            v-text="blog.title"
                                        ></span>
                                    </div>
                                </v-layout>
                            </v-container>
                        </v-img>
                    </v-carousel-item>
                </v-carousel>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
export default {
    data: () => ({
        campaigns: [],
        blogs: [],
    }),
    created() {
        axios
            .get("api/campaign/random/2")
            .then((response) => {
                let { data } = response.data;
                this.campaigns = data.campaigns;
            })
            .catch((error) => {
                let { response } = error;
                console.log(response);
            });

        axios
            .get("api/blogs/random/2")
            .then((response) => {
                let { data } = response.data;
                this.blogs = data.blogs;
            })
            .catch((error) => {
                let { response } = error;
                console.log(response);
            });
    },
};
</script>
